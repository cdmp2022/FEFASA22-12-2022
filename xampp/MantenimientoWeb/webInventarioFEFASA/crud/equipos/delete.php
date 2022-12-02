<?php
	session_start();
	include_once('../../model/connection.php');

	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM t_especificaciones_equipo WHERE codigoActivo = '".$_GET['id']."'";
			// declaración if-else en la ejecución de nuestra consulta
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Equipo eliminado correctamente' : 'Ocurrió un error. No se pudo eliminar al miembro';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//cerrar conexión
		$database->close();

	}
	else{
		$_SESSION['message'] = 'Seleccione miembro para eliminar';
	}

	header('location: ../../pages/equipos.php');

?>