<?php require_once 'layout.php';if (isset($_SESSION['sessaoemail']) && isset($_SESSION['sessaosenha'])){header('location: Formulario.php');} ?>

<div class="panel-body padding-top-md" >
    <div style="display: none" id="login-alert" class="alert alert-danger">
        Dados incorretos
    </div>

    <form style="background-color: #343A40; color: #FFFFFF;" action="login.php" method="post" id="login-form" class="col-12 jumbotron formularios text-uppercase">
        <h4>Bem vindo ao PHP Mailer</h4>
        <hr class="divider">
        <img class="float-right" style="width: 65px; margin-top: -120px;" src="img/icon-php1-1.png" alt="">
        <div class="form-group uppe">
            <label for="exampleInputEmail1">E-mail</label>
            <input type="email" class="form-control" id="Email" name="email" aria-describedby="email" placeholder="seuemail@email.com.br">
        </div>
        <div class="form-group">
            <label for="Senha">Senha</label>
            <input type="password" name="senha" class="form-control" id="Senha" placeholder="******">
            <a style="text-transform: uppercase" class="float-right" href="cadastro.php"><small id="emailHelp" class="form-text text-muted">Cadastre-se</small></a>
        </div>
        <br>
        <button type="submit" name="logar" id="btn-login" class="btn btn-outline-primary btn-block">Entrar</button>
    </form>
</div>

<script>
    $(document).ready(function(){
        $('#login-alert').hide(); //Esconde o elemento com id errolog
        $('#login-form').submit(function(){ //Ao submeter formulário
            let email = $('#Email').val(); //Pega valor do campo email
            let senha = $('#Senha').val(); //Pega valor do campo senha
            $.ajax({ //Função AJAX
                url: "login.php", //Arquivo php
                type: "post", //Método de envio
                data: "email=" + email + "&senha=" + senha,	//Dados

                success: function (result){ //Sucesso no AJAX
                    if(result == 1){
                        location.href='Formulario.php';	//Redireciona
                    }else{
                        $('#login-alert').show(); //Informa o erro
                    }
                }
            });
        });
        return false; //Evita que a página seja atualizada
    })
</script>

<!--    <script>-->
<!---->
<!--        jQuery(document).on('submit', '#login-form', function (event) {-->
<!--            event.preventDefault();-->
<!---->
<!--            jQuery.ajax({-->
<!--                url: 'login.php',-->
<!--                type: 'POST',-->
<!--                dataType: 'json',-->
<!--                data: $(this).serialize(),-->
<!--                beforeSend: function () {-->
<!---->
<!--                }-->
<!--            }).done(function (respusta) {-->
<!--                console.log()-->
<!--            })-->
<!--        })-->
<!--        // $('document').ready(function(){-->
<!--        //     $("#btn-login").click(function(){-->
<!--        //         let data = $("#login-form").serialize();-->
<!--        //-->
<!--        //         $.ajax({-->
<!--        //             type: 'POST',-->
<!--        //             url: 'login.php',-->
<!--        //             data: data,-->
<!--        //             dataType: 'json',-->
<!--        //             beforeSend: function(){-->
<!--        //                 $("#btn-login").html("<img style='width: 30px;' src='img/Spinner-1s-200px.svg'>");-->
<!--        //             },-->
<!--        //             success: function(response){-->
<!--        //                 if(response.codigo == "1"){-->
<!--        //                     $("#btn-login").html('Entrar');-->
<!--        //                     $("#login-alert").css('display', 'none');-->
<!--        //                     window.location.href = "login.php";-->
<!--        //                 }else{-->
<!--        //                     $("#btn-login").html('Entrar');-->
<!--        //                     $("#login-alert").css('display', 'block');-->
<!--        //                     $("#mensagem").html('<strong>Erro! </strong>' + response.mensagem);-->
<!--        //                 }-->
<!--        //             }-->
<!--        //         });-->
<!--        //     });-->
<!--        //-->
<!--        // });-->
<!--    </script>-->
<?php require_once 'Footer.php'; ?>
