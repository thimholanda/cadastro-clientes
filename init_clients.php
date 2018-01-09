<?php

error_reporting(E_ALL);

require_once 'functions.php';

use codeeducation\Cliente\ClienteAbstract;
use codeeducation\Cliente\Types\ClientePessoaJuridica;
use codeeducation\Cliente\Types\ClientePessoaFisica;
use codeeducation\Database\DatabasePersist;

const HOST = '192.168.33.10';
const DB_NAME = 'test';
const USERNAME = 'user';
const PASSWORD = 'password';

try
{
    $db = new PDO('mysql:host='.HOST.';dbname='.DB_NAME.';charset=utf8mb4', USERNAME, PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $checkTableSql = "SHOW TABLES LIKE 'clientes'";
    $check = $db->prepare($checkTableSql);
    $check->execute();
    if(!$check->rowCount())
    {
        $createTableSql = "CREATE table clientes(
          ID INT (11) AUTO_INCREMENT PRIMARY KEY,
          nome VARCHAR (250),
          email VARCHAR (250),
          type TINYINT (1),
          cpf VARCHAR (15),
          cnpj VARCHAR (20),
          estrelas TINYINT (1),
          endereco VARCHAR (255)
        )";

        $db->exec($createTableSql);
    }

    $check = null;
}
catch (PDOException $e)
{
    $e->getMessage();
}

$clientesObj = \codeeducation\Database\DatabaseFetch::fetchAll($db, 'clientes');

if(count($clientesObj) == 0) {


    $dbPersist = new DatabasePersist($db);

    $dbPersist->setTable('clientes');

    $clientes = [
        array(
            'nome' => 'Thiago',
            'email' => 'thiago@gmail.com',
            'tipo' => ClienteAbstract::TYPE_PF,
            'cpf' => '000.000.000-01',
            'estrelas' => 3,
            'endereco' => 'Rua XPTO'
        ),
        array(
            'nome' => 'Rosângela',
            'email' => 'rosangela@gmail.com',
            'tipo' => ClienteAbstract::TYPE_PJ,
            'cnpj' => '00.000.000.0000-02',
            'estrelas' => 5,
            'endereco' => 'Rua XYZ'
        ),
        array(
            'nome' => 'Marta',
            'email' => 'marta@gmail.com',
            'tipo' => ClienteAbstract::TYPE_PF,
            'estrelas' => 2,
            'cpf' => '000.000.000-03',
        ),
        array(
            'nome' => 'Sávio',
            'email' => 'savio@gmail.com',
            'tipo' => ClienteAbstract::TYPE_PJ,
            'estrelas' => 3,
            'cnpj' => '00.000.000.0000-04'
        ),
        array(
            'nome' => 'Priscila',
            'email' => 'priscila@gmail.com',
            'cpf' => '000.000.000-05',
            'tipo' => ClienteAbstract::TYPE_PF,
            'estrelas' => 4,
        ),
        array(
            'nome' => 'Leo',
            'email' => 'leo@gmail.com',
            'tipo' => ClienteAbstract::TYPE_PJ,
            'estrelas' => 5,
            'cnpj' => '00.000.000.0000-06'
        ),
        array(
            'nome' => 'Rita',
            'email' => 'rita@gmail.com',
            'cpf' => '000.000.000-07',
            'tipo' => ClienteAbstract::TYPE_PF,
            'estrelas' => 3,
        ),
        array(
            'nome' => 'Marcia',
            'email' => 'marcia@gmail.com',
            'tipo' => ClienteAbstract::TYPE_PJ,
            'estrelas' => 4,
            'cnpj' => '00.000.000.0000-08'
        ),
        array(
            'nome' => 'Filipe',
            'email' => 'filipe@gmail.com',
            'cpf' => '000.000.000-09',
            'tipo' => ClienteAbstract::TYPE_PF,
            'estrelas' => 1,
        ),
        array(
            'nome' => 'Agatha',
            'email' => 'agatha@gmail.com',
            'cpf' => '000.000.000-10',
            'tipo' => ClienteAbstract::TYPE_PF,
            'estrelas' => 3,
        ),

    ];

    $clientesObj = array();

    foreach ($clientes as $clienteID => $atributos) {
        if ($atributos['tipo'] == ClienteAbstract::TYPE_PF) {
            $clientesObj = new ClientePessoaFisica($atributos['nome'], $atributos['email']);
            $clientesObj->setCpf($atributos['cpf']);
        } else if ($atributos['tipo'] == ClienteAbstract::TYPE_PJ) {
            $clientesObj = new ClientePessoaJuridica($atributos['nome'], $atributos['email']);
            $clientesObj->setCnpj($atributos['cnpj']);
        }

        $clientesObj->setEstrelas($atributos['estrelas']);

        if (array_key_exists('endereco', $atributos)) $clientesObj->setEndereco($atributos['endereco']);

        $dbPersist->persist($clientesObj);

    }

    $dbPersist->flush();
}

$clientesObj = \codeeducation\Database\DatabaseFetch::fetchAll($db, 'clientes');


