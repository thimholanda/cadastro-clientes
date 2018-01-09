<?php

namespace codeeducation\Cliente;

abstract class ClienteAbstract
{
    private $nome;
    private $email;
    private $type;
    private $estrelas;
    private $endereco;
    private $table;
    const TYPE_PF = 1;
    const TYPE_PJ = 2;

    public function __construct($nome, $email)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->setClienteType();
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getEstrelas()
    {
        return $this->estrelas;
    }

    /**
     * @param mixed $estrelas
     */
    public function setEstrelas($estrelas)
    {
        $this->estrelas = $estrelas;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco = null)
    {
        $this->endereco = $endereco;
    }

    protected abstract function setClienteType();
}