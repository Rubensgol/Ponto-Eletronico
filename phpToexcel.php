<?php
//incluindo o arquivo do fpdf
include 'conexao/Conexao.class.php';
include_once 'conexao/conf.inc.php';
include 'conexao/Crud.class.php';
include 'DTO/Funcionario.php';
include 'conexao/connect.php';
funcionario($_GET['cpf']);
header("location:UI/menu.php");
function funcionario($CPF)
{
    $arquivo = 'relatorio.xls';
    header('Content-type: text/html;charset=UTF-8');
    #pegar os dados do funcionario para montar a tabela
    $pdo = Conexao::getInstance();
    $crud = Crud::getInstance($pdo, 'funcionario');
    $sql = "SELECT * FROM funcionario WHERE cpf = ?";
    $arrayParam = array($CPF);
    $dados = $crud->getSQLGeneric($sql, $arrayParam, FALSE);
    $funcionario = new Funcionario;
    $funcionario->buildFromObj($dados);

    $html = '';
    $html .= '<table>';
    $html .= '<tr>';
    $html .= '<th>CPF</hd>';
    $cpf = $funcionario->getCpf();
    $html .= "<td>$cpf </td>";
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= "<th>Nome</th>";
    $nome = $funcionario->getNome();
    $html .= "<td>$nome </td>";
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= "<th>telefone </th>";
    $telefone = $funcionario->getTelefone();
    $html .= "<td>$telefone </td>";
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= "<th>E-mail</th>";
    $email = $funcionario->getEmail();
    $html .= "<td>$email</td>";
    $html .= '</tr>';

    $sql = "SELECT * FROM " . $GLOBALS['tb_ponto'] . " where funcionario_cpf=$cpf";
    $result = mysqli_query($GLOBALS['conexao'], $sql);
    $html .= '<tr>';
    $html .= '<th>Pontos</th>';
    $html .= '</tr>';
    $html .= '<tr>';

    $entradas = 0;
    $saidas = 0;
    while ($row = mysqli_fetch_array($result)) {
        $entrada = new DateTime();
        $saida = new DateTime();
        $horastrabalhdas = '';
        $tothorasTrabalhadas = 0;
        $mimtrabalhados = 0;
        if ($row['registro'] == 'entrada') {
            $entrada = new DateTime($row['momento']);
            $entradas += 1;
        } else {
            $saida = new DateTime($row['momento']);
            $horastrabalhdas = $saida->diff($entrada);
            $saidas += 1;
            $tothorasTrabalhadas += $horastrabalhdas->h;
            $mimtrabalhados += $horastrabalhdas->m;
            if ($mimtrabalhados >= 60) {
                $tothorasTrabalhadas += 1;
                $mimtrabalhados -= 60;
            }
        }
        $html .= '<tr>';
        $html .= "<td>" . $row['momento'] . "</td>";
        $html .= "<td>" . $row['registro'] . "</td>";
        $html .= '</tr>';
    }
    $html .= '<tr>';
    $html .= '<th>Numero de entradas</th>';
    $html .= "<td>" . $entradas . "</td>";
    $html .= '<th>Numero de saidas</th>';
    $html .= "<td>" . $saidas . "</td>";
    $html .= '<th>Horas trabalhadas</th>';
    $html .= "<td>" . $tothorasTrabalhadas.":". $mimtrabalhados."</td>";
    if ($tothorasTrabalhadas > 24) {
        $html .= '<th>Dias trabalhados</th>';
        $html .= "<td>" . $tothorasTrabalhadas / 24 . "</td>";
    }
    $html .= '</tr>';
    $html .= '</table>';
    finaliza($arquivo, $html);
}

function finaliza($arquivo, $html)
{
    // Configura��es header para for�ar o download
    header("Expires: Sat, 25 Dec 2021 23:00:00 GMT");
    header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");
    header("Content-type: application/x-msexcel");
    header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
    header("Content-Description: PHP Generated Data");
    // Envia o conte�do do arquivo
    echo $html;
    exit;
}
