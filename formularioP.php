<?php
include 'conexao/Conexao.class.php';
include_once 'conexao/conf.inc.php';
include 'conexao/Crud.class.php';
include 'DTO/Funcionario.php';
include 'conexao/connect.php';


$funcionario = new Funcionario();
$funcionario = funcionarioGet($_GET['cpf']);
if (strcmp($_GET['oq'], 'email') == 0)
    echo $funcionario->getEmail();
elseif (strcmp($_GET['oq'], 'telefone') == 0)
    echo $funcionario->getTelefone();
elseif (strcmp($_GET['oq'], 'cargosSelect') == 0)
    echo $funcionario->getCargo();
function funcionarioGet($CPF)
{
    $pdo = Conexao::getInstance();
    $crud = Crud::getInstance($pdo, 'funcionario');
    $sql = "SELECT * FROM funcionario WHERE cpf = ?";
    $arrayParam = array($CPF);
    $dados = $crud->getSQLGeneric($sql, $arrayParam, FALSE);
    $funcionario = new Funcionario;
    $funcionario->buildFromObj($dados);
    return $funcionario;
}
