<!DOCTYPE html>
<html>
<?php
include '../conexao/conf.inc.php';
include '../conexao/connect.php';
?>

<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script>
        function chamarPhpAjax() {

            var select = document.getElementById('funcionarioSelect');
            var cpf = select.options[select.selectedIndex].value;
            $.ajax({
                url: '../phpToWord.php',
                data: {
                    cpf: cpf
                },
                success: function(response) {
                    $(".result").html(response);
                },
                error: function() {}
            });
            return false;
        }



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
    </script>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/cadastroUsuario.css" rel="stylesheet">
</head>

<body>
    <div lass="form-group">
        <form action="../phpToWord.php">
        <legend>Ver Funcionario:</legend>
        <input type="text" name="procurar" list="funcionarios" id="procurar" size="37" value="Empresa">
        <select class="form-control" name="funcionarioSelect" id="funcionarioSelect">
            <option value="empresa">Empresa</option>
            <?php
            $sql = "SELECT * FROM " . $GLOBALS['tb_funcionario'];
            $result = mysqli_query($GLOBALS['conexao'], $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo '<option value="' . $row['cpf'] . '">' . $row['nome'] . '</option>';
            }
            ?>
        </select>

        <button type="button" name="acao" id="acao" onclick="return chamarPhpAjax()">Ver relatorio</button>
        <button type="submit" name="acaoGerarDoc" id="acaoGerarDoc">Gerar relatorio Word</button>
        <button type="submit" name="acaoGerarDoc" id="acaoGerarDoc">Gerar relatorio Excel</button>
        </form>
        <table class="result table table-sm table-dark"></table>
    </div>

</body>

</html>