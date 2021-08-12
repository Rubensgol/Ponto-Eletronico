<?php
class Ponto
{
    private  $id;
    private  $momento;
    private  $registro;
    private  $funcionario;
    private  $tiposPonto;

    public function getFuncionario()
    {
        return $this->funcionario;
    }

    public function setFuncionario($funcionario)
    {
        $this->funcionario = $funcionario;
    }

    public function getTipoRegistro()
    {
        return $this->registro;
    }

    public function setTipoRegistro($registro)
    {
        $this->registro = $registro;
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
    public function setId($id)
    {
        $this->id = $id;
    }
    public function buildFromObj($obj)
    {
        $obj = (array)$obj;
        $this->buildFromArray($obj);
    }

    public function buildFromArray($arr)
    {
        $this->setId($arr['id']);
        $this->setMomento($arr['momento']);
    }

    public function getTiposPonto()
    {
        return $this->tiposPonto;
    }


    public function setTiposPonto($tiposPonto)
    {
        $this->tiposPonto = $tiposPonto;

        return $this;
    }
}
