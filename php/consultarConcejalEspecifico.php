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


	$qry = "SELECT a.matricula, a.nombre, c.foto, c.propuestas, c.periodo, c.activo FROM alumno a INNER JOIN consejal c ON a.matricula=c.matricula WHERE (a.carrera = $1) AND c.ganador = $2";

	//Ejecuta qry
	$result = pg_query_params($conn, $qry, array("carrera" => $_POST["carrera"], 't'));

	$resultado = array();
	while ($row = pg_fetch_row($result)) {
		array_push($resultado, $row);
	}

	$response["resultado"] = $resultado;

	pg_close($conn);
	echo json_encode($response);
?>
