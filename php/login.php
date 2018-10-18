<?php
	//Valores para la conexion
session_start();
	$user = "postgres";
	$password = "empoleon95";
	$dbname = "votacionesBD";
	$port = "5432";
	$host = "localhost";
    $matricula = $_POST['matricula'];
    $pin = $_POST['pin'];



	//Cadena para conexion
	$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";

	$conn = pg_connect($cadenaConexion);
	//Verifica conexion
	if(!$conn)
		$response["conexion"] = "Fallo conexion";
	else
		$response["conexion"] = "Conexion Exitosa";

	//Ejecuta qry
	$resultado = pg_query($conn, "Select * FROM alumno where matricula = '$matricula'");

    if (!$resultado) {
      	$response["resultado"] = "Error al actualizar";
    }

    while ($row = pg_fetch_row($resultado)) {
        $response['matricula'] = $row[0];
        $response['nombre'] = $row[1];
        $response['carrera'] = $row[2];
        $response['pin'] = $row[3];
        $response['ps'] = $row[4];
        $response['pr'] = $row[5];
        $response['voto'] = $row[6];
        $response['admin'] = $row[7];

    }
    if(strcmp($pin, $response['pin']) === 0){
        if($response['admin'] == null){
            pg_close($conn);
            $response['resultado'] = "NoAdmin";
        }else{
            pg_close($conn);
            $response['resultado'] = "Admin";
        }

    }else{

        $response['resultado'] = "No coinciden";
    }
    $_SESSION['Nombre'] = $response['nombre'];
    $_SESSION['Mat'] =  $response['matricula'];
     echo json_encode($response);
?>
