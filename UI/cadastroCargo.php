<!DOCTYPE html>
<html>
<?php
include '../valida.php';
require_once "../autoload.php";
?>
<head>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/cadastroUsuario.css" rel="stylesheet">
</head>

<body>

    <body class="text-center">
        <form class="form-signin" action="../acaoCadastroCargo.php" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Cadastre o Cargo</h1>
            <label for="descricao" class="sr-only">Descrição do cargo</label>
            <input type="text" id="descricao" name="descricao" class="form-control" placeholder="Descrição.." required autofocus>
            <label for="atribuicao" class="sr-only">Atribuição</label>
            <input type="text" id="atribuicao" name="atribuicao" class="form-control" placeholder="Atribuicao" required>
            <a href="menu.php"  class="btn btn-lg btn-primary">Voltar</a>
            <button name="acao" value="confirmar" class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
        </form>
    </body>


</body>

</html>