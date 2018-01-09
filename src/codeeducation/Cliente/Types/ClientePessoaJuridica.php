<?php

namespace codeeducation\Cliente\Types;

use codeeducation\Cliente\ClienteAbstract;
use codeeducation\Database\DatabaseModelInterface;

final class ClientePessoaJuridica extends ClienteAbstract implements DatabaseModelInterface
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

    public function getAll(): array
    {
        $data = array(
            'nome'      => $this->getNome(),
            'email'     => $this->getEmail(),
            'type'      => $this->getType(),
            'estrelas'  => $this->getEstrelas(),
            'endereco'  => $this->getEndereco()
        );

        if($this->getType() == 1)
        {
            $data['cpf'] = $this->getCpf();
            $data['cnpj'] = null;
        }
        elseif ($this->getType() == 2)
        {
            $data['cnpj'] = $this->getCnpj();
            $data['cpf'] = null;
        }

        return $data;
    }

}