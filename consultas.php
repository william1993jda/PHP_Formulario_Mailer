<?php
require_once 'db.php';

$id    = trim($_POST['id']);
$nome  = trim($_POST['nome']);
$login = trim($_POST['email']);
$senha = trim($_POST['senha']);

try {
    $query = ("SELECT pessoa.id AS id, pessoa.nome AS nome, pessoa.senha AS senha, pessoa.email AS email FROM pessoa");
    $stmt  = $conn->prepare($query);
    $stmt->execute();

    $result = $stmt->rowCount();

    foreach  ($stmt as $key => $pessoa){
       $id    = $pessoa['id'];
       $nome  = $pessoa['nome'];
       $email = $pessoa['email'];
       $senha = $pessoa['senha'];
   }

}catch (Exception $e) {
    var_dump($e->getMessage());
}
