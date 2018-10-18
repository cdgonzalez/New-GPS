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
	$resultado = pg_update($conn, 'concejal', array("activo" => $_POST["activo"]), array("matricula" => $_POST["matricula"]), PGSQL_DML_EXEC);
  	if ($resultado) {
      	$response["resultado"] = "Baja realizada con exito";
  	} else {
      	$response["resultado"] = "Error al dar de baja";
  	}

	pg_close($conn);
	echo json_encode($response);
?>
