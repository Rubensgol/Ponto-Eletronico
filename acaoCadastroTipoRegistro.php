<?php
require_once "conexao/Conexao.class.php";
require_once "conexao/Crud.class.php";
require_once "autoload.php";
include_once "conexao/default.inc.php";
include "DTO/TipoRegistro.php";
$acao = '';
$codigo = '';
inserir();


// Métodos para cada operação
function inserir()
{
    $pdo = Conexao::getInstance();
    $crud = Crud::getInstance($pdo, 'tipo_registro');
    $tipoRegistro = dadosForm();   
    // Inseri os dados do usuário
    $arrayUser = array('descricao' => $tipoRegistro->getDescricao());
    $retorno   = $crud->insert($arrayUser);
    header("location:UI/menu.php");
}

// Busca as informações digitadas no form
function dadosForm()
{
    $tipoRegistro = new TipoRegistro;
    $dados = array();
    $dados['descricao'] = $_POST['descricao'];
    $tipoRegistro->buildFromArray($dados);
    return $tipoRegistro;
}
