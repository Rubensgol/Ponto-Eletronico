<?php
    // Banco de Dados
    define('HOST', 'localhost');  
    define('DBNAME', 'mydb');    
    define('USER', 'root');  
    define('PASSWORD', '');

    define('DRIVER', 'mysql'); 
    define('CHARSET', 'utf8');

    // Geral da Aplicação
    define('NOME_DO_PROJETO','CRUD-01-R');
    define('DESCRICAO_DO_PROJETO','Um Pequeno exemplo usando PDO');
    
    $url = "127.0.0.1"; // IP do host
	$dbname="mydb"; // Nome do database
	$usuario="root"; // Usuário do database
	$password=""; // Senha do database
	$senhaEmail="28162816";
	// Tabelas do Banco de Dados
	$tb_funcionario = "funcionario";
	$tb_administrador="administrador";
	$tb_cargo="cargo";
    $tb_ponto="ponto";
    $tb_tipoPonto="tipo_ponto";
?>