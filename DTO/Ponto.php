<?php
class Ponto
{
    private int $id;
    private DateTime $momento;
    private TipoRegistro $tipoRegistro;
    private TipoPonto $tipoPonto;

    public function getTipoPonto()
    {
        return $this->tipoPonto;
    }

    public function setTipoPonto($tipoPonto)
    {
        $this->tipoPonto = $tipoPonto;
    }

    public function getTipoRegistro()
    {
        return $this->tipoRegistro;
    }

    public function setTipoRegistro($tipoRegistro)
    {
        $this->tipoRegistro = $tipoRegistro;
    }

    public function getMomento()
    {
        return $this->momento;
    }


    public function setMomento($momento)
    {
        $this->momento = $momento;
    }

    public function getId()
    {
        return $this->id;
    }
}
