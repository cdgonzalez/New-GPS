<?php
session_start();
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

	//Ejecuta qry
	$result = pg_query($conn, 'SELECT * FROM votaciones');

	$resultado = array();
	while ($row = pg_fetch_row($result)) {
		array_push($resultado, $row);
	}

	$response["resultado"] = $resultado;


	pg_close($conn);
	echo json_encode($response);
?>
