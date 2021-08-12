<!DOCTYPE html>
<html>
<?php include '../conexao/conf.inc.php';
include '../conexao/Conexao.class.php';
include '../conexao/Crud.class.php';
include '../conexao/connect.php';
?>

<head>
    <link href="../css/login.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="../js/relogio.js"></script>
</head>

<body>
    <form action="../acaobaterponto.php" method="post" class="form-ponto">
        <div class="pontoEntrada">
            <h1 class="h3 mb-3 font-weight-normal">Bata o Ponto</h1>
            <label for="cpf" class="sr-only">Cpf</label>
            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="cpf" required autofocus>
            <h3 id="relogio"></h3>
            <div class="form-group">
                <label for="tipoRegistro">Tipo registro</label>
                <?php
                $sql = "SELECT * FROM " . $GLOBALS['tb_tipoPonto'];
                $result = mysqli_query($GLOBALS['conexao'], $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<div class="form-check form-check-inline">';
                    echo '<input class="form-check-input" type="checkbox" name="' . $row['id'] . '" value="' . $row['id'] . '">'.$row['descricao'].'</input>';
                    echo '</div>';
                }
                ?>
            </div>
            <a href="index.php" class="btn btn-lg btn-primary">Voltar</a>
            <button name=" btnPonto" value="btnPonto" class="btn btn-lg btn-primary btn-block" type="submit">Bater</button>
        </div>
    </form>
</body>

</html>