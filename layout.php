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
                            <p class="dropdown-item">Olá, <?=$_SESSION['user']['nome'];?></p>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="editar.php?id=<?=$_SESSION['user']['id'];?>">Editar perfil
                                <img style="padding-left: 15px" src="img/pencil-2x.png" alt="">
                            </a>
                            <div class="dropdown-divider"></div>
                            <a style="color: red" class="dropdown-item" href="logout.php">Sair
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
<!---->
<?php //while($listar = $stmt->fetch(PDO::FETCH_OBJ)): ?>
<!--<h1 style="color: #FFFFFF">Sei lá loko --><?//=$listar['nome']?><!--</h1>-->
<?php //endwhile; ?>

<!--<nav class="navbar navbar-light bg-light">-->
<!--    <a class="navbar-brand" href="http://php.net/" target="_blank"><img style="width:50px" src="img/icon-php1-1.png" alt=""> Projeto PHP</a>-->
<!--    --><?php //if (isset($_SESSION['sessaoemail']) && isset($_SESSION['sessaosenha'])): ?>
<!--        <nav class="navbar navbar-expand-lg navbar-light bg-light">-->
<!--            <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
<!--                <ul class="navbar-nav mr-auto">-->
<!--                    <li style="padding-right: 4.9rem;" class="nav-item dropdown">-->
<!--                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">-->
<!--                            <img id="img" style="width: 35px; height: 35px; border-radius: 50px; -webkit-transition-duration: 0.4s; transition-duration: 0.4s;" src="img/bars-solid.svg" alt="">-->
<!--                        </a>-->
<!--                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
<!--                            --><?php //foreach ($selecionaUsuario as $key => $pessoa): ?>
<!--                         <p style="padding-left: 10px;">Olá, --><?//=$pessoa['nome'];?><!--</p>-->
<!--                            <a class="dropdown-item" href="editar.php?id=--><?//=$pessoa['id'];?><!--">Editar</a>-->
<!--                                <div class="dropdown-divider"></div>-->
<!--                            --><?php //endforeach; ?>
<!--                            <a class="dropdown-item" href="logout.php">Sair</a>-->
<!--                        </div>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </nav>-->
<!--    --><?php //endif; ?>
<!--</nav>-->
<div class="container">