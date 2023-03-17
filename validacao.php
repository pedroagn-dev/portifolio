<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Configuração de e-mail
$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.example.com';
$mail->SMTPAuth = true;
$mail->Username = 'user@example.com';
$mail->Password = 'secret';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Configuração de mensagem
$mail->setFrom('from@example.com', 'Nome do Remetente');
$mail->addAddress('recipient@example.com', 'Nome do Destinatário');
$mail->addReplyTo('reply@example.com', 'Nome da Resposta');
$mail->Subject = 'Assunto do E-mail';
$mail->Body = 'Conteúdo do E-mail';

// Processa o formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Adiciona informações do formulário na mensagem
    $mail->addReplyTo($email, $name);
    $mail->Subject = 'Contato do Site: ' . $name;
    $mail->Body = "Nome: $name\nEmail: $email\n\n$message";

    // Envia o e-mail
    if ($mail->send()) {
        echo 'Obrigado por entrar em contato!';
    } else {
        echo 'Houve um erro ao enviar sua mensagem. Tente novamente mais tarde.';
    }
}
