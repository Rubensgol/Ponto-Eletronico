<?php
include "conexao/Conexao.class.php";
include "conexao/Crud.class.php";
include "autoload.php";
include "conexao/default.inc.php";
include "DTO/Funcionario.php";
include "DTO/Cargo.php";
include "DTO/Ponto.php";
include "verificaRegistro.php";
include_once "DAO/gravaEmail.php";
include_once "DAO/gravaImpresso.php";
include_once "DAO/gravaSMS.php";
include_once "DAO/gravaWhatsapp.php";
include_once "BO/FazRegistro.php";
$acao = '';
$codigo = '';
inserir();

// Métodos para cada operação
function inserir()
{
    $pdo = Conexao::getInstance();
    $crud = Crud::getInstance($pdo, 'ponto');
    $ponto = dadosForm();
    $arrayUser = array();
    $arrayUser['funcionario_cpf'] = $ponto->getFuncionario()->getCpf();
    $arrayUser['registro'] = $ponto->getTipoRegistro();
    $retorno   = $crud->insert($arrayUser);

    //pegar ponto
    $sqls = "SELECT max(id) FROM ponto";
    $resultadoId = $crud->getSQLGeneric($sqls, NULL, FALSE);
    $resultadoId = (array)$resultadoId;
    $id = $resultadoId['max(id)'];
    // inserir na tabela relacional de ponto com tipoponto
    inserirTipoPontos($ponto, $id);

    header("location:UI/index.php");
}

// Busca as informações digitadas no form
function dadosForm()
{
    $ponto = new Ponto;
    $pdo = Conexao::getInstance();
    $crud = Crud::getInstance($pdo, 'funcionario');
    $sql = "SELECT * FROM funcionario WHERE cpf = ?";
    $arrayParam = array($_POST['cpf']);
    $dados = $crud->getSQLGeneric($sql, $arrayParam, FALSE);
    $funcionario = new Funcionario;
    $funcionario->buildFromObj($dados);

    $ponto->setFuncionario($funcionario);
    $ponto->setTipoRegistro(contaRegistro($_POST['cpf']));
    return $ponto;
}

function veFormaPonto($ponto)
{
    $qtdponto = array();

    if (isset($_POST[1])) {
        $qtdponto[0] = $_POST[1];

        new FazRegistro($_POST[1], $ponto);
    }
    if (isset($_POST[2])) {
        $qtdponto[1] = $_POST[2];
        new FazRegistro($_POST[2], $ponto);
    }
    if (isset($_POST[3])) {
        $qtdponto[2] = $_POST[3];
        new FazRegistro($_POST[3], $ponto);
    }
    if (isset($_POST[4])) {
        $qtdponto[3] = $_POST[4];
        new FazRegistro($_POST[4], $ponto);
    }
    return $qtdponto;
}

function inserirTipoPontos($ponto, $id)
{
    $pdo = Conexao::getInstance();
    $crud2 = Crud::getInstance($pdo);
    $crud2->setTableName('ponto_has_tipo_ponto');
    $tiposPontos = veFormaPonto($ponto);
    var_dump($crud2);
    foreach ($tiposPontos as &$value) {

        $arrayPontos = array();
        $arrayPontos['ponto_id'] = $id;
        $arrayPontos['tipo_ponto_id'] = $value;
        $crud2->insert($arrayPontos);
    }
}
