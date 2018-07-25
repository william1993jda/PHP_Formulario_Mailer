<?php require_once 'layout.php';if (isset($_SESSION['sessaoemail']) && isset($_SESSION['sessaosenha'])){header('location: Formulario.php');} ?>
<form action="login.php" method="post" class="col-4 jumbotron formularios">
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="Email1" name="email" aria-describedby="email">
    </div>
    <div class="form-group">
        <label for="Senha">Senha</label>
        <input type="password" name="senha" class="form-control" id="Senha" >
    </div>
    <button type="submit" name="logar" class="btn btn-primary">Entrar</button>
</form>
<?php require_once 'Footer.php'; ?>