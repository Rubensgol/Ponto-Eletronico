<?php
    include 'Registro.php';
    class FazRegistro
    {
        public function __construct($gravacao,$ponto)
        {
            if ($gravacao=='1'){
                $r=new gravaEmail();
                $registro = new Registro($r);
                $registro->geraPonto($ponto);
            }
            if ($gravacao=='2'){
                $r=new gravaSMS();
                $registro = new Registro($r);
                $registro->geraPonto($ponto);
            }
            if ($gravacao=='3'){
                $r=new gravaWhatsapp();
                $registro = new Registro($r);
                $registro->geraPonto($ponto);
            }
            if ($gravacao=='4'){
                $r=new gravaImpresso();
                $registro = new Registro($r);
                $registro->geraPonto($ponto);
            }

        }
    }
?>