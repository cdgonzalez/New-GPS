var preguntasSecre;
var preguntasPrim;
var preguntaSeleccionada = "";
$(document).ready(function(){
    var preguntas = $("#preguntas");
    var preguntasPrime = $("#preguntaPrimera");
    $.ajax({
        type: "GET",
        async: true,
        url:"php/verPreguntas.php",
        dataType: "json",
        success: function(response){
            preguntasSecre = response.resultado;
            if(preguntasSecre.length !=0){
                
                for (let index = 0; index < preguntasSecre.length; index++) {
                    var pregunta = preguntasSecre[index];
                    
                    preguntas.append('<option id="pregunta' + pregunta[0]+'">' + pregunta[1] + '</option>');
                   // alert(pregunta[0]);
                    $("#preguntas").material_select();
                    
                }
                
            }
        }

    });
    $.ajax({
        type: "GET",
        async: true,
        url:"php/verPreguntas.php",
        dataType: "json",
        success: function(response){
            preguntasPrim = response.resultado;
            if(preguntasPrim.length !=0){
                
                for (let index = 0; index < preguntasPrim.length; index++) {
                    var pregunta = preguntasPrim[index];
                    
                    preguntasPrime.append('<option id="preguntaPrimera' + pregunta[0]+'">' + pregunta[1] + '</option>');
                   // alert(pregunta[0]);
                    $("#preguntaPrimera").material_select();
                    
                }
                
            }
        }

    });
    //Obtenemos la pregunta y la guardamos para no perderla
    $("#preguntas").change(function(){
        //alert($("#custId").val());
        preguntaSeleccionada = $("#preguntas option:selected").text();
        //alert($("#preguntas option:selected").text());
    });
    
    $("#cambioPregunta").click(function(){
        //alert("Hola mundo");
        var preg = preguntaSeleccionada;
        var mati = $("#custId").val();
        var resp = $("#respuesta").val();
        //alert(preg);
        var datos = {pregunta: preg, respuesta: resp, matricula: mati};
        
        if(resp != ""){
            $.ajax({
                type: "POST",
                async: true,
                url:"php/cambioPregunta.php",
                data: datos,
                dataType: "json", 
                success: function(response){
                    Materialize.toast('Pregunta Cambiada', 4000);
                    $("#modal2").closeModal();        
                }   
            });
        }
        else{
            Materialize.toast('Ingresa tu respuesta secreta', 4000);
        }
        
    });  
});