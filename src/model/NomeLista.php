<?php

// Aqui ficam os Gets e Sets dos atributos de Acesso a Usuário

class NomeLista
{

    private $id;
    private $nome;
    private $sexo;
    private $confirmado;
    private $festaNome;

    public function getId()
    {
        return $this->nome;
    }

    public function setId($id)
    {
        settype($id, "int");
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        settype($nome, "string");
        $this->nome = $nome;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function setSexo($sexo)
    {
        settype($sexo, "string");
        $this->sexo = $sexo;
    }

    public function getConfirmado()
    {
        return $this->confirmado;
    }

    public function setConfirmado($confirmado)
    {
        settype($confirmado, "string");
        $this->confirmado = $confirmado;
    }

    public function getNomeFesta()
    {
        return $this->festaNome;
    }

    public function setNomeFesta($festaNome)
    {
        settype($festaNome, "string");
        $this->festaNome = $festaNome;
    }
}