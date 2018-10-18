<?php
	$url_archivos = "..//images/";
	$nombre_archivo = date("Ymdhis");
	if(isset($_FILES['archivo_ajax'])) {
		$extension_archivo = pathinfo($_FILES['archivo_ajax']['name'], PATHINFO_EXTENSION);
		if(move_uploaded_file($_FILES['archivo_ajax']['tmp_name'], $url_archivos.$nombre_archivo.".".$extension_archivo)) {
			$response["respuesta"] = true;
			$response["nombre"] = $_FILES['archivo_ajax']['name'];
			$response["extension"] = pathinfo($_FILES['archivo_ajax']['name'], PATHINFO_EXTENSION);
			$response["peso"] = $_FILES['archivo_ajax']['size'];
			$response["nombre_archivo"] = $nombre_archivo . "." . pathinfo($_FILES['archivo_ajax']['name'], PATHINFO_EXTENSION);
		}
		else {
			$response["respuesta"] = false;
		}
	}
	else {
		$response["respuesta"] = false;
	}

	echo json_encode($response);
?>
