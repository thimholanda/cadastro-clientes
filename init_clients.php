<?php

error_reporting(E_ALL);

use codeeducation\Cliente\ClienteAbstract;
use codeeducation\Cliente\Types\ClientePessoaJuridica;
use codeeducation\Cliente\Types\ClientePessoaFisica;

require_once 'functions.php';

$clientes = [
    array(
        'nome'      => 'Thiago',
        'email'     => 'thiago@gmail.com',
        'tipo'      => ClienteAbstract::TYPE_PF,
        'cpf'       => '000.000.000-01',
        'estrelas'  => 3,
        'endereco'  => 'Rua XPTO'
    ),
    array(
        'nome'  => 'Rosângela',
        'email' => 'rosangela@gmail.com',
        'tipo'      => ClienteAbstract::TYPE_PJ,
        'cnpj'   => '00.000.000.0000-02',
        'estrelas'  => 5,
        'endereco'  => 'Rua XYZ'
    ),
    array(
        'nome'  => 'Marta',
        'email' => 'marta@gmail.com',
        'tipo'      => ClienteAbstract::TYPE_PF,
        'estrelas'  => 2,
        'cpf'       => '000.000.000-03',
    ),
    array(
        'nome'  => 'Sávio',
        'email' => 'savio@gmail.com',
        'tipo'      => ClienteAbstract::TYPE_PJ,
        'estrelas'  => 3,
        'cnpj'   => '00.000.000.0000-04'
    ),
    array(
        'nome'  => 'Priscila',
        'email' => 'priscila@gmail.com',
        'cpf'   => '000.000.000-05',
        'tipo'      => ClienteAbstract::TYPE_PF,
        'estrelas'  => 4,
    ),
    array(
        'nome'  => 'Leo',
        'email' => 'leo@gmail.com',
        'tipo'      => ClienteAbstract::TYPE_PJ,
        'estrelas'  => 5,
        'cnpj'   => '00.000.000.0000-06'
    ),
    array(
        'nome'  => 'Rita',
        'email' => 'rita@gmail.com',
        'cpf'   => '000.000.000-07',
        'tipo'      => ClienteAbstract::TYPE_PF,
        'estrelas'  => 3,
    ),
    array(
        'nome'  => 'Marcia',
        'email' => 'marcia@gmail.com',
        'tipo'      => ClienteAbstract::TYPE_PJ,
        'estrelas'  => 4,
        'cnpj'   => '00.000.000.0000-08'
    ),
    array(
        'nome'  => 'Filipe',
        'email' => 'filipe@gmail.com',
        'cpf'   => '000.000.000-09',
        'tipo'      => ClienteAbstract::TYPE_PF,
        'estrelas'  => 1,
    ),
    array(
        'nome'  => 'Agatha',
        'email' => 'agatha@gmail.com',
        'cpf'   => '000.000.000-10',
        'tipo'      => ClienteAbstract::TYPE_PF,
        'estrelas'  => 3,
    ),

];

$clientesObj = array();

foreach ($clientes as $clienteID => $atributos)
{
    $varName = 'cliente' . (string)$clienteID;

    if($atributos['tipo'] == ClienteAbstract::TYPE_PF)
    {
        array_push($clientesObj, $$varName = new ClientePessoaFisica($atributos['nome'], $atributos['email']));
        end($clientesObj)->setCpf($atributos['cpf']);
    }
    else if($atributos['tipo'] == ClienteAbstract::TYPE_PJ)
    {
        array_push($clientesObj, $$varName = new ClientePessoaJuridica($atributos['nome'], $atributos['email']));
        end($clientesObj)->setCnpj($atributos['cnpj']);
    }

    end($clientesObj)->setEstrelas($atributos['estrelas']);

    if(array_key_exists('endereco', $atributos))  end($clientesObj)->setEndereco($atributos['endereco']);

}


