<?php
//comecei a sessão
session_start();

//incluí a conexão no arquivo
require("conexao.php");

//verificando se a requisição foi feita via método post e pegando a variáveis do formulário
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $nomeMaterno = $_POST["nomeMaterno"];
    $dataNasc = $_POST["dataNasc"];
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
    $nivel = 1;
    $assinatura = $_POST["assinatura"];

    $dataNasc = date("Y-m-d", strtotime($dataNasc));

    //preparando a conculta
    $consulta = "INSERT INTO usuario(nome, cpf, nomeMaterno, dataNasc, sexo, telefone, logradouro, numero, bairro, cidade, uf, cep, email, senha, nivel, id_assinatura)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    //preparando a declaração da cosulta
    $stmt = $conexao->prepare($consulta);

    $stmt->bind_param("ssssssssssssssii", $nome, $cpf, $nomeMaterno, $dataNasc, $sexo, $telefone, $logradouro, $numero, $bairro, $cidade, $uf, $cep, $email, $senha, $nivel, $assinatura);

    if ($assinatura === 0) {
        echo "\n<script>";
        echo "\nalert('Desculpe! A assinatura é obrigatória!')";
        echo "\nwindow.location.href = '../home/home.html'";
        echo "\n</script>";
    } else {
        //varificando se as senhas estão corretas
        if ($senha === $confSenha) {
            //criptografando a senha
            $senha = password_hash($_POST["senha"], PASSWORD_BCRYPT);
            //executo a consulta
            $stmt->execute();

            header('location: ../login_cadastro/login.html');

            // Encerra o script após o redirecionamento
            exit();
        } else {
            echo "\n<script>";
            echo "\nalert('Senhas estão incorretas. Por favor, insira as senhas novamente!')";
            echo "\n</script>";
        }
    }
}
?>