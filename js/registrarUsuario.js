var urlCancelar = "registrarUsuario.html";

$(document).ready(function(){
	//Carga el combobox
    $('#carrera').material_select();

    //Funcion click del boton registrar
    $('#btn-registrar').click(function(){
    	var nombre = $('#nombre').val();
    	var matricula = $('#matricula').val();
    	var carrera = $('#carrera option:selected').val();
    	var administrador = $('#administrador').is(':checked');


    	//Valida los campos y registra si estan correctos
    	if(validaCampos(nombre, matricula, carrera)) {
    		$.ajax({
		        type: "POST",
		        async: true,
		        url: "php/registrarUsuario.php",
		        timeout: 12000,
		        data: "nombre=" + nombre.toUpperCase() + "&matricula=" + matricula + "&carrera=" + siglasCarrera(carrera) + "&administrador=" + administrador,
		        dataType: "json",
		        success: function(response){
		        	if(response.insercion === "Usuario Registrado correctamente") {
		        		Materialize.toast(response.insercion, 4000);
		        		$('#nombre').val(null);
		        		$('#matricula').val(null);
		        		$('#carrera').val("0");
		        		$('#carrera').material_select();
		        		$('#administrador').prop("checked", false);
		        	}
		        	else {
		        		Materialize.toast(response.insercion, 4000);
		        		$('#nombre').val(null);
		        		$('#matricula').val(null);
		        		$('#carrera').val("0");
		        		$('#carrera').material_select();
		        		$('#administrador').prop("checked", false);
		        	}
		        }
		    });
    	}
    });

    //Funcion click del boton cancelar
    $('#btn-cancelar').click(function(){
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
