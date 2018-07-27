<?php require_once 'login.php';?>
<?php require_once 'consultas.php';?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Validando Formulário</title>
    <link rel="stylesheet" href="estilos/css/estilos.css">
    <link rel="stylesheet" href="estilos/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/favicon.ico" />
    <script type="text/javascript" src="validate/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/meu.js"></script>
    <script type="text/javascript" src="validate/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="validate/additional-methods.min.js"></script>
    <script type="text/javascript" src="validate/localization/messages_pt_BR.js"></script>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="http://php.net/" target="_blank"><img style="width:50px" src="img/icon-php1-1.png" alt=""> Projeto PHP</a>
    <?php if (isset($_SESSION['sessaoemail']) && isset($_SESSION['sessaosenha'])): ?>
        <div class="control-group float-right">
            <a class="btn btn-outline-danger" href="logout.php">Sair</a>
            <a class="btn btn-outline-primary" href="editar.php?id=<?=$pessoa['id'];?>">Editar</a>
        </div>
    <?php endif; ?>
</nav>
<div class="container">