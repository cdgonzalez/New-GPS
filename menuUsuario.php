<?php
session_start(); //Iniciamos la Sesion o la Continuamos
if ($_SESSION['Nombre'])
{

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Usuario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link rel="stylesheet" href="css/modificarUsuario.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.css" media="screen,projection">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
    

     <!-- Dropdown Contenido NavBar-->
            <ul id='opcionesN' class='dropdown-content'>
                <li><a href="index.html">Cerrar Sesión</a></li>
                <li><a href="#!">Cambiar Contraseña</a></li>
                <li><a class="modal-trigger" href="#modal2">Cambiar Pregunta secreta</a></li>
            </ul>
            <!--Dropdown Usuarios-->
            <ul id='dropUserN' class="dropdown-content">
                <li><a href="registrarUsuario.php">Registrar</a></li>
                <li><a href="modificarUsuario.php">Modificar</a></li>

            </ul>
           


   <!--Dropdown Contenido SideNav-->
            <ul id='opciones' class='dropdown-content'>
                <li><a href="index.php">Cerrar Sesión</a></li>
                <li><a href="#!">Cambiar Contraseña</a></li>
                <li><a class="modal-trigger" href="#modal2">Cambiar Pregunta secreta</a></li>
            </ul>
            <!--Dropdown Usuarios-->
            <ul id='dropUser' class="dropdown-content">
                <li><a href="registrarUsuario.php">Registrar</a></li>
                <li><a href="modificarUsuario.php">Modificar</a></li>

            </ul>
            


<!-- Menú navbar-->
    <nav class="grey lighten-2" data-target="menu">
      <div class="nav-wrapper">
       <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons black">menu</i></a>
        <a href="#" class="brand-logo left grey darken-1" style="margin-left: 7%;">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">

          <li style="width:140px;" class="deep-purple lighten-3"><i class="material-icons left">cloud_circle</i><a  href="verificarCredencialQR.php">Votar</a></li>


          <li style="width:140px;" class="lime ligthten-1"><i class="material-icons left">cloud_circle</i><a class="dropdown-button" href="" data-activates="dropEva" data-beloworigin="true">Evaluaciones</a></li>


          <li style="width:140px;" class="purple lighten-3"><i class="material-icons left">cloud_circle</i><a class="dropdown-button" href="" data-activates="dropEst" data-beloworigin="true">Estadisticas</a></li>

          <li style="width:140px;" class="pink accent-2"><a class="dropdown-button" href="" data-activates="opcionesN"><i class="material-icons left">cloud_circle</i><?php echo $_SESSION['Mat']; ?></a></li>
        </ul>
      </div>
    </nav>



    <!-- SideNav -->


    <ul class="sidenav" id="slide-out">
        <div class="user-view">
            <ul class="grey darken-3">
             <li class="pink accent-2"><i class="material-icons left">cloud_circle</i><a class="dropdown-trigger" href="#" data-target="opciones"><?php echo $_SESSION['Mat']; ?></a></li>

             <li class="light-blue accent-3"><i class="material-icons left">cloud_circle</i><a class="dropdown-trigger" href="#" data-target='dropConse'>Consejales</a></li>

             <li class="green accent-3"><i class="material-icons left">cloud_circle</i><a  class="dropdown-trigger" href="#" data-target="dropUser">Usuarios</a></li>
             <li class="purple lighten-3"><i class="material-icons left">cloud_circle</i><a class="dropdown-trigger" href="#" data-target="dropCandi">Candidatos</a></li>
             <li class="lime ligthten-1"><i class="material-icons left">cloud_circle</i><a class="dropdown-trigger" href="#" data-target="dropVot">Votaciones</a></li>
             <li class="deep-purple lighten-3"><i class="material-icons left">cloud_circle</i><a href="realizarVotacion.php">Votar</a></li>
            </ul>
        </div>
    </ul>
    
    
    
    <!-- Modal -->
<div style="width: 25%; height: 60%;" id="modal1" class="modal">
    <div class="modal-content">
      <h4>Nuevo PIN</h4>
      <p>Ingresa tu nueva contraseña.<br>
      Debe tener de 6 a 8 carácteres. A partir de ahora, <br>
      deberás iniciar sesión con ella.</p>
    </div>
    <form action="php/cambioPass.php" method="POST" id="form1">
        <div class="row">
            <div class="input-field col m12">
                  <input id="pinNuevo" type="password" class="validate"  maxlength="8">
                  <label for="pinNuevo">PIN</label>
            </div>
            <div class="input-field col m12">
                  <input id="pinConfirm" type="password" class="validate"  maxlength="8">
                  <label for="pinConfirm">PIN</label>
            </div>
            <div class="input-field col m12">
                 <select id="preguntaPrimera">
                    <option value="" disabled selected>Pregunta Secreta</option>
                 </select>
            </div>
            <div class="input-field col m12">
                  <input id="respuestaPregunta" type="text" class="validate">
                  <label for="respuestaPregunta">Respuesta</label>
            </div>
        </div>
    </form>
    <div class="modal-footer center">
      <div class="row">
          <div class="col m12">
            <input style="background-color: rgb(153,201,249);" class="col m12 btn" type="submit" id="cambio" value=Listo><br>
            <button id="error" style="font-size:12px; background-color: black; color: white;" class="col m12 btn" type="button">El PIN debe tener por lo menos 6 carácteres</button>
            <button id="ingresa" style="background-color: black; color: white;" class="col m12 btn" type="button">Ingresa un PIN</button>
          </div>
      </div>
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
                    <input type="hidden" id="custId2" name="custId2" value="<?php echo $_SESSION['Carrera']; ?>">
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


<div class="row">
    <div class="col m12 l12">
        <h2 class="left" style="color: #e0e0e0;">Bienvenido,<?php echo $_SESSION['Nombre']; ?></h2>
    </div>
    <div class="col m12 l12">
        <p>Desde esta pagina serás capáz de votar, evaluar a tus concejales y ver las estadisticas de votaciones pasadas. <br>
        </p>

    </div>
    <div class="col m12 l12">
        <div class="row">
            <div class="col m6 l6">
                <h4 style="color: blue;">Proximas Votaciones</h4>
                <div id="proxVot">
                    
                </div>
            </div>
            <div  class="col m6 l6" >
                <h4 style="color: blue;">Mis consejales</h4>
                <div class="row" id="misConse">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-footer white" style="margin-top:23%;  ">
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


<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>  
<script type="text/javascript" src="js/moment.js"></script>

</body>
<script type="text/javascript">
    $(document).ready(function(){
        
        $('#ingresa').hide();
        $('#error').hide();
        $('#modal2').modal(); 
        
    });
</script>
<script type="text/javascript" src="js/preguntasSecretas.js"></script>
<script type="text/javascript" src="js/menuUsuario.js"></script>

</html>