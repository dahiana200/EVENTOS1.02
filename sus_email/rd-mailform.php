<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php'; // si usaste composer
// Si descargaste PHPMailer manualmente, ajusta el require al autoload de PHPMailer

$adminEmail = "minsshijoo@gmail.com";
$smtpHost = "smtp.gmail.com"; // smtp.gmail.com, smtp.office365.com, etc.
$smtpUser = "minsshijoo@gmail.com";
$smtpPass = "TU_CONTRASEÑA_SMTP";
$smtpPort = 587; // 587 o 465
$smtpSecure = 'tls'; // 'tls' o 'ssl'

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if (!$email) {
    header("HTTP/1.1 400 Bad Request");
    echo "Email inválido.";
    exit;
}

// Construir PHPMailer
$mail = new PHPMailer(true);
try {
    // Configuración SMTP
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUser;
    $mail->Password = $smtpPass;
    $mail->SMTPSecure = $smtpSecure;
    $mail->Port = $smtpPort;

    // Mensaje al admin
    $mail->setFrom('no-reply@tusitio.com', 'Tu Sitio');
    $mail->addAddress($adminEmail);
    $mail->addReplyTo('no-reply@tusitio.com');

    $mail->Subject = "Nueva suscripción - Sitio web";
    $body = "Nueva suscripción:\n\nEmail: {$email}\nFecha: " . date('Y-m-d H:i:s') . "\nIP: " . $_SERVER['REMOTE_ADDR'];
    $mail->Body = $body;

    $mail->send();

    // Enviar confirmación al usuario (nuevo objeto para evitar interferencias)
    $mail2 = new PHPMailer(true);
    $mail2->isSMTP();
    $mail2->Host = $smtpHost;
    $mail2->SMTPAuth = true;
    $mail2->Username = $smtpUser;
    $mail2->Password = $smtpPass;
    $mail2->SMTPSecure = $smtpSecure;
    $mail2->Port = $smtpPort;

    $mail2->setFrom('no-reply@tusitio.com', 'Tu Sitio');
    $mail2->addAddress($email);
    $mail2->Subject = "Gracias por suscribirte";
    $mail2->Body = "Hola,\n\nGracias por suscribirte. Pronto recibirás noticias nuestras.\n\nSaludos.";
    $mail2->send();

    // Respuesta JSON o redirección
    header('Content-Type: application/json');
    echo json_encode(["status" => "ok"]);
} catch (Exception $e) {
    error_log("Mail error: " . $mail->ErrorInfo);
    header("HTTP/1.1 500 Internal Server Error");
    echo "Error enviando correo.";
}
