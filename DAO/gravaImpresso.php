<?php
require "autoload.php";
include_once 'BO/iGravaPonto.php';
class gravaImpresso implements iGravaPonto
{
    public function geraPonto($ponto)
    {
        echo "imprimir";
    }
}

?>
