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
    $pregunta = $_POST['pregunta'];
    $respuesta = $_POST['respuesta'];



	//Cadena para conexion
	$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";

	$conn = pg_connect($cadenaConexion);
	//Verifica conexion
	if(!$conn)
		$response["conexion"] = "Fallo conexion";
	else
		$response["conexion"] = "Conexion Exitosa";

	//Ejecuta qry
//Obtener id de la pregunta
    $query = 'SELECT id FROM public."PS" WHERE "PS"."Pregunta" = $1';
    $res = pg_query_params($conn, $query, array("Pregunta" => $_POST['pregunta']));
    while($ren = pg_fetch_row($res)){
        $id = $ren[0];
    }
    $resultado = pg_update($conn, 'alumno', array( "PIN" => $_POST["pin"],  "PS" => $id, "PR" => $_POST['respuesta']), array("matricula" => $_POST["matricula"]), PGSQL_DML_EXEC);

    if (!$resultado) {
      	$response["resultado"] = "Error al actualizar";
    }

    $qry = "SELECT * FROM alumno WHERE matricula = $1";

	//Ejecuta qry
	$result = pg_query_params($conn, $qry, array("matricula" => $_POST["matricula"]));
    while ($row = pg_fetch_row($result)) {
        $response['matricula'] = $row[0];
        $response['nombre'] = $row[1];
        $response['carrera'] = $row[2];
        $response['pin'] = $row[3];
        $response['ps'] = $row[4];
        $response['pr'] = $row[5];
        $response['voto'] = $row[6];
        $response['admin'] = $row[7];

    }
    
    
    $_SESSION['Nombre'] = $response['nombre'];
    $_SESSION['Mat'] =  $response['matricula'];
    $_SESSION['Con'] = $response['pin'];
     echo json_encode($response);
?>
