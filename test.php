<?php
require "conexao/Conexao.class.php";
require "conexao/Crud.class.php";
require "autoload.php";
include "conexao/default.inc.php";
CadastraADM('12593199854');
function cadastraADM($cpf)
{
    $pdo = Conexao::getInstance();
    $crud = Crud::getInstance($pdo, 'administrador');
    $sql = "SELECT * FROM administrador WHERE funcionario_cpf = ?";
    $arrayParam = array($cpf);
    $dados = $crud->getSQLGeneric($sql, $arrayParam, FALSE);
    var_dump($dados);
}
?>