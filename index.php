<!DOCTYPE html >
<?php 
	include 'conexao/conf.inc.php'; 
	$title = "Teste de Login";
?> 
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $title; ?></title>
</head>
<body>
<?php 
	include 'menu.php';
?>
<a href="acaoLogin.php?acao=logoff">sair</a>
<br><br><br>
<h1> BEM VINDO </h1>
</body>
</html>

