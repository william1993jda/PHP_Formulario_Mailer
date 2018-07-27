<?php

require_once 'layout.php';
require_once 'login.php';

if (!isset($_SESSION['sessaoemail']) && !isset($_SESSION['sessaosenha'])){
    session_destroy();
    header('location: aviso.php');
}

?>

    <div class="row">
        <div class="col-sm">

        </div>
        <div style="padding-top: 30px; margin-top: 3%;" class="col-sm-12 jumbotron">
            <h6 class="text-right">Preencha os dados do formulário!</h6>
            <hr>
            <form id="interna" name="interna" action="email.php" method="post">

                <div class="form-group">
                    <label for="Nome">Nome:</label>
                    <input class="form-control cor" type="text" name="Nome" id="Nome" size="35">
                </div>

                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="email" class="form-control cor" name="Email" onblur="validarEmail()" onfocus="redefinirMsg()" id="Email">
                    <small id="error-email" class="form-text text-right"></small>
                </div>

                <div class="form-group">
                    <label for="Fone">Telefone:</label>
                    <input class="form-control cor" type="text" name="Fone" size="35">
                </div>

                <div class="form-group">
                    <label for="Assunto">Assunto:</label>
                    <input class="form-control cor" type="text" name="Assunto" id="Assunto" size="35">
                </div>

                <div class="form-group">
                    <label for="Mensagem">Mensagem:</label>
                    <textarea class="form-control rounded-0 cor" name="Mensagem" id="mensagem" cols="40" rows="8" placeholder="Digite seu texto aqui troxão!"></textarea>
                </div>

                <button type="submit" class="btn btn-outline-primary float-right" onclick="return envia()">Enviar</button>

            </form>
        </div>
        <div class="col-sm">

        </div>
    </div>

<?php require_once 'Footer.php'?>