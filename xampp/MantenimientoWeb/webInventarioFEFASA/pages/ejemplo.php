<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);
try {

    $destinatario= "example@fefasa.hn";
    $mensaje= "El SUPERMERCADO EL ECONOMICO le saluda y le agradece por su fidelidad, recibimos una solicitud para recuperar la contraseña, por lo que a continuacion se le adjunta: gg "; 
    $encabezado="Recuperar Contraseña -- SUPERMERCADO EL ECONOMICO";
    date_default_timezone_set('America/Los_Angeles');
   

    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.fefasa.hn';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'soporte.it@fefasa.hn';                     //SMTP username
    $mail->Password   = '9p?u5$j-Es3b';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above   587  110

    //Recipients
    $mail->setFrom('soporte.it@fefasa.hn', 'SUPERMERCADO EL ECONOMICO');
    $mail->addAddress($destinatario);     //Add a recipient
    
    //Content
    
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $encabezado;
    $mail->Body    = $mensaje;
    $mail->CharSet = 'UTF-8';

    $mail->send();
        echo "ok";
        //echo "<script> alert('Correo enviado exitosamente') </script>";    
    } catch (Exception $e) {
        //echo "<script> alert('Correo no enviado: {$mail->ErrorInfo}') </script>";
        echo $e;
    }

?>