<?php

$username = "root";
$password = "root";

try {
    $conn = new PDO('mysql:host=localhost;dbname=pessoa', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare('SELECT * FROM pessoa');
    $stmt->execute(array('id' => $id));

    if ($conn){
        echo "<h1>deu certo</h1>";
    }else{
        echo "Deu ruim";
    }

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        print_r($row['nome']."<br>");
    }
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
//
//if (!empty($_POST['Email'] == "william.aquino@atitude.com.br") && !empty($_POST['Senha'] == "123456")){
//    header('location: Formulario.php');
//}else{
//    header('location: index.php');
//}
