<?php
require_once 'dataHora.php';
require_once 'layout.php';
require_once 'consultas.php';
?>
    <form style="margin-top: 10%;background-color: #343A40; color: #FFFFFF;" action="insert.php" id="form" method="post" class="col-6 jumbotron animated bounceIn">
        <img class="float-right" style="width: 65px; margin-top: -55px;" src="img/icon-php1-1.png" alt="">
        <h4>Insira seus dados para se cadastrar</h4>
        <hr>
        <input type="hidden" name="datas" id="datas" value="<?=date('Y-m-d', $unpack0[7]);?>">
        <input type="hidden" name="hora" id="hora" value="<?=date('H:i:s', $unpack0[7]);?>">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control" id="nome" placeholder="Seu nome">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email"
                   aria-describedby="emailHelp" placeholder="exemplo@email.com">
        </div>
        <?php if($_SESSION['user']['perfil'] == "Administrador"): ?>
            <div class="form-group">
                <label for="perfil">Perfil:</label>
                <select class="form-control" name="perfil">
                    <?php foreach($perfil as $listar): ?>
                        <option><?=$listar['Perfil'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
        <?php else: ?>
            <div class="form-group">
                <label for="perfil">Perfil:</label>
                <select class="form-control" name="perfil">
                    <option>Básico</option>
                </select>
            </div>
        <?php endif;?>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" class="form-control" id="senha" placeholder="******">
        </div>
        <div class="form-group">
            <label for="senha">Confirmar senha:</label>
            <input type="password" name="confirmarSenha" class="form-control" id="confirmarSenha" placeholder="******">
        </div>
        <br>
        <div class="control-group float-right">
            <a class="btn btn-outline-primary" href="javascript:void(0)" onClick="history.go(-1); return false;">Voltar</a>&nbsp;
            <button type="submit" class="btn btn-outline-success">Cadastrar</button>
        </div>
    </form>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bounceIn">
                <div class="modal-header">
                    <img style="width: 60px" src="img/exclamation-mark.svg" alt="">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                       <div id="aviso"><strong>Senha</strong> e <strong>Confirmar senha,</strong> não coincidem!</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script>

        // $("#form").submit(function() {
        //     let senha = $("#senha").val();
        //     let confirmarSenha = $("#confirmarSenha").val();
        //
        //     if (senha != confirmarSenha){
        //         $('#exampleModalCenter').modal('toggle').addClass('bounceIn');
        //         console.log("Senha-> " + senha);
        //         console.log("Confirmar senha-> " + confirmarSenha);
        //         return false;
        //     }
        //     // e.preventDefault();//evito o submit do form ao apetar o enter..
        // });


        // $(document).ready(function(){

        // });

        // function conferir(){
        //     let senha = document.getElementById('senha').value;
        //     let confirmarSenha = document.getElementById('confirmarSenha').value;
        //     if (senha != confirmarSenha) {
        //         alert("SENHAS DIFERENTES!\nFAVOR DIGITAR SENHAS IGUAIS");
        //     }else {
        //         alert("SENHA CORRETAS");
        //     }
        //     return false;
        // }
    </script>
<?php require_once 'Footer.php';?>