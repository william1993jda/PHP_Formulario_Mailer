<?php

require_once 'db.php';
require_once 'login.php';

if ($_POST) {

    $nomeC = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

//    $query = ('SELECT * FROM pessoa WHERE email = :email');
//    $stmt  = $conn->prepare($query);
//    $stmt->bindValue(":email", $email, PDO::PARAM_STR);
//    $stmt->execute();

    if ($stmt->rowCount($query) > 0) {
        echo "Email já cadastrado!";
    } else {

        $sql  = ("INSERT INTO pessoa (nome, senha, email) VALUES ('$nomeC', '$senha', '$email')");
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":nome",  $nomeC);
        $stmt->bindParam(":senha", $senha);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        echo "Cadastrado com sucesso!";
        header('Refresh:2, index.php');

//        if ($stmt) {
//            echo "Parabens, seu cadastro foi efetuado com sucesso!";
//        } else {
//            echo "Deu ruim";
//        }
    }
}