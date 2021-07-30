<!DOCTYPE html>
<?php include_once '../conexao/conf.inc.php';
include '../valida.php';
?>

<html>
<script>
	$('.mybtn').on('click', function(event) {
		event.preventDefault();
		var url = $(this).data('target');
		location.replace(url);
	});

	function mudaPagina() {
		document.write(pagina);
	}
	var pagina = document.getElementById("opcaoAcao").value + ".php";
	setInterval(function() {

		let novaHora = new Date();
		// getHours trará a hora
		// geMinutes trará os minutos
		// getSeconds trará os segundos
		let hora = novaHora.getHours();
		let minuto = novaHora.getMinutes();
		let segundo = novaHora.getSeconds();
		// Chamamos a função zero para que ela retorne a concatenação
		// com os minutos e segundos
		minuto = zero(minuto);
		segundo = zero(segundo);
		// Com o textContent, iremos inserir as horas, minutos e segundos
		// no nosso elemento HTML
		document.getElementById('relogio').textContent = hora + ':' + minuto + ':' + segundo;
	}, 1000)

	function zero(x) {
		if (x < 10) {
			x = '0' + x;
		}
		return x;
	}
</script>

<head>
	<meta charset="utf-8">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/menu.css" rel="stylesheet">
	<title><?php echo $title; ?></title>
</head>
<script>
	function redirecionar() {
          window.location.href = document.getElementById("opcaoAcao").value;
       }
</script>

<body>
	<h3 id="relogio"></h3>
	<?php
	echo "Bem-vindo " . $_SESSION['nome'];
	echo "<br>";
	echo "user: " . $_SESSION['usuario'];
	?>

		<div>
			<select id="opcaoAcao">
				<option disabled selected>Selecione o que deseja fazer</option>
				<option value="cadastroFuncionario.php"> Cadastrar funcionario</option>
				<option value="cadastroCargo.php"> Cadastrar cargo </option>
				<option value="cadastroTipoRegistro.php"> Cadastrar o tipo de registro </option>
				<option value="cadastroTipoPonto.php"> Cadastrar o tipo de ponto </option>
				<option value="visualizarRelatorio"> visualizar relatorio </option>
			</select>
		</div>
		<div>
			<a href="../acaoLogin.php?acao=logoff">sair</a>
			<input type="button" id="selecionaropcao" name="selecionaropcao" value="Selecionar" onclick="redirecionar()">
		</div>
	<br>
</body>

</html>