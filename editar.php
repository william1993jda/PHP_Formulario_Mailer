<?php

require_once 'layout.php';
require_once 'consultas.php';
require_once 'dataHora.php';

if (!isset($_SESSION['sessaoemail']) && !isset($_SESSION['sessaosenha'])){
    session_destroy();
    header('location: aviso.php');
}

$id = (int)$_GET['id'];

$id = (intval($_GET['id']) != "") ? $id = intval($_GET['id']) : header("Location: index.php");

$id = ($_GET && array_key_exists('id', $_GET)) ? intval($_GET['id']) : header("Location: index.php");

$stmt = $conn->prepare('SELECT * FROM pessoa WHERE id = :id');

$stmt->bindParam(":id", $id);

//var_dump($id);

if ($stmt->execute()) {
    $stmt = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}

//var_dump($stmt);

// pega o ID da URL
//$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
//
//// valida o ID
//if (empty($id))
//{
//    echo "ID para alteração não definido";
//    exit;
//}

//// busca os dados du usuário a ser editado
//
//$sql = "SELECT nome, email, senha FROM pessoa WHERE id = '1'";
//$stmt = $conn->prepare($sql);
//$stmt->bindParam(':id', $id, PDO::PARAM_INT);
//
//$stmt->execute();
//
//$user = $stmt->fetch(PDO::FETCH_ASSOC);
//
//// se o método fetch() não retornar um array, significa que o ID não corresponde a um usuário válido
//if (!is_array($user))
//{
//    echo "Nenhum usuário encontrado";
//    exit;
//}

?>

<form style="margin-top: 15%;background-color: #343A40; color: #FFFFFF;" action="update.php" id="form-editar" method="post" class="col-6 jumbotron animated bounceIn">
    <img class="float-right" style="width: 65px; margin-top: -55px;" src="img/icon-php1-1.png" alt="">
    <h4>Insira os dados para atualizar</h4>
    <hr>

    <input type="hidden" name="datas" id="datas" value="<?=$today=date("d.m.y");?>">
    <input type="hidden" name="hora" id="hora" value="<?=date('H:i:s',$unpack0[7]);?>">

    <input type="hidden" name="id" id="id" value="<?=$stmt['id'];?>">

    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" class="form-control" id="nome" value="<?=$stmt['nome']?>" placeholder="Seu nome">
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control" id="email" value="<?=$stmt['email']?>" aria-describedby="emailHelp" placeholder="exemplo@email.com">
    </div>

    <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" class="form-control" value="<?=$stmt['senha']?>" id="senha" placeholder="******">
    </div>
    <div class="form-group">
        <label for="senha">Confirmar senha:</label>
        <input type="password" name="confirmarSenha" class="form-control" id="confirmarSenha" placeholder="******">
    </div>
    <br>
    <div class="control-group float-right">
        <a class="btn btn-outline-primary" href="Formulario.php">Voltar</a>&nbsp;
        <input type="submit" value="Salvar" class="btn btn-outline-success">
    </div>
</form>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img style="width: 60px" src="img/exclamation-mark.svg" alt="">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="modalCadastro" role="alert">
                        O campo <strong>senha</strong> e <strong>confirmar senha</strong>, devem ser iguais!
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'Footer.php'?>