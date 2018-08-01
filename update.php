<?php

require_once 'db.php';

$nome  = isset($_POST['nome']) ? $_POST['nome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;
$id    = isset($_POST['id']) ? $_POST['id'] : null;

//$id    = filter_input(INPUT_POST, 'id',    FILTER_SANITIZE_NUMBER_INT);
//$nome  = filter_input(INPUT_POST, 'nome',  FILTER_SANITIZE_STRING);
//$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
//$senha = filter_input(INPUT_POST, 'senha');

// validação (bem simples, mais uma vez)
if (empty($nome) || empty($email) || empty($senha)) {
echo "Volte e preencha todos os campos";
exit;
}

// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
//$isoDate = dateConvert($birthdate);

// atualiza o banco

$stmt = $conn->prepare("UPDATE pessoa SET nome='$nome', email='$email', senha = '$senha' WHERE id = '$id'");
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senha);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
header('Location: Formulario.php');
} else {
echo "Erro ao alterar";
print_r($stmt->errorInfo());
}