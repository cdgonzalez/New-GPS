var votaciones;
var panel = 0;
var boton = 0;
$(document).ready(function(){
   var nomCand="";
  
    $.ajax({
        type: "POST",
        async: true,
        url: "php/listaVotaciones.php",
        timeout: 12000,
        
        dataType: "json",
        success: function(response){
            votaciones = response.resultado;
            if(votaciones.length != 0) {
                for(var i = 0; i < votaciones.length; i++) {
                    var votacion = votaciones[i];
                    if(calcularEstatus(votacion[2]) === 'Agendada'){
                        nomCand =  'No aplica';
                        var disEsta = true;
                    }
                    if(calcularEstatus(votacion[2]) === 'Finalizada'){
                        
                        var disCan = true;
                    }
                    var parent_0 = $("#resultado");
                    
                    if(boton%2 > 1){
                        
                        var parent = $("<div style='color: white; border-radius: 15px; background-color: rgb(42,141,255);' class='col l6 m6' id='div-votacion" + panel + "' >" + siglasCarrera(votacion[1]) + "<br><br><br> " + " Fecha inicio: " + (votacion[2].substring(8,10)) + " de " + (regresaMes(votacion[2].substring(5,6))) + " " + (votacion[2].substring(0,4))
                        + " a las "+ (votacion[2].substring(11,16)) + " hrs.<br>" + " Fecha de finalización: "  + (votacion[3].substring(8,10)) + " de " + (regresaMes(votacion[3].substring(5,6))) + " " + (votacion[3].substring(0,4))
                        + " a las "+ (votacion[3].substring(11,16)) + " horas.<br>"  + "Candidatos: <br>"  + "Número de Votos: "+ calcularVotos(calcularEstatus(votacion[2]))+"<br>"  + "Estatus: "+ calcularEstatus(votacion[2])+ "<br>"  + "Ganador: "+votacion[4]+"<br>" + "<button style='margin-top: 2%; border-radius:15px; background-color: white; color: rgb(56,142,60);' id='btn-votacion"+ boton + "' class='btn btns col m12 l12' onclick='verEstadisticas("+votacion[0]+")'>Ver Estadisticas"+ "</button><br>"+   "<button style='margin-top: 2%; border-radius:15px;background-color: rgb(181,181,181); color: white;' id='btn-cancelar"+ boton + "' class='btn btns col m12 l12' onclick='cancelarVotacion("+votacion[0]+")'>Cancelar"+ "</button>" + + "</div>");
                        if(disEsta === true){
                            $('#btn-cancelar'+boton).attr("disabled",true); 
                            $('#btn-votacion'+boton).attr("disabled",false);   
                            alert("Aqui"+'#btn-votacion'+boton);
                        }
                    //Buscar funcion para dishabilitar un boton
                        if(disCan === true){
                        $('#btn-cancelar'+boton).attr("disabled",true);
                        $('#btn-votacion'+boton).attr("disabled",false);
                        
                        }

                        
                    }else{
                        var parent = $("<div style='color: white; border-radius: 15px; background-color: rgb(56,142,60);' class='col l6 m6' id='div-votacion" + panel + "' >" + siglasCarrera(votacion[1]) + "<br><br><br> " + " Fecha inicio: " + (votacion[2].substring(8,10)) + " de " + (regresaMes(votacion[2].substring(5,6))) + " " + (votacion[2].substring(0,4))
                        + " a las "+ (votacion[2].substring(11,16)) + " hrs.<br>" + " Fecha de finalización: "  + (votacion[3].substring(8,10)) + " de " + (regresaMes(votacion[3].substring(5,6))) + " " + (votacion[3].substring(0,4))
                        + " a las "+ (votacion[3].substring(11,16)) + " horas.<br>"  + "Candidatos: <br>"  + "Número de Votos: "+ calcularVotos(calcularEstatus(votacion[2]))+"<br>"  + "Estatus: "+ calcularEstatus(votacion[2])+ "<br>"  + "Ganador: "+votacion[4]+"<br>" + "<button style='margin-top: 2%; border-radius:15px; background-color: rgb(181,181,181); color: white;' id='btn-votacion"+ boton + "' class='btn btns col m12 l12' onclick='verEstadisticas("+votacion[0]+")'>Ver Estadisticas"+ "</button> <br>"+   "<button style='margin-top: 2%; border-radius:15px;background-color: rgb(255,141,141); color: white;' id='btn-cancelar"+ boton + "' class='btn btns col m12 l12' onclick='cancelarVotacion("+votacion[0]+")'>Cancelar"+ "</button>" + + "</div>");
                        if(disEsta === true){
                            $('#btn-cancelar'+boton).attr("disabled",true); 
                            $('#btn-votacion'+boton).attr("disabled",false);   
                            alert("Aqui"+'#btn-votacion'+boton);
                        }
                    //Buscar funcion para dishabilitar un boton
                        if(disCan === true){
                        $('#btn-cancelar'+boton).attr("disabled",true);
                        $('#btn-votacion'+boton).attr("disabled",false);
                        
                        }
                    }
                    parent_0.append(parent);
                    panel++;
                    boton++;
                    
                }

                
            }
            else {
                
                Materialize.toast('Sin resultados', 4000);
            }

        }
    });
    
    $('#btn-cancelar').click(function(){
       $('#modal2').openModal();
        aler("hey");
        $('#si-borrar').click(function(){
            $('#modal2').closeModal();
            
            $.ajax({
                type: "POST",
                async: true,
                url: "php/borrarVotacion.php",
                timeout: 12000,
                data: "id_votacion=" + numVotacion,
                dataType: "json",
                success: function(response){ 
                    if(response.resultado === "Actualizacion realizada con exito"){
                        Materialize.toast('Realizado con exito', 4000);    
                        window.open("verVotaciones.php", '_self');
                    }
            
                }
            });
        });
    });
    
});
//Buscar ganador usando id de la votacion 
function regresaGanador(id_votacion){
    $.ajax({
        type: "POST",
        async: true,
        url: "php/regresaGanador.php",

    });
}

