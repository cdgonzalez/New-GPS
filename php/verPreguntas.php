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

	//Ejecuta qry
	/*$resultado = pg_query($conn, "UPDATE alumno SET pin = '$pin' where matricula = '$matricula'");*/

    $resultado = pg_query($conn, 'SELECT * FROM public."PS"');

    if (!$resultado) {
      	$response["resultado"] = "Error al devolver preguntas";
    }


    $result = array();
    while ($row = pg_fetch_row($resultado)) {
        /* $response['id'.$i] = $row[0];
        $response['pregunta'.$i] = $row[1];
        $i++; */
        array_push($result,$row);
    }
    
    $response["resultado"] = $result;

    echo json_encode($response);

     
?>
