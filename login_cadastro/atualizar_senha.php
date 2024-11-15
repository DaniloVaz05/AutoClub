<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Atualizar Senha</title>
</head>

<body>
    <!-- COMEÇO DA NAVBAR -->
    <nav id="navbar" class="navbar navbar-expand-lg bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img id="logo" src="../imagens/AutoClub_logo.png" class="img-fluid" style="max-width: 80px; height: auto;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="/homeV2/home.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#sobre_nos">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#contato">Contato</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="login.html">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="cadastro.php">Cadastre-se</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- FIM DA NAVBAR -->

    <!-- Container para os Botões de Acessibilidade -->
    <div class="accessibility-buttons">
        <!-- Modo Claro / Escuro -->
        <button id="mode-toggle" class="btn"><i class="fas fa-moon"></i></button>
        <!-- Aumentar Fonte -->
        <button id="increase-font" class="btn"><i class="fas fa-search-plus"></i></button>
        <!-- Diminuir Fonte -->
        <button id="decrease-font" class="btn"><i class="fas fa-search-minus"></i></button>
    </div>
    
    <?php
// Iniciar a sessão
session_start();

// Conexão com o banco de dados
require("../includes/conexao.php");

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

    // Verificar se o usuário foi encontrado
    if ($row) {
        // Armazenar o CPF na sessão
        $_SESSION["cpf"] = $row["cpf"];

        // Redireciona para a página de atualização de senha
        header('Location: ../login_cadastro/atualizar_senha.php');
        exit();
    } else {
        // Caso nenhum registro seja encontrado
        echo '<script>';
        echo 'alert("E-mail ou CPF incorreta!");';
        echo 'window.location.href = "../login_cadastro/recuperar_senha.html";'; // Redireciona para o formulário
        echo '</script>';
    }
}
?>

    <!-- Container principal -->
    <div class="container">
        <!-- Seção de Login -->
        <section class="login-section">
            <h2>Criar Senha</h2>
            <form id="loginForm" class="loginForm" method="POST" action="">
                <div class="mb-3">
                    <label for="senha" class="form-label">Nova Senha</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua nova senha" maxlength="8" minlength="8">
                        <span class="input-group-text">
                            <i id="toggleSenha" class="fa fa-eye" style="cursor: pointer;"></i>
                        </span>
                    </div>
                </div>               

                <div class="mb-3">
                    <label for="confirmarSenha" class="form-label">Confirmar Senha</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="confirmarSenha" name="confirmarSenha" placeholder="Confirme sua nova senha" maxlength="8" minlength="8">
                        <span class="input-group-text">
                            <i id="toggleConfirmarSenha" class="fa fa-eye" style="cursor: pointer;"></i>
                        </span>
                    </div>
                </div>
                
                <div class="acoes-login">
                    <button type="submit" class="btn entrar">Confirmar</button>
                </div>
            </form>
        </section>
    </div>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="cadastro.js"></script>

    <!-- JS modo escuro -->
    <script>
        document.getElementById('mode-toggle').addEventListener('click', function () {
            document.body.classList.toggle('dark-mode');
        });
    </script>

    <!-- JS Aumentar e diminuir tamanho da fonte -->
    <script>
        let fontSize = 16;

        document.getElementById('increase-font').addEventListener('click', function () {
            fontSize += 2;
            document.body.style.fontSize = fontSize + 'px';
        });

        document.getElementById('decrease-font').addEventListener('click', function () {
            fontSize -= 2;
            document.body.style.fontSize = fontSize + 'px';
        });
    </script>

    <!-- JS Exibir/Ocultar Senha -->
    <script>
        document.getElementById('toggleSenha').addEventListener('click', function() {
            const senhaField = document.getElementById('senha');
            senhaField.type = senhaField.type === 'password' ? 'text' : 'password';
            this.classList.toggle('fa-eye-slash');
        });

        document.getElementById('toggleConfirmarSenha').addEventListener('click', function() {
            const confirmarSenhaField = document.getElementById('confirmarSenha');
            confirmarSenhaField.type = confirmarSenhaField.type === 'password' ? 'text' : 'password';
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
