<?php

if(isset($_POST['email'])){


$name = $_POST['fname'];
$email = $_POST['email-2'];
$Asunto = $_POST['subject'];
$mensaje = $_POST['message-2'];

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.ideay.info';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'administracion@logicsa.net';                 // SMTP username
    $mail->Password = 'Soporte1';                           // SMTP password
    $mail->SMTPSecure = 'SSL';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($email);
    $mail->addAddress('info@logicsa.net', 'client');     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $Asunto;
    $mail->Body    = $mensaje;


    $mail->send();
    echo 'El mensaje se envio de manera exitosa';
} catch (Exception $e) {
    echo 'No se pudo enviar el correo: ', $mail->ErrorInfo;
}}

else
{
	echo "mensaje no enviado";
}

?>
