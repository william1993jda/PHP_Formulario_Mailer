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
        $query = ('SELECT * FROM pessoa WHERE email = :email AND senha = :senha');
        $stmt  = $conn->prepare($query);
        $stmt->bindValue(":email", $login, PDO::PARAM_STR);
        $stmt->bindValue(":senha", $senha, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->rowCount();

        if ($result > 0){
            $login = ['email'];
            $senha = ['senha'];

            //session_start();
            $_SESSION['sessaoemail'] = $login;
            $_SESSION['sessaosenha'] = $senha;
            //echo "Logado com sucesso";

            //header("Refresh:3, Formulario.php");
            header("location: Formulario.php");

        }
        else{
            unset ($_SESSION['sessaoemail']);
            unset ($_SESSION['sessaosenha']);
            echo "Dados incorretos";
            header("location: index.php");
        }

    }catch (Exception $e) {
        var_dump($e->getMessage());
    }
}