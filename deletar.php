<?php

$id = $_GET["id"];

include_once 'db.php';

try {

    $stmt = $conn->prepare('DELETE FROM pessoa WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

header('location: buscando.php');