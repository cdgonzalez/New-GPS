var urlCancelar = "administrador.php";
var fechaActual = new Date();
var fechaInicioSeleccionada = fechaActual;
var fechaI;
var fechaF;

$(document).ready(function () {
	//Carga el combobox
	$('#carrera').material_select();

	//Funcion para habrir calendario
	$('#fechaFin').datepicker({
		i18n: {
			months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
			weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
			weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
			weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
			cancel: 'Cancelar',
			clear: 'Limpiar',
			done: 'Listo'
		},
		selectMonths: true,
		selectYears: 100, // Puedes cambiarlo para mostrar más o menos años
		labelMonthNext: 'Siguiente mes',
		labelMonthPrev: 'Mes anterior',
		labelMonthSelect: 'Selecciona un mes',
		labelYearSelect: 'Selecciona un año',
		minDate: fechaInicioSeleccionada,
		onOpen: function () {
			var instance = M.Datepicker.getInstance($("#fechaFin"));
			instance.options.minDate = fechaInicioSeleccionada;
		}
	});

	$('#fechaInicio').datepicker({
		i18n: {
			months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
			weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
			weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
			weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
			cancel: 'Cancelar',
			clear: 'Limpiar',
			done: 'Listo'
		},
		selectMonths: true,
		selectYears: 100, // Puedes cambiarlo para mostrar más o menos años
		labelMonthNext: 'Siguiente mes',
		labelMonthPrev: 'Mes anterior',
		labelMonthSelect: 'Selecciona un mes',
		labelYearSelect: 'Selecciona un año',
		minDate: fechaActual,
		defaultDate: fechaActual,
		onClose: function () {
			fechaInicioSeleccionada = M.Datepicker.getInstance($("#fechaInicio")).date;
		}
	});

	//Funcion para habrir relog
	$('.timepicker').timepicker({
		default: 'now',
		twelvehour: false, // change to 12 hour AM/PM clock from 24 hour
		donetext: 'OK',
		cleartext: 'Limpiar',
		autoclose: false,
		vibrate: true // vibrate the device when dragging clock hand
	});

	//Funcion del boton comenzar votacion
	$('#btn-comenzar').click(function () {
		var carreraV = validaCarrera($('#carrera option:selected').val());
		var fechaHoraV = validarFechaHora();

		if(carreraV && fechaHoraV) {
			var carrera = siglasCarrera($('#carrera').val());
			$.ajax({
	            type: "POST",
	            async: true,
	            url: "php/nuevaVotacion.php",
	            timeout: 12000,
	            data: "carrera=" + carrera + "&fechaI=" + fechaI + "&fechaF=" + fechaF,
	            dataType: "json",
	            success: function(response){
	            	if(response.actualizacionAlumno === "Actualizacion realizada con exito" && response.insercion === "Registro de votacion realizada con exito") {
	            		$('#mensajeInicio').text("La votacion iniciara el " + obtenerFechaInicio() + " a las " + $("#horaInicio").val() + " horas");

						//Abre modal
						$('#modal').openModal();	            		

						$('#fechaInicio').val(null);
						$('#horaInicio').val(null);
						$('#fechaFin').val(null);
	            		$('#horaFin').val(null);
	            		$('#carrera').val('0');
                		$('#carrera').material_select();
	            	}
	            }
	        });
		}
	});

	//Funcion para validar existencia de votacion en carrera
	$('#carrera').on("change", function () {
		var carrera = siglasCarrera($('#carrera').val());
		$.ajax({
            type: "POST",
            async: true,
            url: "php/verificaCandidatos.php",
            timeout: 12000,
            data: "carrera=" + carrera,
            dataType: "json",
            success: function(response){
                if(response.resultado === "Sin resultados") {
                	Materialize.toast("No hay candidatos registrados para esta carrera", 4000);
                	$('#carrera').val('0');
                	$('#carrera').material_select();
                }
            }
        });
	});

	//Funcion del bton cancelar
	$('#btn-cancelar').click(function () {
		window.open(urlCancelar, '_self');
	});

	var datepickerfin = M.Datepicker.getInstance($("#fechaInicio"));
	// datepickerfin.open();
});

