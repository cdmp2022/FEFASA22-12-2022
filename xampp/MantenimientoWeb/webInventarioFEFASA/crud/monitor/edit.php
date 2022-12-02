<?php
	session_start();
	include_once('../../model/connection.php');

	if(isset($_POST['edit'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$serie = $_GET['id'];
			$modeloMonitor = $_POST['modeloMonitor'];
			$tipoMonitor = $_POST['tipoMonitor'];
			$cablesMonitor = $_POST['cablesMonitor'];
			$otrosEquiposPerifericos = $_POST['otrosEquiposPerifericos'];

			$sql = "UPDATE t_especificaciones_monitor SET modeloMonitor = '$modeloMonitor', tipoMonitor = '$tipoMonitor', cablesMonitor = '$cablesMonitor', otrosEquiposPerifericos = '$otrosEquiposPerifericos' WHERE serie = '$serie'";
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

	header('location: ../../pages/monitor.php');

?>