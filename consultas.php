<?php

require_once 'db.php';

$id    = trim($_POST['id']);
$nome  = trim($_POST['nome']);
$login = trim($_POST['email']);
$senha = trim($_POST['senha']);

try {
    $query = ("SELECT pessoa.id AS id, pessoa.nome AS nome, pessoa.senha AS senha, pessoa.email AS email FROM pessoa");
    $stmt  = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':email', $id, PDO::PARAM_STR);
    $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
    $stmt->execute();

    foreach  ($stmt as $key => $pessoa){
       $id    = $pessoa->id;
       $nome  = $pessoa->nome;
       $email = $pessoa->email;
       $senha = $pessoa->senha;
   }

}catch (Exception $e) {
    var_dump($e->getMessage());
}
