<?php
class Funcionario
{
    private string $cpf;
    private string $nome;
    private string $email;
    private string $telefone;
    private string $digital;
    private Cargo $cargo;

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
}
?>