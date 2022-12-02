<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require 'vendor/autoload.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output 0 2
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'fefasa.hn';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'soporte.it@fefasa.hn';                     //SMTP username
    $mail->Password   = '9p?u5$j-Es3b';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('soporte.it@fefasa.hn', 'Nombre Empresa');
    $mail->addAddress('cdmp2022@gmail.com');     //Add a recipient
    $mail->addAddress('soporte.it@fefasa.hn');  
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
   
    $d=mt_rand(1,9999);
    echo $d ;
    //$mail->send();
    echo 'Correo Enviado';
} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
}