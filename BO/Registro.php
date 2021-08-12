<?php
    class Registro{
        private $registro;
        public function __construct(iGravaPonto $registro)
        {
            $this->registro=$registro;
        }

        public function geraPonto($ponto){
            $this->registro->geraPonto($ponto);

        }
    }

?>