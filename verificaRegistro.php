<?php

function contaRegistro($cpf)
{

    $pdo = Conexao::getInstance();
    $crud = Crud::getInstance($pdo, 'ponto');
    $sql = "SELECT count(registro) FROM ponto WHERE funcionario_cpf = ?";
    $arrayParam = array($cpf);
    $dados = $crud->getSQLGeneric($sql, $arrayParam, FALSE);
    var_dump($dados);
    $dados = (array)$dados;
    $qtd=$dados["count(registro)"];
    if ($qtd%2==0)
        return "entrada";
    else 
        return "saida";
}
?>