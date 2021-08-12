<?php
require "conexao/Conexao.class.php";
require "conexao/Crud.class.php";
require "autoload.php";
include "conexao/default.inc.php";
include "DTO/Funcionario.php";
include "DTO/Cargo.php";
$acao = '';
$codigo = '';
inserir();


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
    $arrayUser['cargo_id_cargo']=$funcionario->getCargo()->getId();
    $retorno   = $crud->insert($arrayUser);
    header("location:UI/menu.php");
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
