<?php
require "conexao/Conexao.class.php";
require "conexao/Crud.class.php";
require "autoload.php";
include "conexao/default.inc.php";
include "DTO/Cargo.php";
$acao = '';
$codigo = '';
inserir();


// Métodos para cada operação
function inserir()
{
    $pdo = Conexao::getInstance();
    $crud = Crud::getInstance($pdo, 'cargo');
    $cargo = dadosForm();   
    // Inseri os dados do usuário
    $arrayUser = array('descricao' => $cargo->getDescricao(),'atribuicao' => $cargo->getAtribuicao());
    $retorno   = $crud->insert($arrayUser);
    header("location:UI/menu.php");
}

// Busca as informações digitadas no form
function dadosForm()
{
    $cargo = new Cargo;
    $dados = array();
    $dados['descricao'] = $_POST['descricao'];
    $dados['atribuicao']=$_POST['atribuicao'];
    $cargo->buildFromArray($dados);
    return $cargo;
}
