<?php

namespace codeeducation\Cliente\Types;

use codeeducation\Cliente\ClienteAbstract;
use codeeducation\Database\DatabaseModelInterface;

final class ClientePessoaFisica extends ClienteAbstract implements DatabaseModelInterface
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