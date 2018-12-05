var urlCancelar = "menuUsuario.php";
var urlQRCorrecto = "realizarVotacion.html";
var noControl;

$(document).ready(function () {

    noControl = $('#control').text();
    //Deshabilita boton girar camara
    $('#girarCamara').attr("disabled", true);

    //Activar camara
    setThingsUp();

    //Funcion click del boton cancelar
    $('#btn-cancelar').click(function(){
        window.open(urlCancelar, '_self');
    });
});

function setThingsUp() {
    let scanner = new Instascan.Scanner({
        video: document.getElementById('cam_video'),
        scanPeriod: 5,
        mirror: false,
        continuous: true
    });

    scanner.addListener('scan', function (content) {
        var lectura = content.split(':');
        var datos = lectura[3].trim();
        var noControlObtenido = datos.substr(0,8);

        if(noControlObtenido == noControl) {
            window.open(urlQRCorrecto, '_self');
        }
        else {
            Materialize.toast('Los datos escaneados no coinciden con tus datos. Intenta nuevamente.', 4000);
        }
    });

    Instascan.Camera.getCameras().then(function (cameras) {
        if(cameras.length > 0) {
            scanner.start(cameras[0]);

            if (cameras.length > 1) {
                $('#girarCamara').attr("disabled", false);

                var c_cam = 0;
                $("#girarCamara").click(function() {
                    if(c_cam==0){
                        scanner.start(cameras[1]);
                        c_cam = 1;
                    }
                    else {
                        c_cam = 0;
                        scanner.start(cameras[0]);
                    }
                });
            }
        } 
        else {
            Materialize.toast('No se ha detectado ninguna cámara. Es necesario que uses un dispositivo con cámara para continuar', 4000);
            window.open(urlCancelar, '_self');
        }
    }).catch(function (e) {
        Materialize.toast('No se ha detectado ninguna cámara. Es necesario que uses un dispositivo con cámara para continuar', 4000);
        window.open(urlCancelar, '_self');
    });
}