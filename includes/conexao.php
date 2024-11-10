<?php
    // Configuração dos dados de conexão com o banco de dados
    $hostname = "localhost";
    $usuario = "root";
    $senha = "";
    $database = "autoclub";

    // Cria uma nova instância da classe mysqli para estabelecer a conexão
    $conexao = new mysqli($hostname, $usuario, $senha, $database);

    // Verifica se houve algum erro durante a conexão
    if ($conexao->connect_error) {
        // Em caso de erro, interrompe a execução do script e exibe a mensagem de erro
        die("Erro de conexão com o banco de dados: ");
    } else{
        echo "Conexão feita";
    }

    // Configura o conjunto de caracteres para UTF-8 para garantir a correta exibição de caracteres especiais
    $conexao->set_charset("utf8");
?>
