<?php

// Conexão com o banco de dados
require("conexao.php");

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $CPF = trim($_POST['cpf']);

    // Preparar a query para evitar SQL Injection
    $query = "SELECT * FROM usuario WHERE email = ? AND cpf = ?";
    $stmt = $conexao->prepare($query);

    // Vincular parâmetros
    $stmt->bind_param("ss", $email, $CPF);

    // Executar a consulta
    $stmt->execute();

    // Obter o resultado
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $_SESSION["cpf"] = $row["cpf"];

    if (!$row) {
        // Caso nenhum registro seja encontrado
        echo '<script>';
        echo 'alert("E-mail ou CPF incorreta!");';
        echo 'window.location.href = "../login_cadastro/recuperar_senha.html";'; // Redireciona para o formulário
        echo '</script>';
    } else {
        // Redireciona para a página de atualização de senha
        header('Location: ../login_cadastro/atualizar_senha.php');
        exit();
    }
}
?>
