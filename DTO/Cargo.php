<?php
class Cargo
{
    private  $id;
    private  $descricao;
    private  $atribuicao;

    public function getID()
    {
        return $this->id;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function getAtribuicao()
    {
        return $this->atribuicao;
    }
    public function seetAtribuicao($atribuicao)
    {
        $this->atribuicao = $atribuicao;
    }
    public function __toString()
    {
        return "Descrição: " . $this->descricao . "<br>" .
            "Atribuição: " . $this->atribuicao;
    }
    public function buildFromObj($obj)
    {
        $obj = (array)$obj;
        $this->buildFromArray($obj);
    }

    public function buildFromArray($arr)
    {
        $this->id=$arr['id_cargo'];
        $this->setDescricao($arr['descricao']);
        $this->seetAtribuicao($arr['atribuicao']);
    }
}
