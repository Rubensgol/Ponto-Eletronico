<!DOCTYPE html>
<?php
	$title = "Gerador de SHA1";
	$senha = isset($_POST['senha']) ? $_POST['senha'] : "minhasenha";
?>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $title; ?></title>
</head>
<body>
<form method="post">
<input type="text" name="senha" id="senha" value="<?php echo $senha; ?>">
<input type="submit">
<br><br><br>
<?php echo sha1($senha); ?>  
</form>
</body>
</html>
