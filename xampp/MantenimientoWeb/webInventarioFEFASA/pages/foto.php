<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <!-- Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/imgcss.css"><link rel="icon" type="image/png" href="../assets/img/fefasa-logo-1.png">
    <title>FEFASA</title>
</head>
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
</script>
<body>
    <center>
        <div class="sticky-top">
                    <form action="#" method="POST"  class="border p-3 form" name="generar">
                        <fieldset>
                            <legend>Cargue su imagen</legend>
                            
                            
                            <div class="contenedor-campos">
                                <div class="row form-group">
                                    <input type="submit" class="btn btn-primary mb-2" value="Generar Codigo" name="generar" id="" class="boton w-sm-100">
                                </div>
                            </div> 
                        </fieldset>
                    </form>
        </div>   
</center>
</body>
</html>

<?php

session_start();
include '../model/connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$d=mt_rand(1,9999);
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
$_SESSION["newsession"]=$d;
/*session is started if you don't write this line can't use $_Session  global variable*/

if(isset($_POST['generar'])){
    
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
        //Add a recipient
        $mail->addAddress('soporte.it@fefasa.hn'); 
        $mail->addAddress('cdmp2022@gmail.com');  
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Departamento de IT';
        $mail->Body    = 'Codigo de verificación: '.$d;
       
        
       
        $mail->send();
        echo 'Correo Enviado';
        $codSer= $_GET['codigoActivo'];
        
        header("location: ./enviarFoto.php?codigoActivo=$codSer");
    } catch (Exception $e) {
        echo "Error: ";
        header('location: ./equipos.php');
        //{$mail->ErrorInfo}
    }

 }
?>