function verEstadisticas(estadistica){
    alert("En construccion");
}

function regresaMes(numMes){
    switch(numMes){
        case '1': return 'Enero';
                break;
        case '2': return 'Febrero';
                break;
        case '3': return 'Marzo';
                break;
        case '4': return 'Abril';
                break;
        case '5': return 'Mayo';
                break;
        case '6': return 'Junio';
                break;
        case '7': return 'Julio';
                break;
        case '8': return 'Agosto';
                break;
        case '9': return 'Septiembre';
                break;
        case '10': return 'Octubre';
                break;
        case '11': return 'Noviembre';
                break;
        case '12': return 'Diciembre';
                break;
    }
}

function cancelarVotacion(numVotacion){
    $('#modal2').openModal();
    $('#si-borrar').click(function(){
        //Cierra modal
        $('#modal2').closeModal();

        $.ajax({
            type: "POST",
            async: true,
            url: "php/borrarVotacion.php",
            timeout: 12000,
            data: "id_votacion=" + numVotacion,
            dataType: "json",
            success: function(response){
                if(response.resultado === "Actualizacion realizada con exito"){
                    Materialize.toast('Realizado con exito', 4000);    
                    window.open("verVotaciones.php", '_self');
                }
            }
        });
    });
}

function calcularVotos(comenzo){
    
    if(comenzo == "En curso"){
        return "La votacion esta en curso";
       }
    if(comenzo == "Finalizada"){
        
        return "455";
       }
    if(comenzo == "Agendada"){
        return "La votacion no ha comenzado";
       }
}

function calcularEstatus(fecha){
    var day = moment().format("YYYY-M-D h:mm:ss");
    if(fecha == day){
            return "En curso";
       }
    else if(fecha < day){
            return "Finalizada";
            }
    else if(fecha > day){
            return "Agendada";
            }
    else{
        return "Error";
    }
}

function siglasCarrera(carrera) {
	switch(carrera) {
		case 'ISC': return "Sistemas Computacionales";
				break;
		case 'IIF': return "Informatica";
				break;
		case 'ITICS': return "Tecnología de Información y Com.";
				break;
		case 'II': return "Industrial";
				break;
		case 'IGE': return "Gestión Empresarial";
				break;
		case 'LA': return "Administración";
				break;
		case 'IE': return "Electronica";
				break;
		case 'CP': return "Contador Publico";
				break;
		case 'IBQ': return "Bioquimica";
				break;
		case 'IEL': return "Electrica";
				break;
		case 'IMC': return "Mecatronica";
				break;
		case 'IM': return "Mecanica";
				break;
		case 'IMAT': return "Materiales";
				break;
	}
}