<?php

require_once 'layout.php';
require_once 'consultas.php';

if (!isset($_SESSION['sessaoemail']) && !isset($_SESSION['sessaosenha'])){
    session_destroy();
    header('location: aviso.php');
}

$id = (int)$_GET['id'];

$id = (intval($_GET['id']) != "") ? $id = intval($_GET['id']) : header("Location: index.php");

$id = ($_GET && array_key_exists('id', $_GET)) ? intval($_GET['id']) : header("Location: index.php");

$stmt = $conn->prepare('SELECT * FROM pessoa WHERE id = :id');

$stmt->bindParam(":id", $id);

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

<form style="margin-top: 15%;" action="update.php" method="post" class="col-6 jumbotron">
    <img class="float-right" style="width: 65px; margin-top: -55px;" src="img/icon-php1-1.png" alt="">
    <h4>Insira os dados para atualizar</h4>
    <hr>

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

    <div class="control-group float-right">
        <a class="btn btn-outline-primary" href="Formulario.php">Voltar</a>
        <input type="submit" value="Salvar" class="btn btn-outline-dark">
    </div>
</form>
<?php require_once 'Footer.php'?>

