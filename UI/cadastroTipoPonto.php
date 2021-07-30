<!DOCTYPE html>
<html>
<?php include '../conexao/conf.inc.php';
include '../valida.php';
?>
<head>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/cadastroUsuario.css" rel="stylesheet">
</head>

<body>

    <body class="text-center">
        <form class="form-signin" action="../acaoCadastroTipoPonto.php" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Cadastro do tipo do ponto que vai ser batido</h1>
            <label for="descricao" class="sr-only">Tipo do ponto</label>
            <input type="text" id="descricao" name="descricao" class="form-control" placeholder="Descrição.." required autofocus>
            <button name="acao" value="confirmar" class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
        </form>
    </body>

</body>

</html>