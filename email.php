<?php

use PHPMailer\PHPMailer\PHPMailer;

function respondToContactForm($status, $success, $message)
{
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(array('success' => $success, 'message' => $message));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Allow: POST');
    respondToContactForm(405, false, 'Metodo non consentito.');
}

$email = isset($_POST['email_user']) && is_string($_POST['email_user'])
    ? trim($_POST['email_user'])
    : '';
$name = isset($_POST['nome']) && is_string($_POST['nome'])
    ? trim($_POST['nome'])
    : '';
$message = isset($_POST['messaggio_user']) && is_string($_POST['messaggio_user'])
    ? trim($_POST['messaggio_user'])
    : '';

if ($name === '' || $message === '' || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    respondToContactForm(400, false, 'Controlla nome, email e messaggio e riprova.');
}

$autoload = __DIR__ . '/vendor/autoload.php';
if (!is_file($autoload)) {
    error_log('Contact form email could not be sent: PHPMailer autoloader not found.');
    respondToContactForm(500, false, 'Siamo spiacenti, qualcosa è andato storto. Riprova più tardi.');
}

require_once $autoload;

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.hostinger.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->Username = 'contatti@civitelladellago.com';
$mail->Password = 'Pippi1989NA?';
$mail->setFrom('contatti@civitelladellago.com', 'Civitella del lago');
$mail->addAddress('pierpaolo.pdd@gmail.com', 'Receiver Name');
$mail->addReplyTo($email, $name);
$mail->Subject = 'Civitella del Lago contact form';
$mail->isHTML(false);
$mail->CharSet = 'UTF-8';
$mail->Body = "Email: {$email}\nName: {$name}\nMessage: {$message}";

if (!$mail->send()) {
    error_log('Contact form email could not be sent: ' . $mail->ErrorInfo);
    respondToContactForm(500, false, 'Siamo spiacenti, qualcosa è andato storto. Riprova più tardi.');
}

respondToContactForm(200, true, 'Messaggio inviato. Ti ringraziamo per averci contattato!');
