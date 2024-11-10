<?php
// Conexão com o banco de dados
$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=AutoClub', 'login', 'senha');

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $nome_usuario = $_POST['nome'];

    // Verificar se o e-mail existe no banco
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Gerar um token único para a redefinição de senha
        $token = bin2hex(random_bytes(50));
        $expires = date('U') + 3600; // Expira em 1 hora

        // Armazenar o token no banco de dados
        $stmt = $pdo->prepare("INSERT INTO senha_reset (email, token, expires) VALUES (:email, :token, :expires)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':expires', $expires);
        $stmt->execute();

        // Gerar o link de redefinição de senha
        $resetLink = "http://localhost/AutoClub_v5.1/login%20e%20cadastro/atualizar_senha.html?token=" . $token;

        // Assunto do e-mail
        $assunto = "Redefinição de Senha";

        // Corpo do e-mail (em HTML)
        $mensagem = "
        <html>
        <head>
            <title>$assunto</title>
        </head>
        <body>
            <p>Olá, $nome_usuario!</p>
            <p>Você solicitou a recuperação de senha. Para redefinir sua senha, clique no link abaixo:</p>
            <a href='$resetLink'>$resetLink</a>
            <p>Se você não solicitou, ignore este e-mail.</p>
        </body>
        </html>
        ";

        // Cabeçalhos para enviar e-mail em HTML
        $cabecalhos = "MIME-Version: 1.0" . "\r\n";
        $cabecalhos .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $cabecalhos .= "From: seuemail@dominio.com" . "\r\n";

        // Enviar o e-mail
        if (mail($email, $assunto, $mensagem, $cabecalhos)) {
            echo "<script>alert('Um link de redefinição de senha foi enviado para o seu e-mail.'); window.location.href = 'login.html';</script>";
        } else {
            echo "<script>alert('Falha ao enviar o e-mail.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('E-mail não encontrado.'); window.history.back();</script>";
    }
}
?>