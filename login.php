<?php

if ($_GET){
    header('location: Formulario.php');
}

ob_start();
session_start();

//if (isset($_SESSION['sessaoemail']) && (isset($_SESSION['sessaosenha']))){
//    header('location: Formulario.php');
//}else{
//    echo "Sessão não foi iniciada";
//}

require_once 'db.php';

if (isset($_POST['logar'])){

    $login = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    $query = ('SELECT * FROM pessoa WHERE email = :email AND senha = :senha');

    try{
        $stmt = $conn->prepare($query);
        $stmt->bindValue(":email", $login, PDO::PARAM_STR);
        $stmt->bindValue(":senha", $senha, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->rowCount();

        if ($result > 0){
            $login = ['email'];
            $senha = ['senha'];

//            session_start();
            $_SESSION['sessaoemail'] = $login;
            $_SESSION['sessaosenha'] = $senha;

            echo "Logado com sucesso";

            header("Refresh:3, Formulario.php");

        }else{
            unset ($_SESSION['sessaoemail']);
            unset ($_SESSION['sessaosenha']);
            echo "Dados incorretos";
            header("Refresh:2, index.php");
        }

    }catch (Exception $e) {
        var_dump($e->getMessage());
    }
}

//    while($dados = $stmt->fetch(PDO::FETCH_ASSOC)) {
//        session_start();
//        $_SESSION['email'] = $login;
//        $_SESSION['senha'] = $senha;
//    }
//
//}else {
//    //Destrói
//    session_destroy();
//
//    //Limpa
//    unset ($_SESSION['email']);
//    unset ($_SESSION['senha']);
//
//    //Redireciona para a página de autenticação
//    header('location:index.php');
//}

//Caso o usuário não esteja autenticado, limpa os dados e redireciona
