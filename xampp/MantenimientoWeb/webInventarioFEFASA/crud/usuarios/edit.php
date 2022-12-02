<?php
	session_start();
	include_once('../../model/connection.php');

	if(isset($_POST['edit'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$identidad = $_GET['id'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$centro = $_POST['centro'];
			$area = $_POST['area'];
			$subArea = $_POST['subArea'];

			$sql = "UPDATE tusuario SET nombre = '$nombre', apellido = '$apellido', centro = '$centro', area = '$area', subArea = '$subArea' WHERE identidad = '$identidad'";
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

	header('location: ../../pages/index.php');

?>