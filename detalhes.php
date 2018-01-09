<?php
    require_once 'init_clients.php';

    if(!isset($_GET['cliente'])) header('Location: ./');

    function filter($var)
    {
        return $var['nome'] == $_GET['cliente'];
    }

    $cliente = array_filter($clientesObj, 'filter');

    $cliente = array_shift($cliente)

?>

<!doctype html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Clientes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body style="max-width: 800px; padding: 40px; margin: 0 auto;">

    <div class="row">
        <div class="col-md-6">
            <h1><?php echo $cliente['nome']; ?></h1>
        </div>
        <div class="col-md-6">
            <a href="./" class="btn btn-primary" style="float: right;" role="button">voltar</a>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-12">
            <ul class="list-group">
                <li class="list-group-item" >
                    <h2 style="font-size: 1.5rem;"><strong>Email: </strong><?php echo $cliente['email']; ?></h2>
                    <?php if($cliente['type'] == \codeeducation\Cliente\ClienteAbstract::TYPE_PF): ?>
                        <h2 style="font-size: 1.5rem;"><strong>CPF (pessoa física): </strong><?php echo $cliente['cpf']; ?></h2>
                    <?php elseif ($cliente['type'] == \codeeducation\Cliente\ClienteAbstract::TYPE_PJ): ?>
                        <h2 style="font-size: 1.5rem;"><strong>CNPJ (pessoa jurídica): </strong><?php echo $cliente['cnpj']; ?></h2>
                    <?php endif; ?>
                    <h2 style="font-size: 1.5rem;"><strong>Estrelas: </strong><?php echo $cliente['estrelas']; ?></h2>
                    <?php if($cliente['endereco']): ?>
                    <h2 style="font-size: 1.5rem;"><strong>Endereço de cobrança: </strong><?php echo $cliente['endereco']; ?></h2>
                    <?php else: ?>
                        <h2 style="font-size: 1.5rem;">Endereço de cobrança não informado.</h2>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>