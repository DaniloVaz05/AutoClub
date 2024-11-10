<?php
require("../AutoClub/includes/recuperar_senha.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

$email = $_POST['email'];
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'danilofermianoborges@gmail.com';
$mail->Password = 'senha';
$mail->Port = 587;

$mail->setFrom($email);
$mail->addReplyTo('no-reply@email.com.br');
$mail->addAddress('email@email.com.br', 'Nome');
$mail->addAddress('email@email.com.br', 'Contato');
$mail->addCC('email@email.com.br', 'Cópia');
$mail->addBCC('email@email.com.br', 'Cópia Oculta');

// Configura o conteúdo do e-mail
$mail->isHTML(true); // Define o formato do e-mail como HTML
$mail->Subject = 'Assunto do E-mail';
$mail->Body = '<p>Corpo do e-mail em HTML</p>';
$mail->AltBody = 'Texto alternativo para clientes de e-mail que não suportam HTML';

// Envia o e-mail
if(!$mail->send()) {
    echo 'Erro ao enviar o e-mail: ' . $mail->ErrorInfo;
} else {
    echo 'E-mail enviado com sucesso';
}

?>