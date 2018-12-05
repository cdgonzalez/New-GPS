<?php
	session_start();
	$user = "postgres";
	$password = "empoleon95";
	$dbname = "votacionesBD";
	$port = "5432";
	$host = "localhost";
    $id = $_POST['id_votacion'];

	//Cadena para conexion
	$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";

	$conn = pg_connect($cadenaConexion);

	//Verifica conexion
	if(!$conn)
		$response["conexion"] = "Fallo conexion";
	else
		$response["conexion"] = "Conexion Exitosa";

	//Ejecuta qry
	$resultado = pg_delete($conn, 'votaciones', array("id" => $_POST['id_votacion']));
  	if ($resultado) {
      	$response["resultado"] = "Actualizacion realizada con exito";
  	} else {
      	$response["resultado"] = "Error al actualizar";
  	}

	pg_close($conn);
	echo json_encode($response);
?>
