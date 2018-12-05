<?php
	//Valores para la conexion
	$user = "postgres";
	$password = "empoleon95";
	$dbname = "votacionesBD";
	$port = "5432";
	$host = "localhost";

	//Cadena para conexion
	$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";

	$conn = pg_connect($cadenaConexion);

	//Verifica conexion
	if(!$conn)
		$response["conexion"] = "Fallo conexion";
	else
		$response["conexion"] = "Conexion Exitosa";

	//Cambia estado de alumnos en campo voto a false
	$resultado = pg_update($conn, 'alumno', array("voto" => true), array("matricula" => $_POST["controlAlumno"]), PGSQL_DML_EXEC);
  	if ($resultado) {
      	$response["actualizacionAlumno"] = "Actualizacion realizada con exito";
  	} else {
      	$response["actualizacionAlumno"] = "Error al actualizar";
  	}
	
	//Registra nueva votacion
	$resultado2 = pg_insert($conn, 'votar', array("votaciones" => $_POST["fecha"], "matricula" => $_POST["controlCandidato"]), PGSQL_DML_EXEC);
	if ($resultado2) {
      	$response["insercion"] = "Registro de voto realizado con exito";
  	} else {
      	$response["insercion"] = "Error al registrar voto";
  	}

	pg_close($conn);
	echo json_encode($response);
?>