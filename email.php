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
    $mail->setFrom('contatti@civitelladellago.com', 'Mr. Snuffles');
    $mail->addAddress('pierpaolo.pdd@gmail.com', 'Receiver Name');
    if ($mail->addReplyTo($_POST['email_user'], $_POST['nome'])) {
        $mail->Subject = 'PHPMailer contact form';
        $mail->isHTML(false);
        $mail->Body = <<<EOT
            Email: {$_POST['email_user']}
            Name: {$_POST['nome']}
            Message: {$_POST['message_user']}
EOT;
        if (!$mail->send()) {
            $msg = 'Sorry, something went wrong. Please try again later.';
        } else {
            $msg = 'Message sent! Thanks for contacting us.';
        }
    } else {
        $msg = 'Share it with us!';
    }
}
else{
    $msg = 'Error!';
}
header("Location: /index.html", true, 301);  
exit();  
?>