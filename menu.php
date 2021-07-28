<!DOCTYPE html>
   <?php include 'conexao/conf.inc.php'; 
   		 include 'valida.php';
   ?> 
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
	</head>
	<body>
		<br> <?php 
					echo "Bem-vindo ".$_SESSION['nome'];
					echo "<br>";
					echo "user: ".$_SESSION['usuario'];
				?>
	</body>
</html>
