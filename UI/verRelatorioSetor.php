<!DOCTYPE html>
<html>
    
<?php

include '../conexao/conf.inc.php';
include '../conexao/connect.php';
include_once '../valida.php';
// Configurações
$validadeEmSegundos = 50;
$arquivoCache = '../cache/index.html';
$urlDinamica = 'https://localhost/dw1/Ponto%20Eletronico/UI/verRelatorioSetor.php';

// Verifica se o arquivo cache existe e se ainda é válido
if (file_exists($arquivoCache) && (filemtime($arquivoCache) > time() - $validadeEmSegundos)) {
    // Lê o arquivo cacheado
    $conteudo = file_get_contents($arquivoCache);
} else {

    // Acessa a versão dinâmica
    $conteudo = file_get_contents($urlDinamica);
    // Cria o cache
    file_put_contents($arquivoCache, $conteudo);
}

// Exibe o conteúdo da página
echo $conteudo;
?>


<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load("current", {
            packages: ["corechart"]
        });

        function drawChart() {
            <?php
                $sql = "SELECT * FROM " . $GLOBALS['tb_setor'];
                $result = mysqli_query($GLOBALS['conexao'], $sql);

                $setores=array();
                while ($row = mysqli_fetch_array($result)) {
                    $setores[$row['setor']]=$row['registros'];
                }
                $js_array = json_encode($setores);
                echo "var javascript_array = ". $js_array . ";\n";
                ?>
            
            //var data = google.visualization.arrayToDataTable(array);
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'cargo');
            data.addColumn('number', 'registros');
            
            for (var [key, value] of Object.entries(javascript_array)) {  
                data.addRows([[key, parseInt(value)]]);
            }
            var options = {
                title: 'Entradas e saidas registradas',
                legend: {
                    position: 'none'
                },
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
            
        }
        document.getElementById("chart_div").textContent =  drawChart();
        function chamaExcel() {
            window.location.replace("../phpToexcel.php?cpf=" + $("#funcionarioSelect").val());

        }
        function chamaWord() {
            window.location.replace("../phpToWord.php?cpf=" + $("#funcionarioSelect").val());

        }
    </script>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/cadastroUsuario.css" rel="stylesheet">
</head>

<body>
    <div lass="form-group">
        <form action="../phpToexcel.php">
            <legend>Ver Setores:</legend>
           
            <button type="button" name="acao" id="acao" onclick="return drawChart()">Exibir Grafico</button>
    
        </form>
        <input type="image" src="../img/word.png" class="imagem" style="width:50px;height:50px;" onclick="chamaWord()">
        <input type="image" src="../img/excel.jpg" class="imagem" style="width:50px;height:50px;" value="excel" onclick="chamaExcel()">
        <table class="result table table-sm table-dark"></table>
        <div id="chart_div" style="width: 500px; height: 500px;">
        
        </div>
    </div>

</body>

</html>