var urlCancelar = "registrarUsuario.html";
var boton = 0;
var seleccion = 0;
var alumnos;
var alumnoSeleccionado;
var matriculaBorrar;

$(document).ready(function(){
	//Carga el combobox
	$('select').material_select();

	//Funcion click del boton buscar
    $('#btn-buscar').click(function(){
    	var busqueda = $('#busqueda').val();
    	limpiarModal();

    	if(busqueda.length != 0) {
    		$.ajax({
		        type: "POST",
		        async: true,
		        url: "php/consultarUsuario.php",
		        timeout: 12000,
		        data: "busqueda=" + busqueda.toUpperCase(),
		        dataType: "json",
		        success: function(response){
		        	alumnos = response.resultado;
		        	if(alumnos.length != 0) {
			        	for(var i = 0; i < alumnos.length; i++) {
			        		var alumno = alumnos[i];

			        		var parent_0 = $("#modal-content1");
				        	var parent = $("<button id='btn-select" + boton + "' class='btn blue' style='margin-top: 10px;'' onclick='alumnoSelect(" + i + ")'>" + alumno[0] + " - " + alumno[1] + "</button>");
				        	parent_0.append(parent);
				        	boton++;
			        	}

			        	//Abre modal
			        	$('#modal1').openModal();
			        }
			        else {
			        	//Cierra modal
			        	$('#modal1').closeModal();
			        	Materialize.toast('Sin resultados', 4000);
			        }

		        }
		    });
    	}
    	else {
    		//Cierra modal
    		$('#modal1').closeModal();
    		Materialize.toast('No has ingresado ningún valor de búsqueda', 4000);
    	}
    });

	//Funcion click del boton actualizar
    $('#btn-actualizar').click(function(){
    	var nombre = $('#nombre').val();
    	var matricula = $('#matricula').val();
    	var carrera = $('select option:selected').val();
    	var administrador;

    	if($('#administrador').is(':checked')) {
    		administrador = "t";
    	}
    	else {
    	 	administrador = "f";
    	}

    	//Valida los campos y registra si estan correctos
    	if(validaCampos(nombre, matricula, carrera)) {
    		if(alumnoSeleccionado[0] != matricula || alumnoSeleccionado[1] != nombre || alumnoSeleccionado[2] != siglasCarrera(carrera) || alumnoSeleccionado[7] != administrador) {
    			$.ajax({
			        type: "POST",
			        async: true,
			        url: "php/actualizarUsuario.php",
			        timeout: 12000,
			        data: "matriculaAnt=" + matriculaBorrar + "&matriculaNva=" + matricula + "&nombre=" + nombre.toUpperCase() + "&carrera=" + siglasCarrera(carrera) + "&administrador=" + administrador,
			        dataType: "json",
			        success: function(response){
			        	if(response.resultado === "Actualizacion realizada con exito") {
			        		window.open(urlCancelar, '_self');
			        	}
			        }
			    });
    		}
    		else {
    			window.open(urlCancelar, '_self');
    		}
    	}
    });


    //Funcion click del boton borrar
    $('#btn-borrar').click(function(){
    	$('#modal2').openModal();

    	$('#si-borrar').click(function(){
    		//Cierra modal
    		$('#modal2').closeModal();

    		$.ajax({
		        type: "POST",
		        async: true,
		        url: "php/borrarUsuario.php",
		        timeout: 12000,
		        data: "matricula=" + matriculaBorrar,
		        dataType: "json",
		        success: function(response){
		        	if(response.resultado === "Eliminacion exitosa"){
    					window.open(urlCancelar, '_self');
		        	}
		        }
		    });
    	});
    });

    //Funcion click del boton regresar
    $('#btn-regresar').click(function(){
    	$('#div-buscar').css("display", "block");
    	$('#div-datos').css("display", "none");
    });


    //Funcion click del boton cancelar
    $('#btn-cancelar').click(function(){
    	window.open(urlCancelar, '_self');
    });

    //Funcion click del boton cancelar
    $('#btn-cancelar2').click(function(){
    	window.open(urlCancelar, '_self');
    });
});

