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

	
	//Checa que no exista el registro
	if(pg_select($conn, 'consejal', array("matricula" => $_POST["matricula"]), PGSQL_DML_ESCAPE)) {
		$response["insercion"] = "Consejal duplicado";
	}
	else {
		pg_insert($conn, 'consejal', array("matricula" => $_POST["matricula"], "foto" => $_POST["imagen"], "propuestas" => $_POST["propuestas"], "periodo" => $_POST["periodo"], "activo" => "t"), PGSQL_DML_EXEC);
		$response["insercion"] = "Candidato registrado correctamente";
	}

	pg_close($conn);
	echo json_encode($response);
?>