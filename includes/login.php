<?php
session_start();
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["login"];
    $senha = $_POST["senha"];

    $consultaUsuario = "SELECT * FROM usuario WHERE email = ?";
    $stmtUsuario = $conexao->prepare($consultaUsuario);
    $stmtUsuario->bind_param("s", $email);
    $stmtUsuario->execute();
    $resultUsuario = $stmtUsuario->get_result();

    if ($resultUsuario->num_rows > 0) {
        $rowUsuario = $resultUsuario->fetch_assoc();

        if (password_verify($senha, $rowUsuario["senha"])) {
            $_SESSION["id_usuario"] = $rowUsuario["id_usuario"];
            $_SESSION["nome"] = $rowUsuario["nome"];
            $_SESSION["email"] = $rowUsuario["email"];
            $_SESSION["level"] = $rowUsuario["level"];
            $_SESSION["foto"] = $rowUsuario["foto"];

            if ($rowUsuario["level"] == 1) {
                header("Location: ../perfil/perfil_master.html");
            } else {
                header("Location: ../home/home_logado.html");
            }
            exit();
        } else {
            echo "<script>alert('Senha incorreta. Tente novamente.'); window.location.href = '../Tela de erro/Tela de erro.html';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Usuário não encontrado. Verifique suas informações.'); window.location.href = '../Tela de erro/Tela de erro.html';</script>";
        exit();
    }
}
?>