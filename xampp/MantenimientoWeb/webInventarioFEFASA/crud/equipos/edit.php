<?php
	session_start();
	include_once('../../model/connection.php');

	if(isset($_POST['edit'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$codigoActivo = $_GET['id'];
			$tipo = $_POST['tipo'];
			$marca = $_POST['marca'];
			$modelo = $_POST['modelo'];
			$procesador = $_POST['procesador'];
			$mRam = $_POST['mRam'];
			$almacenamiento = $_POST['almacenamiento'];
			$cables = $_POST['cables'];
			$estado = $_POST['estado'];

			$sql = "UPDATE t_especificaciones_equipo SET tipo = '$tipo', marca = '$marca', modelo = '$modelo', procesador = '$procesador', mRam = '$mRam', almacenamiento = '$almacenamiento', cables = '$cables', modelo = '$modelo', estado = '$estado' WHERE codigoActivo = '$codigoActivo'";
			// declaración if-else en la ejecución de nuestra consulta
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Los datos se actualizaron' : 'Ocurrio un error. No se pudo actualizar';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
			
		}

		//cerrar conexión 
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Primero debe llenar el form';
	}

	if(isset($_POST['photo'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$codigoActivo = $_GET['id'];
			$img = $_POST['tipo'];

			$sql = "UPDATE t_especificaciones_equipo SET img = '$img' WHERE codigoActivo = '$codigoActivo'";
			// declaración if-else en la ejecución de nuestra consulta
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Los datos se actualizaron' : 'Ocurrio un error. No se pudo actualizar';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
			
		}

		//cerrar conexión 
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Primero debe llenar el form';
	}

	header('location: ../../pages/equipos.php');

?>