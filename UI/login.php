<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tela de login</title>

  <!-- Principal CSS do Bootstrap -->
  <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" >

  <!-- Estilos customizados para esse template -->
  <link href="../css/login.css" rel="stylesheet">
</head>

<body class="text-center">
  <form class="form-signin" action="../acaoLogin.php" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
    <label for="login" class="sr-only">Endereço de email</label>
    <input type="text" id="login" name="user" class="form-control" placeholder="Seu Login" required autofocus>
    <label for="inputPassword" class="sr-only">Senha</label>
    <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Senha" required>
    <button name="acao" value="login" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
  </form>
</body>

</html>