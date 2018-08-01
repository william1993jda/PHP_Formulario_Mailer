<?php

require_once 'db.php';
require_once 'login.php';
$id    = trim($_POST['id']);
$nome  = trim($_POST['nome']);
$div = $_SESSION['sessaoemail'];
$senha = trim($_POST['senha']);

try {
    $query = ("SELECT pessoa.id AS id, pessoa.nome AS nome, pessoa.senha AS senha, pessoa.email AS email FROM pessoa");
//    $query = ("SELECT * FROM pessoa WHERE email = '$login'");
    $selecionaUsuario  = $conn->prepare($query);
    $selecionaUsuario->bindParam(':email', $login, PDO::PARAM_STR);
    $selecionaUsuario->execute();

    foreach  ($selecionaUsuario as $key => $pessoa){
       $id    = $pessoa->id;
       $nome  = $pessoa->nome;
       $email = $pessoa->email;
       $senha = $pessoa->senha;
   }

}catch (Exception $e) {
    var_dump($e->getMessage());
}
