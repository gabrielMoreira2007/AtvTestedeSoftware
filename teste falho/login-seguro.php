<?php
include 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

// Prepared statement (seguro)
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE email=? AND senha=?");
$stmt->bind_param("ss", $email, $senha);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Login realizado com sucesso!";
} else {
    echo "Email ou senha inválidos!";
}

$stmt->close();
$conn->close();
?>
