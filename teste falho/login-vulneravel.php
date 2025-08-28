<?php
include 'conexao.php';

// Só processa se o formulário for enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($email !== '' && $senha !== '') {
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email=? AND senha=?");
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Login realizado com sucesso!";
        } else {
            echo "Email ou senha inválidos!";
        }
    } else {
        echo "Por favor, preencha todos os campos!";
    }
} else {
    echo "Acesse esta página pelo formulário de login.";
}

$conn->close();
?>
