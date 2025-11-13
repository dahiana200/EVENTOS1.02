<?php
use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Username = 'tu_username_mailtrap';
$mail->Password = 'tu_password_mailtrap';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 2525;

// Correo de bienvenida
$mail->setFrom('noreply@miapp.com', 'Mi App');
$mail->addAddress($userEmail, $userName);
$mail->Subject = '¡Bienvenido!';
$mail->Body = '<h1>¡Hola!</h1><p>Gracias por registrarte.</p>';
$mail->isHTML(true);
$mail->send();
?>