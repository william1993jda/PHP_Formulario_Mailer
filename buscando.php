<?php
$palavra   = $_POST['palavra'];
require_once 'consultas.php';
if (!isset($_SESSION['sessaoemail']) && !isset($_SESSION['sessaosenha'])){session_destroy();header('location: aviso.php');}
?>

<?php if ($seleciona->rowCount() > 0 ){ ?>
    <div id="seila" class="alert" style="display: none"></div>
    <table style="margin-top: 2%; border-radius: 4px" class="table table-striped table-dark col-sm-12 bounceIn" id="myTable">
        <thead class="thead-dark">
        <tr>
            <th class="text-uppercase" scope="col">#</th>
            <th class="text-uppercase" scope="col">Nome</th>
            <th class="text-uppercase" scope="col">E-mail</th>
            <?php if($_SESSION['user']['perfil'] == "Admin"): ?>
                <th class="text-uppercase" scope="col">Editar</th>
            <?php endif;?>
        </tr>
        </thead>

        <tbody>
        <?php while ($linha = $seleciona->fetch(PDO::FETCH_ASSOC)): ?>
            <tr id="tr">
                <th scope="row"><?=$linha['id']?></th>
                <td class="text-uppercase"><?=$linha['nome']?></td>
                <td><?=$linha['email']?></td>
                <?php if($_SESSION['user']['perfil'] == "Administrador"): ?>
                    <td>
                        <a class="btn btn-outline-primary" href="editar.php?id=<?=$linha['id'];?>">Editar
                            <img src="img/pencil-2x.png" alt="">
                        </a>
                    </td>
                    <!-- <td><a href="deletar.php?id=--><?//=$linha['id'];?><!--" class="btn btn-outline-danger">Excluir</a></td>-->
                    <td>
                        <button class="btn btn-outline-danger" id="deletando" onclick="deleteData(<?=$linha['id'];?>)">Excluir
                            <img src="img/recycle-bin2.png" alt="">
                        </button>
                    </td>
                <?php endif;?>
            </tr>
        <?php endwhile;?>
        </tbody>
    </table>
<?php } else{ ?>
    <div style="margin-top: 50%" class="alert alert-danger">Não foram encontrados registros com esta palavra</div>
<?php } ?>