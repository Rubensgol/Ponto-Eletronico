<!DOCTYPE html>
<?php
include_once '../conexao/conf.inc.php';
$title = "Ponto eletronico";
?>

<html>
<script>
	function redirecionarADM() {
		window.location.href ="login.php" ;
	}
	function redirecionarFuncionario() {
		window.location.href ="baterPonto.php" ;
	}
</script>

<head>
	<meta charset="UTF-8">
	<link href="../css/login.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<title><?php echo $title; ?></title>
</head>

<body>
	<div class="pontoEntrada">
		<button name="funcionarioEntrada" value="funcionarioPonto" class="btn btn-lg btn-primary btn-block" type="button" onclick="redirecionarFuncionario()">Bater Ponto</button>
		<button name=" admEntrada" value="admEntrada" class="btn btn-lg btn-primary btn-block" type="button" onclick="redirecionarADM()">Login ADM</button>
	</div>
	<?php

	?>
	<br>
</body>

</html>