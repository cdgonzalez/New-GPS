var consejales;
var consejal = 0;
var boton = 0;
$(document).ready(function(){
   alert('entro');
  
    $.ajax({
        type: "POST",
        async: true,
        url: "php/proximasVotaciones.php",
        timeout: 12000,
        data: "carrera=" + ,
        dataType: "json",
        success: function(response){
            consejales = response.resultado;
            if(consejales.length != 0) {
                for(var i = 0; i < consejales.length; i++) {
                    var votacion = consejales[i];
                    
                    var parent_0 = $("#proxVot");
                    var parent = $("<div class='col l6 m6'" + consejal + "' >"  + "<br>" + " Nombre: " + votacion[1] + "<br>" +   "</div>");
                    parent_0.append(parent);
                    consejal++;
                    boton++;
                }
                
            }
            else {
                
                Materialize.toast('Sin resultados', 4000);
            }

        }
    });
    
});

function verEstadisticas(estadistica){
    alert("En construccion");
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