<?php

require_once 'login.php';
require_once 'layout.php';


if (!isset($_SESSION['sessaoemail']) && !isset($_SESSION['sessaosenha'])){session_destroy();header('location: aviso.php');}
?>
<div style="padding-top: 2%" class="form-group">
    <h5 class="animated bounceInDown"><?=$_SESSION['user']['nome'];?>, digite o nome que deseja pesquisar</h5>
    <div class="form-inline my-2 my-lg-0 text-center">
        <input class="form-control mr-sm-2" type="search" id="palavra" placeholder="Perquisar" name="palavra" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" id="buscar" type="submit">Buscar</button>
        <div class="btn btn-group">
            <a href="javascript:void(0)" onClick="history.go(-1); return false;" class="btn btn-outline-primary">Voltar</a>
        </div>
    </div>

    <div id="dados"></div>
</div>
<?php require_once 'Footer.php';?>