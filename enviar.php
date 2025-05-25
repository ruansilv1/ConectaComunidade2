<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Configurações do servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'robsonnola8@gmail.com'; // seu e-mail
    $mail->Password = 'fstumxoclpexgvzk'; // ou senha do app, se usa 2FA
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // SSL fix
    $mail->SMTPOptions = [
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    ]
];

    // Remetente e destinatário
    $mail->setFrom('robsonnola8@gmail.com', 'Conecta Comunidade');
    $mail->addAddress('robsonnola8@gmail.com', 'Você');

    // Conteúdo
    $mail->isHTML(true);
    $mail->Subject = 'Nova mensagem do formulario';
    $mail->Body = "Nome: {$_POST['nome']}<br>Email: {$_POST['email']}<br>Mensagem:<br>{$_POST['mensagem']}";
    $mail->AltBody = "Nome: {$_POST['nome']}\nEmail: {$_POST['email']}\nMensagem:\n{$_POST['mensagem']}";

    // Envio
    $mail->send();
    echo 'Mensagem enviada com sucesso!';
} catch (Exception $e) {
    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
?>
