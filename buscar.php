<?php

require_once 'login.php';
require_once 'layout.php';

session_start();

if (!isset($_SESSION['sessaoemail']) && !isset($_SESSION['sessaosenha'])){session_destroy();header('location: aviso.php');}
?>
<div style="padding-top: 2%" class="form-group">
    <div><h5 style="color: #FFFFFF;">Digite o nome que deseja pesquisar</h5></div>
    <div class="form-inline my-2 my-lg-0 text-center">
        <input class="form-control mr-sm-2" type="search" id="palavra" placeholder="Perquisar" name="palavra" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" id="buscar" type="submit">Buscar</button>
        <div class="btn btn-group">
        <a href="index.php" class="btn btn-outline-primary">Voltar</a>
        </div>
    </div>

    <div id="dados"></div>
</div>

<script>

    $(document).ready(function(){
        $("#palavra").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    function buscar (palavra) {
        let page = 'buscando.php';
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: page,
            beforeSend: function () {
                $("#dados").html(
                    "<span id='carregando'>" +
                    "Pesquisando" +
                    "<img style='width: 35px; padding-top: 5px;' src='img/Ellipsis-1.6s-200px.gif'>" +
                    "</span>"
                    +"<img id='preloader' src=\"img/Magnify-1s-200px.svg\" />"
                 );
            },
            data: {palavra: palavra},
            success: function (msg) {
                $("#dados").html(msg);
            }
        });
    }

    $("#buscar").click(function () {
        buscar($("#palavra").val())
    });
</script>
<?php require_once 'Footer.php';?>