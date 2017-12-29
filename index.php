<?php
    require_once 'init_clients.php';
    if(isset($_GET['desc'])) krsort($clientesObj);
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
            <h1>Clientes</h1>
        </div>
        <div class="col-md-6">
            <?php if(!isset($_GET['desc'])): ?>
                <a href="?desc" class="btn btn-primary" style="float: right;" role="button">exibir de forma descendente</a>
            <?php else: ?>
                <a href="/" class="btn btn-primary" style="float: right;" role="button">exibir de forma ascendente</a>
            <?php endif; ?>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-12">
            <ul class="list-group">
                <?php foreach ($clientesObj as $cliente): ?>
                    <li class="list-group-item" >
                        <h2><?php echo $cliente->getNome(); ?></h2>
                        <h6><?php echo $cliente->getType() == \codeeducation\Cliente\ClienteAbstract::TYPE_PF ? 'Pessoa Física' : 'Pessoa Jurídica'; ?> | Estrelas: <?php echo $cliente->getEstrelas(); ?></h6>
                        <a href="detalhes.php?cliente=<?php echo $cliente->getNome(); ?>" class="card-link">Ver detalhes</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>