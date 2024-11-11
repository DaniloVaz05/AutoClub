<?php
session_start();
require("conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $nomeMaterno = $_POST["nomeMaterno"];
    $dataNasc = date("Y-m-d", strtotime($_POST["dataNasc"]));
    $sexo = $_POST["sexo"];
    $telefone = $_POST["telefone"];
    $logradouro = $_POST["logradouro"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $uf = $_POST["uf"];
    $cep = $_POST["cep"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confSenha = $_POST["confirmarSenha"];
    $assinatura = intval($_POST["assinatura"]);
    $nivel = 1;

    if (empty($assinatura)) {
        echo "<script>alert('Assinatura é obrigatória!'); window.location.href = '../home/home.html';</script>";
        exit();
    }

    if ($senha === $confSenha) {
        $senha = password_hash($senha, PASSWORD_BCRYPT);

        $consulta = "INSERT INTO usuario ( nome, cpf, nomeMaterno, dataNasc, sexo, telefone, logradouro, numero, bairro, cidade, uf, cep, email, senha, nivel, id_assinatura)
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conexao->prepare($consulta);
        $stmt->bind_param(
            "ssssssssssssssii", 
            $nome, 
            $cpf, 
            $nomeMaterno, 
            $dataNasc, 
            $sexo, 
            $telefone, 
            $logradouro, 
            $numero, 
            $bairro, 
            $cidade, 
            $uf, 
            $cep, 
            $email, 
            $senha, 
            $nivel, 
            $assinatura
        );

        if ($stmt->execute()) {
            header('Location: ../login_cadastro/login.html');
            exit();
        } else {
            echo "<script>alert('Erro ao cadastrar usuário. Por favor, tente novamente!');</script>";
        }
    } else {
        echo "<script>alert('Senhas não coincidem!');</script>";
    }
}
?>
