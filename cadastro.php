<?php require_once 'layout.php';?>
    <form style="margin-top: 15%;background-color: #343A40; color: #FFFFFF;" action="insert.php" id="form" method="post" class="col-6 jumbotron animated bounceIn">
        <img class="float-right" style="width: 65px; margin-top: -55px;" src="img/icon-php1-1.png" alt="">
        <h4>Insira seus dados para se cadastrar</h4>
        <hr>
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control" id="nome" placeholder="Seu nome">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="exemplo@email.com">
        </div>

        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" class="form-control" id="senha" placeholder="******">
        </div>
        <br>
        <div class="control-group float-right">
            <a class="btn btn-outline-primary" href="javascript:void(0)" onClick="history.go(-1); return false;">Voltar</a>
            <button type="submit" class="btn btn-outline-success">Cadastrar</button>
        </div>
    </form>
<?php require_once 'Footer.php';?>
