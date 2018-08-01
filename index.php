<?php require_once 'layout.php';if (isset($_SESSION['sessaoemail']) && isset($_SESSION['sessaosenha'])){header('location: Formulario.php');} ?>
<form action="login.php" method="post" class="col-4 jumbotron formularios">
    <h4>Bem vindo ao PHP Mailer</h4>
    <hr class="divider">
    <img class="float-right" style="width: 65px; margin-top: -120px;" src="img/icon-php1-1.png" alt="">
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="Email1" name="email" aria-describedby="email" placeholder="seuemail@email.com.br">
    </div>
    <div class="form-group">
        <label for="Senha">Senha</label>
        <input type="password" name="senha" class="form-control" id="Senha" placeholder="******">
        <a class="float-right" href="cadastro.php"><small id="emailHelp" class="form-text text-muted">Cadastre-se</small></a>
    </div>
    <br>
    <button type="submit" name="logar" class="btn btn-outline-primary btn-block">Entrar</button>
</form>
<?php require_once 'Footer.php'; ?>