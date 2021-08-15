<!DOCTYPE html>
<?php include_once '../conexao/conf.inc.php';
include_once '../valida.php';
?>

<html>


<head>
	<meta charset="utf-8">
	<link href="../css/menu.css" rel="stylesheet">
	<script src="../js/relogio.js"></script>
	<link href="../css/bootstrap.css" rel="stylesheet">
	
	<title><?php echo $title; ?></title>
</head>
<script>
	function redirecionar() {
		window.location.href = document.getElementById("opcaoAcao").value;
	}
</script>

<body>
	<h3 id="relogio"></h3>
	<div class="form-group">
		<div>
			<select id="opcaoAcao">
				<option value="cadastroFuncionario.php" selected> Cadastrar funcionario</option>
				<option value="cadastroCargo.php"> Cadastrar cargo </option>
				<option value="cadastroTipoPonto.php"> Cadastrar o tipo de ponto </option>
				<option value="verRelatorio.php"> visualizar relatorio </option>
			</select>
		</div>
		<div class="mudarPagina">
			<a href="../acaoLogin.php?acao=logoff"  class="btn btn-lg btn-primary">sair</a>
			<input  type="button" id="selecionaropcao" name="selecionaropcao" value="Selecionar" onclick="redirecionar()" class=" btn btn-lg btn-primary btn-block">
		</div>
	</div>
	<?php
	echo "Bem-vindo " . $_SESSION['nome'];
	echo "<br>";
	echo "user: " . $_SESSION['usuario'];
	?>


	<br>
</body>

</html>