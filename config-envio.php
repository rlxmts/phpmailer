<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $tel = $_POST['tel'];

    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Username = 'EMAIL DO CLIENTE';
        $mail->Password = 'SENHA DO EMAIL';
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'HOST DO CLIENTE';
        $mail->Port = 587; // 

        // Define o remetente
        $mail->setFrom('CLIENTE@SITE.COM.BR', 'NOME DA EMPRESA OU CLIENTE');

        // Define o destinatário
        $mail->addAddress('CLIENTE#SITE.COM.BR', 'NOME DA EMPRESA OU CLIENTE');

        // Conteúdo da mensagem
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'E-mail enviado do form do site';
        $mail->Body = "Nome: $name<br>Email: $email<br>Telefone:$tel <br> Mensagem: $message";
        $mail->AltBody = "Nome: $name\nEmail: $email\nTelefone: $tel\nMensagem: $message";

        // Enviar
        $mail->send();
        echo 'A mensagem foi enviada!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
