<?php
	session_start();
	include_once('../../model/connection.php');

	if(isset($_POST['add'])){
		$database = new Connection();
		$db = $database->open();
		try{
			// hacer uso de una declaración preparada para evitar la inyección de sql
			$stmt = $db->prepare("INSERT INTO t_especificaciones_equipo (codigoActivo,serviceTag,tipo,marca,modelo,procesador,mRam,almacenamiento,cables,estado) VALUES (:codigoActivo, :serviceTag, :tipo,:marca,:modelo,:procesador,:mRam,:almacenamiento,:cables,:estado)");
			// declaración if-else en la ejecución de nuestra declaración preparada
			$_SESSION['message'] = ( $stmt->execute(array(':codigoActivo' => $_POST['codigoActivo'] , ':serviceTag' => $_POST['serviceTag'] , ':tipo' => $_POST['tipo'], ':marca' => $_POST['marca'], ':modelo' => $_POST['modelo'], ':procesador' => $_POST['procesador'], ':mRam' => $_POST['mRam'], ':almacenamiento' => $_POST['almacenamiento'], ':cables' => $_POST['cables'], ':estado' => $_POST['estado'])) ) ? 'Miembro agregado correctamente' : 'Something went wrong. Cannot add member';	
	    
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

	header('location: ../../pages/equipos.php');
	
?>
