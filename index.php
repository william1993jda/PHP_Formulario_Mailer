<?php require_once 'layout.php'; ?>
<form action="valida.php" method="post" class="col-4 jumbotron">
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="Email1" name="Email" aria-describedby="email">
    </div>
    <div class="form-group">
        <label for="Senha">Senha</label>
        <input type="password" name="Senha" class="form-control" id="Senha" >
    </div>
    <button type="submit" class="btn btn-primary">Entrar</button>
</form>
<?php require_once 'Footer.php'; ?>