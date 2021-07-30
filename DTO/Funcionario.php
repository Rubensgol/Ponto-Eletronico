<?php
class Funcionario
{
    private  $cpf;
    private  $nome;
    private  $email;
    private  $telefone;
    private  $digital;
    private  $cargo;

    public function getCargo()
    {
        return $this->cargo;
    }

    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }


    public function getDigital()
    {
        return $this->digital;
    }

    public function setDigital($digital)
    {

        $this->digital = $digital;
    }
    public function getCpf()
    {
        return $this->cpf;
    }


    public function setCpf($cpf)
    {
        $cpf = trim($cpf);
        $cpf = str_replace(".", "", $cpf);
        $cpf = str_replace("-", "", $cpf);
        $this->cpf = $cpf;
    }


    public function getNome()
    {
        return $this->nome;
    }


    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }


    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
    public function buildFromObj($obj)
    {
        $obj = (array)$obj;
        $this->buildFromArray($obj);
    }

    public function buildFromArray($arr)
    {
        $this->setTelefone($arr['telefone']);
        $this->setEmail($arr['email']);
        $this->setNome($arr['nome']);
        $this->setCpf($arr['cpf']);
    }
}
