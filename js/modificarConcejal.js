var urlCancelar = "registrarUsuario.php";
var npropuestas = 0; //Mantiene un número constante que aumenta 1 a 1
var nrealpropuestas = 0; //Es el número real de campos de texto que hay
var ntotalpropuestas = "";
var boton = 0;
var imgvalida = true;
var concejales;
var matriculaBaja;
var concejalSeleccionado;

$(document).ready(function(){
    //Funcion para cargar combobox de año
    cargarAno();
     $('.sidenav').sidenav();
    //Cargar imagen
    $("#archivo").on("change", function() {
        $("#output")[0].src = (window.URL ? URL : webkitURL).createObjectURL(this.files[0]);
        tamañoImg();
        var direccion = $('#archivo').val();
        var extensiones = direccion.substring(direccion.lastIndexOf("."));

        if(extensiones.toUpperCase() != ".JPG" && extensiones.toUpperCase() != ".PNG") {
            Materialize.toast("Selecciona un archivo jpg o png válido", 4000);
            imgvalida = false;
        }
    });

    //Funcion del boton agregar propuesta
    $("#btn-add").click(function(){
        var parent_0 = $("#div_propuestas");
        var parent = $("<div style='margin-top: 20px;' id='textarea"+(npropuestas + 1)+"'>");
        // Añadir div con el text_area
        var tarea_div = $("<div class='input-field col s11 m4 offset-m4' style='width: 75%; margin-left: auto'>");
        var tarea = $("<textarea id='text-propuesta" + (npropuestas + 1) + "' class='materialize-textarea'>");
        var tarea_label = $("<label for='textarea"+(npropuestas + 1)+"'>");
        tarea_label.text("Propuesta #" + (npropuestas + 1));
        tarea_div.append(tarea);
        tarea_div.append(tarea_label);
        // Añadir el botón de borrar
        var cerrar_div = $("<div class='con s1 m1' style='margin-top: 15px;'>");
        var cerrar_btn = $("<a class='white black-text z-depth-1' style='border:none; cursor: pointer;' onclick=cerrar("+(npropuestas+1)+")>");
        // cerrar_btn.click(cerrar(npropuestas+1));
        var cerrar_icon = $("<i class='material-icons left'>");
        cerrar_icon.text("close");
        cerrar_btn.append(cerrar_icon);
        cerrar_div.append(cerrar_btn);
        // Añadir al padre
        parent.append(tarea_div);
        parent.append(cerrar_div);
        parent_0.append(parent);
        npropuestas++;
        nrealpropuestas++;
        ntotalpropuestas += npropuestas + "|";
    });

    //Carga el combobox
    $('#periodo').material_select();
    $('#ano').material_select();

    //Funcion click del boton buscar
    $('#btn-buscar').click(function(){
        var busqueda = $('#busqueda').val();
        limpiarModal();

        if(busqueda.length != 0) {
            $.ajax({
                type: "POST",
                async: true,
                url: "php/consultarConcejal.php",
                timeout: 12000,
                data: "busqueda=" + busqueda.toUpperCase(),
                dataType: "json",
                success: function(response){
                    concejales = response.resultado;
                    if(concejales.length != 0) {
                        for(var i = 0; i < concejales.length; i++) {
                            var concejal = concejales[i];

                            var parent_0 = $("#modal-content1");
                            var parent = $("<button id='btn-select" + boton + "' class='btn btns blue' style='margin-top: 10px;'' onclick='concejalSelect(" + i + ")'>" + concejal[0] + " - " + concejal[1] + "</button>");
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
            Materialize.toast('No has ingresado ningún valor de búsqueda', 4000);
        }
    });

    //Funcion click del boton actualizar
    $('#btn-actualizar').click(function(){
        var periodo = $('#periodo option:selected').text() + " " + $('#ano option:selected').text();
        var nombreArchivo = $('#nombre-archivo').val();
        var nvapropuestas = propuesta();
        var archivo = $('#archivo');
        var form_data = new FormData();
        form_data.append('archivo_ajax', archivo[0].files[0]);
        form_data.append('user_name', concejalSeleccionado[0]);
        var archivo;

        if(imgvalida){
            if(periodo != concejalSeleccionado[4] || nombreArchivo != concejalSeleccionado[2] || nvapropuestas != concejalSeleccionado[3]) {
                $.ajax({
                    type: "post",
                    url: "php/subeImagen.php",
                    async: true,
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    dataType: "json",
                    success: function (response) {
                        archivo = response.nombre_archivo;
                        $.ajax({
                            type: "POST",
                            async: true,
                            url: "php/actualizarConcejal.php",
                            timeout: 12000,
                            data: "matricula=" + concejalSeleccionado[0] + "&periodo=" + periodo + "&imagen=" + archivo + "&propuestas=" + nvapropuestas,
                            dataType: "json",
                            success: function(response){
                                if(response.resultado === "Actualizacion realizada con exito") {
                                    window.open(urlCancelar, '_self');
                                }
                            }
                        });
                    }
                });
            }
            else {
                window.open(urlCancelar, '_self');
            }
        }
    });


    //Funcion click del boton baja
    $('#btn-baja').click(function(){
        $('#modal2').openModal();

        $('#si-borrar').click(function(){
            //Cierra modal
            $('#modal2').closeModal();

            $.ajax({
                type: "POST",
                async: true,
                url: "php/bajaConcejal.php",
                timeout: 12000,
                data: "matricula=" + concejalSeleccionado[0] + "&activo=" + false,
                dataType: "json",
                success: function(response){
                    if(response.resultado === "Baja realizada con exito") {
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

        var no = ntotalpropuestas.split("|");
        for(var i = 0; i < no.length; i++) {
            cerrarTP(no[i]);
        }
        npropuestas = 0;
        nrealpropuestas = 0;
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

function cerrar(numero){
    // Elimina el div con el campo de texto
    var tarea_div = $("#textarea" + numero);
    tarea_div.remove();
    nrealpropuestas--;

    var no = ntotalpropuestas.split("|");
    var tmp = "";
    for(var i = 0; i < no.length-1; i++) {
        if(no[i] != numero) {
            tmp += no[i] + "|";
        }
    }
    ntotalpropuestas = tmp;
}

function cerrarTP(numero) {
    var tarea_div = $("#textarea" + numero);
    tarea_div.remove();
}

function cargarAno() {
    var ano = (new Date).getFullYear();
    var parent_0 = $("#ano");

    for (var i = 2000; i <= ano; i++) {
        var parent = $("<option value='"+i+"'>"+i+"</option>");
        parent_0.append(parent);
    }
}

function tamañoImg() {
    var w = $("#buscarArchivo").width();
    w = w -(w*0.2);
    $("#output").css("width", w);
    $("#output").css("height", w);
}

function concejalSelect(seleccionado) {
    $('#modal1').closeModal();
    $('#div-buscar').css("display", "none");
    $('#div-datos').css("display", "block");
    $('#div-btn-datos').css("display", "block");
    $('#busqueda').val("");
    limpiarModal();

    concejalSeleccionado = concejales[seleccionado];
    matriculaBaja = concejalSeleccionado[0];

    var i;
    var per = concejalSeleccionado[4];
    var periodo = "";
    var year = "";
    for(i = 0; i < 7; i++) {
        periodo += per[i];
    }
    for(var j = i+1; j < per.length; j++) {
        year += per[j];
    }

    if(periodo === "ENE-JUN") {
        $('#periodo').val('1');
        $('#periodo').material_select();
    }
    else {
        $('#periodo').val('1');
        $('#periodo').material_select();
    }

    $('#ano').val(year);
    $('#ano').material_select();


    $('#titulo2').text("Datos de " + concejalSeleccionado[0] + ", " + concejalSeleccionado[1]);
    $('#output').attr('src','images/' + concejalSeleccionado[2]);
    tamañoImg();

    if(concejalSeleccionado[5] === "f") {
        $('#btn-baja').attr("disabled", true);
    }

    $("#nombre-archivo").val(concejalSeleccionado[2]);

    if(concejalSeleccionado[3] != null) {
        var propuestas = concejalSeleccionado[3].split("|");

        for(var i = 0; i < propuestas.length; i++) {
            $("#btn-add").click();
            $("#text-propuesta" + npropuestas).text(propuestas[i]);
        }
    }
}

function limpiarModal() {
    for(var i = 0; i < boton; i++) {
        $("#btn-select" + i).remove();
    }
}

function propuesta() {
    var nvapropuestas = "";

    if(nrealpropuestas != 0) {
        var no = ntotalpropuestas.split("|");

        for(var i = 0; i < no.length-1; i++) {
            nvapropuestas += $("#text-propuesta" + no[i]).val();

            if((i+1) != no.length-1) {
                nvapropuestas += "|";
            }
        }
    }

    var tmp = "";
    for(var i = 0; i < nvapropuestas.length; i++) {
        tmp += nvapropuestas[i];
    }

    nvapropuestas = tmp;

    return nvapropuestas;
}

