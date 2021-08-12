<!DOCTYPE html>
<html>
<?php include '../conexao/conf.inc.php';
include '../valida.php';
include '../conexao/Conexao.class.php';
include '../conexao/Crud.class.php';
include '../conexao/connect.php';
?>
<title></title>

<head>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/cadastroUsuario.css" rel="stylesheet">
</head>

<body>
    <form action="../acaoCadastroFuncionario.php" method="post" class="form-cadastro">

        <div class="form-group">
            <label for="exampleInputEmail1">Endereço de email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nomeTXT" name="nome" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
        </div>
        <div class="form-group">
            <label for="telTXT">Telefone</label>
            <input type="tel" class="form-control" name="telefone" id="telTXT" placeholder="(xx)xxxxxxxx">
        </div>
        <div class="form-group">
            <label for="cargoSelect">Escolha o cargo</label>
            <select class="form-control" name="cargosSelect" id="cargoSelect">
                <option selected >Escolha o cargo</option>
                <?php
                $sql = "SELECT * FROM " . $GLOBALS['tb_cargo'];
                $result = mysqli_query($GLOBALS['conexao'], $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="' . $row['id_cargo'] . '">'.$row['atribuicao'].'</opition>';
                }
                ?>
            </select>
        </div>
        <div>
        <a href="menu.php"  class="btn btn-lg btn-primary">Voltar</a>
            <button type="submit" class="btn btn-lg btn-primary" name="acao" id="acao" value="salvar">Salvar Funcionario</button>
        </div>
    </form>

</body>

</html>