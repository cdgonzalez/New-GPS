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


	$qry = "SELECT a.matricula, a.nombre, c.foto, c.propuestas, c.periodo, c.activo FROM alumno a INNER JOIN consejal c ON a.matricula=c.matricula WHERE (a.matricula = $1 OR a.nombre = $2) AND COALESCE(c.ganador, FALSE) = $3";


	//Ejecuta qry
	$result = pg_query_params($conn, $qry, array("matricula" => $_POST["busqueda"], "nombre" => $_POST["busqueda"], 'FALSE'));

	$resultado = array();
	while ($row = pg_fetch_row($result)) {
		array_push($resultado, $row);
	}

	$response["resultado"] = $resultado;


	pg_close($conn);
	echo json_encode($response);
?>
