<?php
    class Cargo{
        private int $id;
        private string $descricao;
        private string $atribuicao;
        
        public function getID(){
            return $this->id;
        }

        public function getDescricao()
        {
            return $this->descricao;    
        }
        public function setDescricao($descricao){
            $this->descricao=$descricao;
        }
        public function getAtribuicao(){
            return $this->atribuicao;
        }
        public function seetAtribuicao($atribuicao){
            $this->atribuicao=$atribuicao;
        }
        public function __toString()
        {
            return "Descrição: ".$this->descricao."<br>".
            "Atribuição: ".$this->atribuicao;
        }

    }
?>