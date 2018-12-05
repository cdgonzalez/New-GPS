

$(document).ready(function(){

    var titulo = $("#estadistica");

    var parent = $("<h4>Estadistica de la votacion de "+" del día "+"</h4>")
    titulo.append(parent);

    var conten = $("#esta");
    var contenido = $("<h5>Hora del calculo>"+"</h5><br>"
    +"<h5>Ganador aparente: "+"</h5><br>"+
    "<h5>Número total de votos: "+"</h5><br>"
    +"<h5>Número total de votos efectivos: "+"</h5><br>"
    +"<h5>Total de votantes: "+"</h5><br>");
    conten.append(contenido);
});