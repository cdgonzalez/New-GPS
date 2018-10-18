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


	//Checa que no exista el registro
	if(pg_select($conn, 'alumno', array("matricula" => $_POST["matricula"]), PGSQL_DML_ESCAPE)) {
		$response["insercion"] = "Usuario duplicado";
	}
	else {
		pg_insert($conn, 'alumno', array("matricula" => $_POST["matricula"], "nombre" => $_POST["nombre"], "carrera" => $_POST["carrera"], "Admin" => $_POST["administrador"]), PGSQL_DML_EXEC);
		$response["insercion"] = "Usuario Registrado correctamente";
	}

	pg_close($conn);
	echo json_encode($response);
?>