function siglasCarrera(carrera) {
	switch (carrera) {
		case '1':
			return "ISC";
			break;
		case '2':
			return "IIF";
			break;
		case '3':
			return "ITICS";
			break;
		case '4':
			return "II";
			break;
		case '5':
			return "IGE";
			break;
		case '6':
			return "LA";
			break;
		case '7':
			return "IE";
			break;
		case '8':
			return "CP";
			break;
		case '9':
			return "IBQ";
			break;
		case '10':
			return "IEL";
			break;
		case '11':
			return "IMC";
			break;
		case '12':
			return "IM";
			break;
		case '13':
			return "IMAT";
			break;
	}
}

function validaCarrera(carrera) {
	if (carrera == '0') {
		Materialize.toast("Selecciona una carrera de la lista disponible", 4000);
		return false;
	}

	return true;
}

function validarFechaHora() {
	var inicio = new Date($('#fechaInicio').val() + " " + $('#horaInicio').val());
	var fin = new Date($('#fechaFin').val() + " " + $('#horaFin').val());

	var anoInicio = inicio.getFullYear();
	var mesInicio = inicio.getMonth() + 1;
	var diaInicio = inicio.getDate();
	var horaInicio = inicio.getHours();
	var minInicio = inicio.getMinutes();

	var anoFin = fin.getFullYear();
	var mesFin = fin.getMonth() + 1;
	var diaFin = fin.getDate();
	var horaFin = fin.getHours();
	var minFin = fin.getMinutes();

	if(anoFin >= anoInicio) {
		if(mesFin >= mesInicio) {
			if(diaFin >= diaInicio) {
				if(diaFin == diaInicio) {
					console.log("iguales");
					if(horaFin >= (horaInicio + 4)) {
						fechaI = anoInicio + "-" + mesInicio + "-" + diaInicio + " " + horaInicio + ":" + minInicio;
						fechaF = anoFin + "-" + mesFin + "-" + diaFin + " " + horaFin + ":" + minFin;
						return true;
					}
					else {
						Materialize.toast("La hora elegida no es válida.", 4000);
						Materialize.toast("La duracion no puede ser menor a 4 horas.", 4000);
					}
				}
				else {
					console.log("diferentes");
					fechaI = anoInicio + "-" + mesInicio + "-" + diaInicio + " " + horaInicio + ":" + minInicio;
					fechaF = anoFin + "-" + mesFin + "-" + diaFin + " " + horaFin + ":" + minFin;
					return true;
				}
			}
			else {
				Materialize.toast("La fecha fin no puede ser anterior a la fecha inicio.", 4000);
			}
		}
		else {
			Materialize.toast("La fecha fin no puede ser anterior a la fecha inicio.", 4000);
		}
	}
	else {
		Materialize.toast("La fecha fin no puede ser anterior a la fecha inicio.", 4000);
	}

	return false;
}

function obtenerFechaInicio() {
	var fInicio = new Date($("#fechaInicio").val());
	var diaMes = fInicio.getDate();

	switch(fInicio.getMonth() + 1) {
		case 1: disMes += " de Enero";
			break;
		case 2: diaMes += " de Febrero";
			break;
		case 3: diaMes += " de Marzo";
			break;
		case 4: diaMes += " de Abril";
			break;
		case 5: diaMes += " de Mayo";
			break;
		case 6: diaMes += " de Junio";
			break;
		case 7: diaMes += " de Julio";
			break;
		case 8: diaMes += " de Agosto";
			break;
		case 9: diaMes += " de Septiembre";
			break;
		case 10: diaMes += " de Octubre";
			break;
		case 11: diaMes += " de Noviembre";
			break;
		case 12: diaMes += " de Diciembre";
			break;
	}

	return diaMes;
}