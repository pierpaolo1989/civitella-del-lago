<?php
use PHPMailer\PHPMailer\PHPMailer;
$msg = '';
if (array_key_exists('email_user', $_POST)) {
    require 'vendor/autoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->Port = 587;
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->Username = 'contatti@civitelladellago.com';
    $mail->Password = 'Pippi1989NA?';
    $mail->setFrom('contatti@civitelladellago.com', 'Civitella del lago');
    $mail->addAddress('pierpaolo.pdd@gmail.com', 'Receiver Name');
    if ($mail->addReplyTo($_POST['email_user'], $_POST['nome'])) {
        $mail->Subject = 'Civitella del Lago contact form';
        $mail->isHTML(false);
        $mail->Body = <<<EOT
            Email: {$_POST['email_user']}
            Name: {$_POST['nome']}
            Message: {$_POST['messaggio_user']}
EOT;
        if (!$mail->send()) {
            $msg = 'Siamo spiacenti, qualcosa è andato storto. Riprova più tardi';
        } else {
            $msg = 'Messaggio inviato. Ti ringraziamo per averci contattato!';
        }
    } else {
        $msg = 'Share it with us!';
    }
}
else{
    $msg = 'Siamo spiacenti, qualcosa è andato storto. Riprova più tardi';
}
header("Location: /index.php", true, 301);  
exit(); 
?>
