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
    <div class="">
                <form action="#" method="POST" enctype='multipart/form-data' class="border p-3 form" name="enviar">
                    <fieldset>
                        <legend>Cargue su imagen</legend>
                        <div class="contenedor-campos">
                            <div class="row form-group">
                            
                            </div>
                        </div> 
                        <div class="contenedor-campos">
                            <div class="row form-group">
                            
                            </div>
                        </div> 

                        <div class="contenedor-campos">
                            <div class="row form-group">
                                <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ingrese el codigo">
                            </div>
                        </div> 

                        <div class="contenedor-campos"> 
                                <div class="row form-group">
                                    <input type="file" class="custom-file-input" name="btn_fFoto" value="Cargar Foto">
                                </div>         
                    
                        </div> <!--Este es el contenedor de los campos-->
                        
                        <div class="contenedor-campos">
                            <div class="row form-group">
                            
                            </div>
                        </div> 

                        <div class="contenedor-campos">
                            <div class="row form-group">
                                <input type="submit" class="btn btn-primary mb-2" value="Guardar" name="enviar" id="" class="boton w-sm-100">
                            </div>
                        </div> 
                    </fieldset>
                </form>
    </div>
</center>
</body>
</html>
<?php
include '../model/connection.php';
session_start();


if(isset($_POST['enviar'])){
                
              $cod=$_POST['codigo'];
              $codGet=$_SESSION["newsession"];

              if($cod ==$codGet){
              
                $imagen= $_FILES['btn_fFoto']['name'];
                $tipoImg = $_FILES['btn_fFoto']['type'];
                $tempImg = $_FILES['btn_fFoto']['tmp_name'];                
                if(!((strpos($tipoImg,'png') || strpos($tipoImg,'jpeg') || strpos($tipoImg, 'webp')))){
                        echo "<script> alert('Solo se permiten los archivos de formato jpeg, png, webp') </script>";
                        
                }else{
                        
                    $database = new Connection();
                    $db = $database->open();
                    try{
                        $codigoActivo = $_GET['serie'];
                        move_uploaded_file($tempImg,"../multimedia/monitor/pc-$codigoActivo.jpg");
                        $nameImg="pc-$codigoActivo.jpg";
                        $sql = "UPDATE t_especificaciones_monitor SET img = '$nameImg' WHERE serie = '$codigoActivo'";
                        // declaración if-else en la ejecución de nuestra consulta
                        $_SESSION['message'] = ( $db->exec($sql) ) ? 'Los datos se actualizaron' : 'Ocurrio un error. No se pudo actualizar';
                        
                    }
                    catch(PDOException $e){
                        echo "Error $e";
                        
                    }
            
                    //cerrar conexión 
                    $database->close();

                    echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
                    //------------------------------------
                }
            } else {
                echo "ooops";
            }
            header('location: ./monitor.php');
            
}

?>