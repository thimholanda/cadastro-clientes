<?php

require_once 'Cliente.php';

$clientes = [
    array(
        'nome'  => 'Thiago',
        'email' => 'thiago@gmail.com',
        'cpf'   => '000.000.000-01'
    ),
    array(
        'nome'  => 'Rosângela',
        'email' => 'rosangela@gmail.com',
        'cpf'   => '000.000.000-02'
    ),
    array(
        'nome'  => 'Marta',
        'email' => 'marta@gmail.com',
        'cpf'   => '000.000.000-03'
    ),
    array(
        'nome'  => 'Sávio',
        'email' => 'savio@gmail.com',
        'cpf'   => '000.000.000-04'
    ),
    array(
        'nome'  => 'Priscila',
        'email' => 'priscila@gmail.com',
        'cpf'   => '000.000.000-05'
    ),
    array(
        'nome'  => 'Leo',
        'email' => 'leo@gmail.com',
        'cpf'   => '000.000.000-06'
    ),
    array(
        'nome'  => 'Rita',
        'email' => 'rita@gmail.com',
        'cpf'   => '000.000.000-07'
    ),
    array(
        'nome'  => 'Marcia',
        'email' => 'marcia@gmail.com',
        'cpf'   => '000.000.000-08'
    ),
    array(
        'nome'  => 'Filipe',
        'email' => 'filipe@gmail.com',
        'cpf'   => '000.000.000-09'
    ),
    array(
        'nome'  => 'Agatha',
        'email' => 'agatha@gmail.com',
        'cpf'   => '000.000.000-10'
    ),

];

$clientesObj = array();

foreach ($clientes as $clienteID => $atributos)
{
    $varName = 'cliente' . (string)$clienteID;
    array_push($clientesObj, $$varName = new Cliente($atributos['nome'], $atributos['email'], $atributos['cpf']));
}


