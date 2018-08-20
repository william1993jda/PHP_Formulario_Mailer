<?php
require_once 'login.php';

//session_start();
//require_once 'consultas.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Validando Formulário</title>
    <link rel="stylesheet" href="estilos/css/estilos.css">
    <link rel="stylesheet" href="estilos/css/animate.css">
    <link rel="stylesheet" href="estilos/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/favicon.ico" />
    <script type="text/javascript" src="validate/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/meu.js" defer></script>
    <script type="text/javascript" src="validate/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="validate/additional-methods.min.js"></script>
    <script type="text/javascript" src="validate/localization/messages_pt_BR.js"></script>
</head>
<body>

<div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <a class="navbar-brand" href="http://php.net/" target="_blank">
                <img style="width:70px;" src="img/icon-php1-1.png" alt="">
                Projeto PHP
            </a>
        </div>
    </div>

    <nav class="navbar navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent"
                aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php if (isset($_SESSION['sessaoemail']) && isset($_SESSION['sessaosenha'])): ?>
            <ul class="nav float-right">
                <li class="nav-item">
                    <div class="btn-group">
                        <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            Opções
                        </button>
                        <div class="dropdown-menu">
                            <p class="dropdown-item text-uppercase">Olá, <?=$_SESSION['user']['nome'];?></p>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-uppercase" href="cadastro.php">Novo usuário
                                <img style="width: 20px; margin-left: 8px;" src="img/plus-2x.png" alt="">
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-uppercase" href="editar.php?id=<?=$_SESSION['user']['id'];?>">Editar perfil
                                <img style="padding-left: 15px" src="img/pencil-2x.png" alt="">
                            </a>
                            <div class="dropdown-divider"></div>
                            <a style="color: red" class="dropdown-item text-uppercase" href="logout.php">Sair
                                <img style="width: 20px; margin-left: 8px;" src="img/logout.png" alt="">
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="buscar.php">
                        Buscar
                        <img style="width: 30px" src="img/Magnify-1s-200px.svg" alt="">
                    </a>
                </li>
            </ul>
        <?php endif; ?>
    </nav>
</div>
<div class="container">