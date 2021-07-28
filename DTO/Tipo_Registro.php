<?php
class TipoRegistro
{
    private int $id;
    private string $descricao;

    public function getDescricao()
    {
        return $this->descricao;
    }


    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}
?>