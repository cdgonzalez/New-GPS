<?php
session_start();
	$user = "postgres";
	$password = "empoleon95";
	$dbname = "votacionesBD";
	$port = "5432";
	$host = "localhost";
    $matricula = $_POST['matricula'];
	//Cadena para conexion
	$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";

	$conn = pg_connect($cadenaConexion);

	//Verifica conexion
	if(!$conn)
		$response["conexion"] = "Fallo conexion";
	else
		$response["conexion"] = "Conexion Exitosa";

	//Ejecuta qry
	$resultado = pg_update($conn, 'alumno', array("matricula" => $_POST["matriculaNva"], "nombre" => $_POST["nombre"], "carrera" => $_POST["carrera"], "Admin" => $_POST["administrador"]), array("matricula" => $_POST["matriculaAnt"]), PGSQL_DML_EXEC);
  	if ($resultado) {
      	$response["resultado"] = "Actualizacion realizada con exito";
  	} else {
      	$response["resultado"] = "Error al actualizar";
  	}

	pg_close($conn);
	echo json_encode($response);
?>
