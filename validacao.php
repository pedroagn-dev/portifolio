<?php

use Providers\SMTPMailProvider;

require './autoload.php';

try {
    $mail = new SMTPMailProvider();

    // Processa o formulário
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $mail->from = "mail@mail.com";
        $mail->to = "tomail@mail.com";
        $mail->subject = 'Contato do Site: ' . $name;
        $mail->body = "Nome: $name\nEmail: $email\n\n$message";

        if ($mail->send()) {
            echo 'Obrigado por entrar em contato!';
        } else {
            echo 'Houve um erro ao enviar sua mensagem. Tente novamente mais tarde.';
        }
    }
} catch (Exception $e) {
    echo 'Houve um erro ao enviar sua mensagem. Tente novamente mais tarde.';
    echo $e->getMessage();
}
