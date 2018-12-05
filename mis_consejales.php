<?php
session_start(); //Iniciamos la Sesion o la Continuamos
if ($_SESSION['Nombre'])
{
    
}

?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mis Consejales</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.css" media="screen,projection">
</head>
<body>


<!-- Menú navbar-->
<div class="navbar-fixed">
    <nav class="menu grey lighten-2" data-target="menu">
        <div class="nav-wrapper">
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons black">menu</i></a>
          <a href="#" class="brand-logo center grey darken-1">Logo</a>
          <ul class="right hide-on-med-and-down">
            <li style="width:170px;" class="blue"><i class="material-icons left">person</i><a href="mis_consejales.html">Mis Consejales</a></li>
            <!-- Modal Trigger -->
            <li class="pink lighten-4"><a class="modal-trigger" href="#sesion"><i class="material-icons left ">account_circle</i>Iniciar Sesión</a></li>
          </ul>
        </div>
    </nav>
</div>

 <!-- Modal Structure -->
  <div style="width: 25%; height: 60%;" id="sesion" class="modal">
    <div class="modal-content">
      <h4 style="color: #e0e0e0;">Iniciar Sesión</h4>
      <form action="inicio.php" method="POST">
          <div class="input-field">
              <input id="mat" type="text" class="validate"><br>
              <label for="mat">Matricula</label>

          </div>
          <div class="input-field">
              <input id="pin" type="text" class="validate"><br>
              <label for="pin">PIN</label>
          </div>

      </form>
    </div>
    <div class="modal-footer center">
      <div class="row">

          <div class="col m12">
            <input style="background-color: #1e88e5;" class="col m12 btn" type="submit" value="Iniciar Sesión"><br>
          </div>
          <div class="col m12"><a style="background-color: #e0e0e0;" href="#!" class="modal-close col m12 waves-effect waves-green btn">Cancelar</a>
          </div>
            <div class="col m12"><a style="color: #e0e0e0; font-size: 2em; margin-top: 5%;" href="" class="modal-close col m12 waves-effect waves-green center">Recuperar PIN</a>
            </div>
      </div>
    </div>
  </div>

    <!-- SideNav -->

<div class="row">
    <ul class="sidenav" id="mobile-demo">
        <div class="">
            <ul class="collapsible grey darken-3">

            <li class="pink lighten-4"><a class="modal-trigger" href="#sesion"><i class="material-icons left ">account_circle</i>Iniciar Sesión</a></li>
            <li class="blue"><a class="modal-trigger" href=""><i class="material-icons left ">person</i>Mis Consejales</a></li>
            </ul>
        </div>
    </ul>
</div>



<!--Contenido de la página-->
<div class="row">
    <div class="col m12">
        <h3 class="left" style="margin-left: 2%; color: blue;">Mis Consejales</h3>
    </div>
    <div class="col m12">
        <p style="margin-left: 2%;">Selecciona una carrera para ver los consejales pertenecientes a ella.</p>
    </div>
