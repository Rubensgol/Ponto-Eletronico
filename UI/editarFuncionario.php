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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>


    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/cadastroUsuario.css" rel="stylesheet">
    <script>
        function chamarPhpAjax(tipo) {
            var select = tipo;
            var cpf = $('#funcionarioSelect').val();
            $.ajax({
                url: '../formularioP.php',
                data: {
                    oq: select,
                    cpf: cpf
                },
                success: function(response) {
                    tipo = "#" + tipo;
                    $(tipo).val(response);

                },
                error: function() {}
            });
            return false;
        }

        function readyFn(jQuery) {
            $('#cadADM').hide();
            $('#funcionarioSelect').on("change", function() {

                $('#nome').val($('#funcionarioSelect :selected').text());
                $('#cpf').val($('#funcionarioSelect').val());
                chamarPhpAjax("telefone");
                chamarPhpAjax("email");
                chamarPhpAjax("cargosSelect");
                escolheC();
            });
        }

        function escolheC() {
            if ($('#cargosSelect').val() == 1)
                $('#cadADM').show();
            else {
                $('#cadADM').hide();
            }
        }

        function escolheCargo() {
            $('#cargosSelect').on("change", function() {
                if ($('#cargosSelect').val() == 1)
                    $('#cadADM').show();
                else {
                    $('#cadADM').hide();
                }

            });
        }
        $(document).ready(escolheCargo);
        $(document).ready(readyFn);


        jQuery.fn.filterByText = function(textbox, selectSingleMatch) {
            return this.each(function() {
                var select = this;
                var options = [];
                $(select).find('option').each(function() {
                    options.push({
                        value: $(this).val(),
                        text: $(this).text()
                    });
                });
                $(select).data('options', options);
                $(textbox).bind('change keyup', function() {
                    var options = $(select).empty().scrollTop(0).data('options');
                    var search = $.trim($(this).val());
                    var regex = new RegExp(search, 'gi');

                    $.each(options, function(i) {
                        var option = options[i];
                        if (option.text.match(regex) !== null) {
                            $(select).append(
                                $('<option>').text(option.text).val(option.value)
                            );
                        }
                    });
                    if (selectSingleMatch === true &&
                        $(select).children().length === 1) {
                        $(select).children().get(0).selected = true;
                    }
                });
            });
        };
        $(function() {
            $('#funcionarioSelect').filterByText($('#procurar'), true);
        });

        function atualiza() {

        }
    </script>

</head>

<body>
    <form action="../acaoCadastroFuncionario.php" method="post" class="form-cadastro">
        <INPUT TYPE="hidden" NAME="tipo" VALUE="editar">
        <INPUT TYPE="hidden" NAME="nome" VALUE="" id="nome">
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" readonly>
        </div>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="procurar" list="funcionariosSelect" id="procurar" size="37" placeholder="pesuisar">
            <select class="form-control" name="funcionarioSelect" id="funcionarioSelect">
                <?php
                $sql = "SELECT * FROM " . $GLOBALS['tb_funcionario'];
                $result = mysqli_query($GLOBALS['conexao'], $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="' . $row['cpf'] . '">' . $row['nome'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Endereço de email</label>
            <input type="email" id='email' name="email" class="form-control" aria-describedby="emailHelp" placeholder="Email">
        </div>


        <div class="form-group">
            <label for="telTXT">Telefone</label>
            <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="(xx)xxxxxxxx">
        </div>
        <div class="form-group">
            <label for="cargosSelect">Escolha o cargo</label>
            <select class="form-control" name="cargosSelect" id="cargosSelect">
                <?php
                $sql = "SELECT * FROM " . $GLOBALS['tb_cargo'];
                $result = mysqli_query($GLOBALS['conexao'], $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="' . $row['id_cargo'] . '">' . $row['atribuicao'] . '</opition>';
                }
                ?>
            </select>
            <div class="form-group" id="cadADM">
                <label for="login">Login</label>
                <input type="text" class="form-control" id="login" name="login">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha">
            </div>
        </div>
        <div>
            <a href="menu.php" class="btn btn-lg btn-primary">Voltar</a>
            <button type="submit" class="btn btn-lg btn-primary" name="acao" id="acao" value="salvar">Salvar Funcionario</button>
        </div>
    </form>

</body>

</html>