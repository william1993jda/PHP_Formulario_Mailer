<?php

require_once 'db.php';
require_once 'login.php';

if ($_POST) {

    $nomeC = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = ('SELECT * FROM pessoa WHERE email = :email');
    $stmt  = $conn->prepare($query);
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount($query) > 0) {
        header('location: emailJacadastrado.php');
    } else {

        $sql  = ("INSERT INTO pessoa (nome, senha, email) VALUES ('$nomeC', '$senha', '$email')");
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":nome",  $nomeC);
        $stmt->bindParam(":senha", $senha);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        header('location: cadastradoSucesso.php');
    }
}