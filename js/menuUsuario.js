

$(document).ready(function(){
    var preguntaNv = '';
    var matricula = $("#custId").val();
    if(matricula === '123456'){

    
        $('#modal1').openModal();
        $('#preguntaPrimera').change(function(){
                
            preguntaNv = $('#preguntaPrimera option:selected').text();
            //alert(preguntaNv);
        });
        $('#cambio').click(function(){
            var pinNuevo = $('#pinNuevo').val();
            var pinConfirm = $('#pinConfirm').val();
            var respuesta = $('#respuestaPregunta').val();
            if(pinNuevo == '' && respuesta == '' && preguntaNv == ''){
                Materialize.toast('Hay datos erroneos', 4000);   
            }
            if(pinNuevo.length  > 6 || pinNuevo.lenght < 8){
                $('#cambio').hide();
                $('#ingresa').show();
                $('#error').show();  
                $('#ingresa').click(function(){
                    $('#cambio').show();
                    $('#ingresa').hide();
                    $('#error').hide();
                });
                
                
            }
            if(pinNuevo != pinConfirm){
                Materialize.toast('El PIN de confirmación no coincide', 4000);
            }
            if(preguntaNv == ''){
                Materialize.toast('La respuesta a tu pregunta secreta no puede estar vacía', 4000);   
            }
            else{
            var datos = {pin: pinNuevo, matricula:$_SESSION[Mat], pregunta: preguntaNv, respuesta: respuesta};
                $.ajax({
                    url:'php/cambioPass.php',
                    dataType:'JSON',
                    type: 'POST',
                    data: datos,
                    success: function(response) {
                        var pin = response.pin;
                        Materialize.toast('Datos de Sesión actualizados', 4000);   
                        $('#modal1').closeModal();
                    },

                });
            }
        });
    }
   
    
    var consejales;
    var consejal = 0;
    
    var datos = {carrera: $("#custId2").val()};
    $.ajax({
    type: 'POST',
    async: true,
    url: 'php/consultarConcejalEspecifico.php',
    timeout: 12000,
    data: datos,
    dataType: 'json',
    success: function(response){
        consejales = response.resultado;
        if(consejales.length != 0) {
            for(var i = 0; i < consejales.length; i++) {
                var votacion = consejales[i];
                
                var parent_0 = $('#misConse');
                var parent = $("<div class='card-image col l6 m6' id='div-consejal" + consejal+"'><br><img id='img"+votacion[0]+"' src='images/"+votacion[2]+"'>" + " Nombre: " + votacion[1] +  "</div>");
                parent_0.append(parent);
                consejal++;
                
            }   
        }
        else {
            Materialize.toast('No hay consejales', 4000);
        }

        }
    });


    
    
    var consejal = 0;
    var consejalArr ="";
    var datos = {carrera: $("#custId2").val()};
        $.ajax({
            type: 'POST',
            async: true,
            url: 'php/proximasVotaciones.php',
            timeout: 12000,
            data: datos,
            dataType: 'json',
            success: function(response){
                     consejalArr = response.resultado;
                    
                    for (let index = 0; index < consejalArr.length; index++) {
                        var element = consejalArr[index];
                        
                    }
                    var day = moment().format('YYYY-M-D h:mm:ss');
                    if(consejalArr.length === 0) {
                        var parent_0 = $('#proxVot');
                        var parent = $("<div class='col l6 m6' style='width:90%;font-size: 20px; border-radius: 15px; color: white; height:75px;background-color:#FF8571;' >"  + "<p style='margin-top:4%;'>No hay ninguna votación agendada para tu carrera</p>" + "</div>");
                        parent_0.append(parent);
                    }
                    else if(consejalArr[3] > day){
                        
                        var parent_0 = $('#proxVot');
                        var parent = $("<div class='col l6 m6' style='width:90%;font-size: 20px; border-radius: 15px; color: white; height: 75px; background-color:#30D245;' >"  + "<p style='margin-top:4%;'>Hay una votación en curso hasta "+consejalArr[3] + "</p></div>");
                        parent_0.append(parent);
                    }
                    else if(consejalArr[2] >= day){
                        var parent_0 = $('#proxVot');
                        var parent = $("<div class='col l6 m6' style='width:90%;font-size: 20px; border-radius: 15px; color: white; height: 75px; background-color:#FBB800;' >"  + "Fecha de Inicio  "+consejalArr[2] + "<br>" + "Hasta: "+"<br>"+cosejales[3]+"</div>");
                        parent_0.append(parent);
                    }

            }
        }); 
        
});
    

