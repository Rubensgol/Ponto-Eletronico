<?php
require_once "conexao/Conexao.class.php";
require_once "conexao/Crud.class.php";
require_once "autoload.php";
include_once "conexao/default.inc.php";
include "DTO/TipoPonto.php";
$acao = '';
$codigo = '';
inserir();


// Métodos para cada operação
function inserir()
{
    $pdo = Conexao::getInstance();
    $crud = Crud::getInstance($pdo, 'tipo_ponto');
    $tipoPonto = dadosForm();   
    // Inseri os dados do usuário
    $arrayUser = array('descricao' => $tipoPonto->getDescricao());
    $retorno   = $crud->insert($arrayUser);
    header("location:UI/menu.php");
}

// Busca as informações digitadas no form
function dadosForm()
{
    $tipoPonto = new TipoPonto;
    $dados = array();
    $dados['descricao'] = $_POST['descricao'];
    $tipoPonto->buildFromArray($dados);
    return $tipoPonto;
}
