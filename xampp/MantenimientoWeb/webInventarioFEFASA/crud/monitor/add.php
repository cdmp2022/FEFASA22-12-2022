<?php
	session_start();
	include_once('../../model/connection.php');

	if(isset($_POST['add'])){
		$database = new Connection();
		$db = $database->open();
		try{
			// hacer uso de una declaración preparada para evitar la inyección de sql
			$stmt = $db->prepare("INSERT INTO t_especificaciones_monitor (serie,tipoMonitor,modeloMonitor,cablesMonitor,otrosEquiposPerifericos) VALUES (:serie,:tipoMonitor,:modeloMonitor,:cablesMonitor,:otrosEquiposPerifericos)");
			// declaración if-else en la ejecución de nuestra declaración preparada
			$_SESSION['message'] = ( $stmt->execute(array(':serie' => $_POST['serie'] , ':tipoMonitor' => $_POST['tipoMonitor'] , ':modeloMonitor' => $_POST['modeloMonitor'], ':cablesMonitor' => $_POST['cablesMonitor'], ':otrosEquiposPerifericos' => $_POST['otrosEquiposPerifericos'])) ) ? 'Miembro agregado correctamente' : 'Something went wrong. Cannot add member';	
	    
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//cerrar conexión
		$database->close();
	}

	else{
		$_SESSION['message'] = 'Fill up add form first';
	}

	header('location: ../../pages/monitor.php');
	
?>