//Funcion para validar campos
function validaCampos(nombre, matricula, carrera) {
	var validaNombre = false;
	var validarMatricula = false;
	var validarCarrera = false;

	//Comprueba que no este vacio
	if(nombre.length == 0){
		Materialize.toast('Ingresa el nombre completo del alumno', 4000);
	}
	else {
		//Comprueba que la longitud sea menor a 50 caracteres
		if(nombre.length > 50){
			Materialize.toast('El nombre es demasiado largo. No debe superar 50 caracteres en total', 4000);
		}
		else {
		   	validaNombre = true;
		}
	}

	//Validar campo de matricula
	//Comprueba que no este vacio
	if(matricula.length == 0) {
		Materialize.toast('Ingrese la matrícula del alumno', 4000);
	}
	else {
		//Comprueba que la longitud no sea diferente de 8 o que no sea numeros
		if(matricula.length != 8 || isNaN(matricula)) {
			Materialize.toast('Ingrese una matrícula válida', 4000);
		}
		else {
			validarMatricula = true;
		}
	}

	//Validar campo de carrera
	//Comprueba que se aya seleccionado alguna opcion
	if(carrera == 0) {
		Materialize.toast('Elige la carrera a la que pertenece el alumno', 4000);
	}
	else {
		validarCarrera = true;
	}

	//Indica si algun campo esta vacio
	if(validaNombre && validarMatricula && validarCarrera) {
		return true;
	}

	return false;
}

function carreraSiglas(carrera) {
	switch(carrera) {
		case "ISC": return "1";
				break;
		case "IIF": return "2";
				break;
		case "ITICS": return "3";
				break;
		case "II": return "4";
				break;
		case "IGE": return "5";
				break;
		case "LA": return "6";
				break;
		case "IE": return "7";
				break;
		case "CP": return "8";
				break;
		case "IBQ": return "9";
				break;
		case "IEL": return "10";
				break;
		case "IMC": return "11";
				break;
		case "IM": return "12";
				break;
		case "IMAT": return "13";
				break;
	}
}

function siglasCarrera(carrera) {
	switch(carrera) {
		case '1': return "ISC";
				break;
		case '2': return "IIF";
				break;
		case '3': return "ITICS";
				break;
		case '4': return "II";
				break;
		case '5': return "IGE";
				break;
		case '6': return "LA";
				break;
		case '7': return "IE";
				break;
		case '8': return "CP";
				break;
		case '9': return "IBQ";
				break;
		case '10': return "IEL";
				break;
		case '11': return "IMC";
				break;
		case '12': return "IM";
				break;
		case '13': return "IMAT";
				break;
	}
}

function alumnoSelect(seleccionado) {
	$('#modal1').closeModal();
	$('#div-buscar').css("display", "none");
    $('#div-datos').css("display", "block");
    $('#busqueda').val("");
    limpiarModal();

    alumnoSeleccionado = alumnos[seleccionado];
    matriculaBorrar = alumnoSeleccionado[0];
    $('#titulo2').text("Datos de " + alumnoSeleccionado[0] + ", " + alumnoSeleccionado[1]);
    $('#nombre').val(alumnoSeleccionado[1]);
    $('#matricula').val(alumnoSeleccionado[0]);

    var carrera = carreraSiglas(alumnoSeleccionado[2]);
	$('#carrera').val(carrera);
	$('#carrera').material_select();


    if(alumnoSeleccionado[7] === "t") {
    	$('#administrador').prop("checked", true);
    }
    else {
    	$('#administrador').prop("checked", false);
    }
}

function limpiarModal() {
	for(var i = 0; i < boton; i++) {
 		$("#btn-select" + i).remove();
 	}
}
