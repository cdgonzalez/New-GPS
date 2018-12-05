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
	$resultado = pg_update($conn, 'alumno', array("voto" => false), array("carrera" => $_POST["carrera"]), PGSQL_DML_EXEC);
  	if ($resultado) {
      	$response["actualizacionAlumno"] = "Actualizacion realizada con exito";
  	} else {
      	$response["actualizacionAlumno"] = "Error al actualizar";
  	}
	
	//Registra nueva votacion
	$resultado2 = pg_insert($conn, 'votaciones', array("carrera" => $_POST["carrera"], "fecha_inicio" => $_POST["fechaI"], "fecha_fin" => $_POST["fechaF"], "ganador" => " "), PGSQL_DML_EXEC);
	if ($resultado2) {
      	$response["insercion"] = "Registro de votacion realizada con exito";
  	} else {
      	$response["insercion"] = "Error al registrar votacion";
  	}

	pg_close($conn);
	echo json_encode($response);
?>