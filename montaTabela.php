<?php
include 'conexao/Conexao.class.php';
include_once 'conexao/conf.inc.php';
include 'conexao/Crud.class.php';
include 'DTO/Funcionario.php';
include 'conexao/connect.php';
var_dump($_GET);
#geraArray($_GET['cpf']);
function geraArray($cpf)
{
    $pdo = Conexao::getInstance();
    $crud = Crud::getInstance($pdo, 'funcionario');
    $sql = "SELECT * FROM funcionario WHERE cpf = ?";
    $arrayParam = array($cpf);
    $dados = $crud->getSQLGeneric($sql, $arrayParam, FALSE);


    $sql = "SELECT * FROM " . $GLOBALS['tb_ponto'] . " where funcionario_cpf=$cpf";
    $result = mysqli_query($GLOBALS['conexao'], $sql);
    $horas=0;
    $horastrabalhdas = '';
    $dados = array();
    while ($row = mysqli_fetch_array($result)) {
        $entrada = new DateTime();
        $saida = new DateTime();
        
        $tothorasTrabalhadas = 0;
        $mimtrabalhados = 0;
        if ($row['registro'] == 'entrada') {
            $entrada = new DateTime($row['momento']);
        } else {
            $saida = new DateTime($row['momento']);
            $horastrabalhdas = $saida->diff($entrada);
            
            $tothorasTrabalhadas += $horastrabalhdas->i;
            $dados[$saida->format('d')] = $tothorasTrabalhadas;
                    
        }
    }
    
    return $dados;
}
