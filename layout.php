<?php require_once 'login.php';?>
<?php //require_once 'consultas.php';?>
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li style="padding-right: 4.9rem;" class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <img id="img" style="width: 50px; border-radius: 50px; -webkit-transition-duration: 0.4s; transition-duration: 0.4s;" src="img/Menu_icon_2_icon-icons.com_71856.png" alt="">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <p style="padding-left: 10px;">Olá, <?=$pessoa['nome'];?></p>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="editar.php?id=<?=$_SESSION['id'];?>">Editar</a>
                            <a class="dropdown-item"href="logout.php">Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    <?php endif; ?>
</nav>
<div class="container">