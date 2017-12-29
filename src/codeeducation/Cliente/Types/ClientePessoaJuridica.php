<?php

namespace codeeducation\Cliente\Types;

use codeeducation\Cliente\ClienteAbstract;

final class ClientePessoaJuridica extends ClienteAbstract
{
    private $cnpj;

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param mixed $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    protected function setClienteType()
    {
        $this->setType(self::TYPE_PJ);
    }

}