<?php require_once 'layout.php';?>
<?php require_once 'consultas.php';

session_start();

if (!isset($_SESSION['sessaoemail']) && !isset($_SESSION['sessaosenha'])){
    session_destroy();
    header('location: aviso.php');
}
?>
<form style="margin-top: 15%;" action="insert.php" method="post" class="col-6 jumbotron">
    <img class="float-right" style="width: 65px; margin-top: -55px;" src="img/icon-php1-1.png" alt="">
    <h4>Insira seus dados para se cadastrar</h4>
    <hr>

    <input type="hidden" value="<?=$id;?>">

    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" class="form-control" id="nome" value="<?=$nome?>" placeholder="Seu nome">
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control" id="email" value="<?=$email?>" aria-describedby="emailHelp" placeholder="exemplo@email.com">
    </div>

    <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" class="form-control" value="<?=$senha?>" id="senha" placeholder="******">
    </div>

    <div class="control-group float-right">
        <a class="btn btn-outline-primary" href="Formulario.php">Voltar</a>
        <a class="btn btn-outline-primary" href="index.php">Salvar</a>
    </div>
</form>
<?php require_once 'Footer.php'?>

