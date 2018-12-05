var urlCancelar = "";
var noControl = "";
var carrera = "";
var candidatos;
var candidatoE = 1;
var seleccionado = 0;

$(document).ready(function() {
	//Funcion para deshabilitar autocompletado en campo de texto no de control
	$("#confirmaControl").blur(function() {
		$("#confirmaControl").attr('autocomplete', 'off');
	});

	//Consulta los candidatos de la carrera a la que pertenece el alumno
	$.ajax({
        type: "POST",
        async: true,
        url: "php/consultaCandidatos.php",
        timeout: 12000,
        data: "carrera=" + carrera,
        dataType: "json",
        success: function(response){
            candidatos = response.resultado;
            if(candidatos.length != 0) {
                //Carga los candidatos a poder votar
                cargaCandidatos();  
            }
        }
    });

    $('#btn-confirmar').click(function() {
        if(validaCampoControl()) {
            if($("#confirmaControl").val() == noControl) {
                if(seleccionado != 0) {
                    var fecha = new Date();
                    var fechaVota = fecha.getFullYear() + "-" + (fecha.getMonth()+1) + "-" + fecha.getDate() + " " + fecha.getHours() + ":" + fecha.getMinutes();
                    var candidatoSel = candidatos[seleccionado-1];

                    $.ajax({
                        type: "POST",
                        async: true,
                        url: "php/realizarVotacion.php",
                        timeout: 12000,
                        data: "controlCandidato=" + candidatoSel[0] + "&controlAlumno=" + noControl + "&fecha=" + fechaVota,
                        dataType: "json",
                        success: function(response){
                            if(response.insercion != "Registro de voto realizado con exito") {
                                window.open(urlCancelar, '_self');
                            }
                        }
                    });                  
                }
            }
            else {
                Materialize.toast("La matricula que ingresaste no coincide con la tuya.", 4000);
            }
        }
    });

    $('#btn-cancelar').click(function() {
        window.open(urlCancelar, '_self');
    });
});

function validaCampoControl() {
    var control = $("#confirmaControl").val();
    if(control.length != 0) {
        return true;
    }

    Materialize.toast("Por favor, ingresa tu número de control para confirmar.", 4000);
    return false;
}

function seleccionar(candidato) {
    for (var i = 0; i <= candidatoE; i++) {
        if(candidato == i) {
            $("#candidato" + i).css("border", "5px solid blue");
            seleccionado = i;
        }
        else {
            $("#candidato" + i).css("border", "5px solid #0000ff00");
        }
    }
}

function cargaCandidatos() {
    var div_parent_0 = $("#candidatos");
    var w = $("#candidato0").width() + 8;
    var h = $("#candidato0").height() + 8;

    for (var i = 0; i < candidatos.length; i++) {
        var candidato = candidatos[i];

        var div_parent = $('<div class="col s12 m4" style="margin: 20px auto;">');
        var div_img = $('<div class="card-image">');
        var img = $('<img id="candidato' + candidatoE + '" class="imagen" src="images/' + candidato[2] + '" style="width: ' + w + 'px; height: ' + h + 'px;" onclick="seleccionar(' + candidatoE + ')">')
        var pie_img = $('<span class="card-title">' + candidato[1] + '</span>');

        div_img.append(img);
        div_parent.append(div_img);
        div_parent.append(pie_img);
        div_parent_0.append(div_parent);
        candidatoE++;
    }
}