<?php
	session_start();
	$user = "postgres";
	$password = "empoleon95";
	$dbname = "votacionesBD";
	$port = "5432";
	$host = "localhost";
    $carrera = $_POST['carrera'];
	//Cadena para conexion
	$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";

	$conn = pg_connect($cadenaConexion);

	//Verifica conexion
	if(!$conn)
		$response["conexion"] = "Fallo conexion";
	else
		$response["conexion"] = "Conexion Exitosa";


	$qry = "SELECT * FROM votaciones  WHERE carrera = $1 AND fecha_fin > NOW()";

	//Ejecuta qry
	$result = pg_query_params($conn, $qry, array("carrera" => $_POST["carrera"]));

	$resultado = array();
	while ($row = pg_fetch_row($result)) {
		array_push($resultado, $row);
	}

	$response["resultado"] = $resultado;

	
	echo json_encode($response);
?>
