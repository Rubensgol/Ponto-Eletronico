<?php
require "conexao/Conexao.class.php";
require "conexao/Crud.class.php";
require "autoload.php";
include "conexao/default.inc.php";
include "DTO/Funcionario.php";
include "DTO/Cargo.php";
$acao = '';
$codigo = '';
if (strcmp($_POST['tipo'], 'cadastro') == 0)
    inserir();
elseif (strcmp($_POST['tipo'], 'editar') == 0)
    editar();

function editar()
{
    $pdo = Conexao::getInstance();
    $crud = Crud::getInstance($pdo, 'funcionario');
    $funcionario = dadosForm();
    var_dump($funcionario);
    // Inseri os dados do usuário
    $arrayUser = array();
    $arrayCond = array('cpf=' => $funcionario->getCpf());
    $arrayUser['telefone'] = $funcionario->getTelefone();
    $arrayUser['nome'] = $funcionario->getNome();
    $arrayUser['email'] = $funcionario->getEmail();
    $arrayUser['cargo_id_cargo'] = $funcionario->getCargo()->getId();
    $retorno   = $crud->update($arrayUser, $arrayCond);
    if ($_POST['cargosSelect'] == 1)
        cadastraADM($funcionario->getCpf());
    header("location:UI/menu.php");
}
// Métodos para cada operação
function inserir()
{
    $pdo = Conexao::getInstance();
    $crud = Crud::getInstance($pdo, 'funcionario');
    
    $funcionario = dadosForm();
    // Inseri os dados do usuário
    $arrayUser = array();
    $arrayUser['cpf'] = $funcionario->getCpf();
    $arrayUser['telefone'] = $funcionario->getTelefone();
    $arrayUser['nome'] = $funcionario->getNome();
    $arrayUser['email'] = $funcionario->getEmail();
    $arrayUser['cargo_id_cargo'] = $funcionario->getCargo()->getId();
    $retorno   = $crud->insert($arrayUser);
    if ($_POST['cargosSelect'] == 1)
        cadastraADM($funcionario->getCpf());
    header("location:UI/menu.php");
}
function cadastraADM($cpf)
{
    $pdo2 = Conexao::getInstance();
    $crud2 = Crud::getInstance($pdo2, 'administrador');
    $crud2->setTableName('administrador');
    $sql = "SELECT * FROM administrador WHERE funcionario_cpf = ?";
    $arrayParam = array($cpf);
    $dados = $crud2->getSQLGeneric($sql, $arrayParam, FALSE);
    if (empty($dados)) {
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $arrayUserADM = array();
        $arrayUserADM['login'] = $login;
        $arrayUserADM['senha'] = hash("sha512", $senha);
        $arrayUserADM['funcionario_cpf'] = $cpf;
        $crud2->insert($arrayUserADM);
    }
}
// Busca as informações digitadas no form
function dadosForm()
{
    $funcionario = new Funcionario;

    $pdo = Conexao::getInstance();
    $crud = Crud::getInstance($pdo, 'cargo');
    $sql = "SELECT * FROM cargo WHERE id_cargo = ?";
    $arrayParam = array($_POST['cargosSelect']);
    $dados = $crud->getSQLGeneric($sql, $arrayParam, FALSE);
    $cargo = new Cargo;
    $cargo->buildFromObj($dados);
    $dados = array();
    $dados['cpf'] = $_POST['cpf'];
    $dados['telefone'] = $_POST['telefone'];
    $dados['nome'] = $_POST['nome'];
    $dados['email'] = $_POST['email'];
    $funcionario->buildFromArray($dados);
    $funcionario->setCargo($cargo);
    return $funcionario;
}
