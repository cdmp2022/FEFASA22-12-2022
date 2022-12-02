<?php
	session_start();
	include_once('../../model/connection.php');

	if(isset($_POST['add'])){
		$database = new Connection();
		$db = $database->open();
		try{
			// hacer uso de una declaración preparada para evitar la inyección de sql
			$stmt = $db->prepare("INSERT INTO tusuario (nombre, apellido, area,codEmpleado,centro,subArea,identidad) VALUES (:nombre, :apellido, :area, :codEmpleado, :centro, :subArea, :identidad)");
			// declaración if-else en la ejecución de nuestra declaración preparada
			$_SESSION['message'] = ( $stmt->execute(array(':nombre' => $_POST['nombre'] , ':apellido' => $_POST['apellido'] , ':area' => $_POST['area'], ':codEmpleado' => $_POST['codEmpleado'], ':centro' => $_POST['centro'], ':subArea' => $_POST['subArea'], ':identidad' => $_POST['identidad'])) ) ? 'Miembro agregado correctamente' : 'Something went wrong. Cannot add member';	
	    
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

	header('location: ../../pages/index.php');
	
?>
