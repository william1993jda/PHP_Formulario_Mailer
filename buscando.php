<?php
require_once 'db.php';
require_once 'login.php';

if (!isset($_SESSION['sessaoemail']) && !isset($_SESSION['sessaosenha'])){session_destroy();header('location: aviso.php');}

$palavra    = $_POST['palavra'];
$query      = ("SELECT * FROM pessoa WHERE nome LIKE '%$palavra%'");
$seleciona  = $conn->prepare($query);
$seleciona->execute();

?>

<?php if ($seleciona->rowCount() > 0 ){ ?>
    <div id="seila" class="alert" style="display: none"></div>
    <table style="margin-top: 5%" class="table table-striped table-dark col-sm-12" id="myTable">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($linha = $seleciona->fetch(PDO::FETCH_ASSOC)): ?>
                <tr id="tr">
                    <th scope="row"><?=$linha['id']?></th>
                    <td><?=$linha['nome']?></td>
                    <td><?=$linha['email']?></td>
                    <td><a class="btn btn-outline-primary" href="editar.php?id=<?=$linha['id'];?>">Editar</a></td>
<!--                    <td><a href="deletar.php?id=--><?//=$linha['id'];?><!--" class="btn btn-outline-danger">Excluir</a></td>-->
                    <td><button class="btn btn-outline-danger" id="deletando" onclick="deleteData(<?=$linha['id'];?>)">Excluir</button></td>
                </tr>
            <?php endwhile;?>
            <script>
                function deleteData(str) {

                    let id = str;
                    $.ajax({
                        type: "GET",
                        url: "deletar.php",
                        data:"id="+id,
                        beforeSend: function () {
                            $("#seila").html(
                                "<span style='color: red;' id='carregando'>"+"Excluindo"+"</span>"+"<img style='width: 40px' src=\"img/Spinner-1s-200px.svg\" />"
                            );
                        },
                        success: function (msg) {
                            $("#dados").html(msg);
                        }
                    });
                }
                $("#deletando").click(function () {
                    $(".alert").css('display', 'block');
                    id($("#deletando").val());
                });
            </script>
        </tbody>
    </table>
<?php } else{ ?>
    <div style="margin-top: 50%" class="alert alert-danger">Não foram encontrados registros com esta palavra</div>
<?php } ?>