</div>


  <div class="row">
      <div class="col m12">
          <ul class="collapsible">
            <li>
              <div class="collapsible-header"><i class="material-icons">person</i>Ingeniería en ... </div>
              <div class="collapsible-body row">
                <div class="col s3 m3">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="images/profile.png">
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4">Nombre del Consejal<i class="material-icons right">more_horiz</i></span>

                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4"><h5 style="color:blue;">Nombre Apellidos</h5><i class="material-icons right">close</i></span>
                      <p>Consejal en Ingeniería en...</p>
                      <p>Matricula: </p>
                      <p>Consejal desde: </p>
                      <p>Propuestas de Campaña: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero repudiandae aliquid sequi ab rerum sed magnam molestias, nihil id aperiam consequatur recusandae, cumque veniam voluptatibus animi libero doloremque omnis. Recusandae.</p>
                    </div>
                  </div>
                </div>
                <div class="col s3 m3">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="images/profile.png">
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4">Nombre del Consejal<i class="material-icons right">more_horiz</i></span>

                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4"><h5 style="color:blue;">Nombre Apellidos</h5><i class="material-icons right">close</i></span>
                      <p>Consejal en Ingeniería en...</p>
                      <p>Matricula: </p>
                      <p>Consejal desde: </p>
                      <p>Propuestas de Campaña: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero repudiandae aliquid sequi ab rerum sed magnam molestias, nihil id aperiam consequatur recusandae, cumque veniam voluptatibus animi libero doloremque omnis. Recusandae.</p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="collapsible-header"><i class="material-icons">person</i>Ingeniería en ... </div>
              <div class="collapsible-body row">
                <div class="col s3 m3">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="images/profile.png">
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4">Nombre del Consejal<i class="material-icons right">more_horiz</i></span>

                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4"><h5 style="color:blue;">Nombre Apellidos</h5><i class="material-icons right">close</i></span>
                      <p>Consejal en Ingeniería en...</p>
                      <p>Matricula: </p>
                      <p>Consejal desde: </p>
                      <p>Propuestas de Campaña: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero repudiandae aliquid sequi ab rerum sed magnam molestias, nihil id aperiam consequatur recusandae, cumque veniam voluptatibus animi libero doloremque omnis. Recusandae.</p>
                    </div>
                  </div>
                </div>
                <div class="col s3 m3">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="images/profile.png">
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4">Nombre del Consejal<i class="material-icons right">more_horiz</i></span>

                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4"><h5 style="color:blue;">Nombre Apellidos</h5><i class="material-icons right">close</i></span>
                      <p>Consejal en Ingeniería en...</p>
                      <p>Matricula: </p>
                      <p>Consejal desde: </p>
                      <p>Propuestas de Campaña: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero repudiandae aliquid sequi ab rerum sed magnam molestias, nihil id aperiam consequatur recusandae, cumque veniam voluptatibus animi libero doloremque omnis. Recusandae.</p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="collapsible-header"><i class="material-icons">person</i>Ingeniería en ... </div>
              <div class="collapsible-body row">
                <div class="col s3 m3">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="images/profile.png">
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4">Nombre del Consejal<i class="material-icons right">more_horiz</i></span>

                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4"><h5 style="color:blue;">Nombre Apellidos</h5><i class="material-icons right">close</i></span>
                      <p>Consejal en Ingeniería en...</p>
                      <p>Matricula: </p>
                      <p>Consejal desde: </p>
                      <p>Propuestas de Campaña: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero repudiandae aliquid sequi ab rerum sed magnam molestias, nihil id aperiam consequatur recusandae, cumque veniam voluptatibus animi libero doloremque omnis. Recusandae.</p>
                    </div>
                  </div>
                </div>
                <div class="col s3 m3">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="images/profile.png">
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4">Nombre del Consejal<i class="material-icons right">more_horiz</i></span>

                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4"><h5 style="color:blue;">Nombre Apellidos</h5><i class="material-icons right">close</i></span>
                      <p>Consejal en Ingeniería en...</p>
                      <p>Matricula: </p>
                      <p>Consejal desde: </p>
                      <p>Propuestas de Campaña: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero repudiandae aliquid sequi ab rerum sed magnam molestias, nihil id aperiam consequatur recusandae, cumque veniam voluptatibus animi libero doloremque omnis. Recusandae.</p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="collapsible-header"><i class="material-icons">person</i>Ingeniería en ... </div>
              <div class="collapsible-body row">
                <div class="col s3 m3">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="images/profile.png">
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4">Nombre del Consejal<i class="material-icons right">more_horiz</i></span>

                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4"><h5 style="color:blue;">Nombre Apellidos</h5><i class="material-icons right">close</i></span>
                      <p>Consejal en Ingeniería en...</p>
                      <p>Matricula: </p>
                      <p>Consejal desde: </p>
                      <p>Propuestas de Campaña: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero repudiandae aliquid sequi ab rerum sed magnam molestias, nihil id aperiam consequatur recusandae, cumque veniam voluptatibus animi libero doloremque omnis. Recusandae.</p>
                    </div>
                  </div>
                </div>
                <div class="col s3 m3">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="images/profile.png">
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4">Nombre del Consejal<i class="material-icons right">more_horiz</i></span>

                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4"><h5 style="color:blue;">Nombre Apellidos</h5><i class="material-icons right">close</i></span>
                      <p>Consejal en Ingeniería en...</p>
                      <p>Matricula: </p>
                      <p>Consejal desde: </p>
                      <p>Propuestas de Campaña: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero repudiandae aliquid sequi ab rerum sed magnam molestias, nihil id aperiam consequatur recusandae, cumque veniam voluptatibus animi libero doloremque omnis. Recusandae.</p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="collapsible-header"><i class="material-icons">person</i>Ingeniería en ... </div>
              <div class="collapsible-body row">
                <div class="col s3 m3">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="images/profile.png">
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4">Nombre del Consejal<i class="material-icons right">more_horiz</i></span>

                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4"><h5 style="color:blue;">Nombre Apellidos</h5><i class="material-icons right">close</i></span>
                      <p>Consejal en Ingeniería en...</p>
                      <p>Matricula: </p>
                      <p>Consejal desde: </p>
                      <p>Propuestas de Campaña: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero repudiandae aliquid sequi ab rerum sed magnam molestias, nihil id aperiam consequatur recusandae, cumque veniam voluptatibus animi libero doloremque omnis. Recusandae.</p>
                    </div>
                  </div>
                </div>
                <div class="col s3 m3">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="images/profile.png">
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4">Nombre del Consejal<i class="material-icons right">more_horiz</i></span>

                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4"><h5 style="color:blue;">Nombre Apellidos</h5><i class="material-icons right">close</i></span>
                      <p>Consejal en Ingeniería en...</p>
                      <p>Matricula: </p>
                      <p>Consejal desde: </p>
                      <p>Propuestas de Campaña: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero repudiandae aliquid sequi ab rerum sed magnam molestias, nihil id aperiam consequatur recusandae, cumque veniam voluptatibus animi libero doloremque omnis. Recusandae.</p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="collapsible-header"><i class="material-icons">person</i>Ingeniería en ... </div>
              <div class="collapsible-body row">
                <div class="col s3 m3">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="images/profile.png">
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4">Nombre del Consejal<i class="material-icons right">more_horiz</i></span>

                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4"><h5 style="color:blue;">Nombre Apellidos</h5><i class="material-icons right">close</i></span>
                      <p>Consejal en Ingeniería en...</p>
                      <p>Matricula: </p>
                      <p>Consejal desde: </p>
                      <p>Propuestas de Campaña: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero repudiandae aliquid sequi ab rerum sed magnam molestias, nihil id aperiam consequatur recusandae, cumque veniam voluptatibus animi libero doloremque omnis. Recusandae.</p>
                    </div>
                  </div>
                </div>
                <div class="col s3 m3">
                  <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                      <img class="activator" src="images/profile.png">
                    </div>
                    <div class="card-content">
                      <span class="card-title activator grey-text text-darken-4">Nombre del Consejal<i class="material-icons right">more_horiz</i></span>

                    </div>
                    <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4"><h5 style="color:blue;">Nombre Apellidos</h5><i class="material-icons right">close</i></span>
                      <p>Consejal en Ingeniería en...</p>
                      <p>Matricula: </p>
                      <p>Consejal desde: </p>
                      <p>Propuestas de Campaña: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero repudiandae aliquid sequi ab rerum sed magnam molestias, nihil id aperiam consequatur recusandae, cumque veniam voluptatibus animi libero doloremque omnis. Recusandae.</p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
      </div>
  </div>
   <!-- Modal Preguntas-->
   <div style="width: 25%; height: 60%;" id="modal2" class="modal">
    <div class="modal-content">
      <h4 style="font-size:25px;">Cambiar pregunta secreta</h4>
      <p>Selecciona una pregunta y escribe tu respuest. <br>
      Recuerda que con esta pregunta puedes recuperar tu contraseña.</p>
    
        <form action="php/cambioPregunta.php" method="POST" id="form2">
            <div class="row">
                <div class="input-field col m12 s12 l12">
                    <select id="preguntas">
                        <option value="" disabled selected>Elije tu pregunta</option>
                        
                    </select>
                    <label for="">Pregunta Secreta</label>
                </div>
                <br>
                <div class="input-field col m12 s12 l12">
                    <input id="respuesta" type="text" class="validate" required>
                    <label for="respuesta">Tu respuesta</label>
                    <input type="hidden" id="custId" name="custId" value="<?php echo $_SESSION['Mat']; ?>">
                </div>
            </div>   
        </form>
    </div>
    <div class="modal-footer center">
      <div class="row">
          <div class="col m12">
            <input style="background-color: rgb(153,201,249);;" class="col m12 btn" type="submit" id="cambioPregunta" value=Listo><br>
            <input style="background-color: rgb(255,128,128);" class="col m12 btn modal-close" type="submit" href="#!" value=Cancelar><br>
          </div>
      </div>
    </div>
</div>



<!--Footer-->
<div class="page-footer white">
     <div class="row">
      <div class="col s9 ">
          <span>
              <p style="color:black;">Copyright 2018 Sistema de Votos CEITM by ManSoft</p>
          </span>
      </div>
      <div class="col s2 offset-s1">
          <img width="75px" height="75px" src="images/logo.jpg" class="image-responsive" alt="logo">
      </div>
  </div>
</div>



</body>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>  
<script src="js/materialize.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
        
       
        
        $('.collapsible').collapsible();
        $('.sidenav').sidenav();
        $('.modal').modal();
        $('.dropdown-trigger').dropdown({ hover: false, closeOnClick: false,            coverTrigger:      false, constrainWidth: false,inDuration: 500,
            outDuration: 400, });
            $('.slider').slider();
            $('.carousel.carousel-slider').carousel({fullWidth: true});
    });

</script>
<script type="text/javascript">
    $(document).ready(function(){
     
        $('#modal2').modal(); 
        
    });
</script>
<script type="text/javascript" src="js/preguntasSecretas.js"></script>

</html>
