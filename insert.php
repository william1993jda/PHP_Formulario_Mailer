<?php

require_once 'db.php';
require_once 'login.php';


if ($_POST) {

    $nomeC  = $_POST['nome'];
    $email  = $_POST['email'];
    $senha  = $_POST['senha'];
    $datas  = $_POST['datas'];
    $hora   = $_POST['hora'];
    $perfil = $_POST['perfil'];

    $query = ('SELECT * FROM pessoa WHERE email = :email');
    $stmt  = $conn->prepare($query);
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount($query) > 0) {
        header('location: emailJacadastrado.php');
    } else {

        $sql  = ("INSERT INTO pessoa (nome, senha, email, datas, hora, perfil) VALUES ('$nomeC', '$senha', '$email', '$datas', '$hora', '$perfil')");
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":nome",  $nomeC);
        $stmt->bindParam(":senha", $senha);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":datas", $hora);
        $stmt->bindParam(":hora",  $hora);
        $stmt->bindParam(":perfil", $perfil);
        $stmt->execute();

        header('location: cadastradoSucesso.php');
    }
}