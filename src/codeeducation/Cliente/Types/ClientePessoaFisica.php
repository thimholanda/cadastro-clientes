<?php

namespace codeeducation\Cliente\Types;

use codeeducation\Cliente\ClienteAbstract;

final class ClientePessoaFisica extends ClienteAbstract
{
    private $cpf;

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    protected function setClienteType()
    {
        $this->setType(self::TYPE_PF);
    }
}