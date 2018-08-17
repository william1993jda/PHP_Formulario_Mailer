<?php

//if (isset($_SESSION['sessaoemail']) && (isset($_SESSION['sessaosenha']))){
//    header('location: Formulario.php');
//}else{
//    echo "Sessão não foi iniciada";
//}
ob_start();
session_start();

require_once 'db.php';

if (isset($_POST['logar'])){

    $login = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    try{
        $query = ('SELECT id,nome,perfil FROM pessoa WHERE email = :email AND senha = :senha');
        $stmt  = $conn->prepare($query);
        $stmt->bindValue(":email", $login, PDO::PARAM_STR);
        $stmt->bindValue(":senha", $senha, PDO::PARAM_STR);
        $stmt->execute();


        $result = $stmt->fetch();

        $_SESSION['user'] = $result;

        $selecionaPessoa = $stmt->rowCount();

        if ($selecionaPessoa > 0){
            $login = ['email'];
            $senha = ['senha'];

            //session_start();
            $_SESSION['sessaoemail'] = $login;
            $_SESSION['sessaosenha'] = $senha;
//            $_SESSION['user'] = $result;

            header("location: Formulario.php");
        }
        else{
            unset ($_SESSION['sessaoemail']);
            unset ($_SESSION['sessaosenha']);

//            return false;
//            echo "Dados incorretos";
            header("location: index.php");
        }

    }catch (Exception $e) {
        var_dump($e->getMessage());
    }
}