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
    <title>Votaciones</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link rel="stylesheet" href="css/modificarConcejal.css">

    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Administrador</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.css" media="screen,projection">

  </head>

  <body>



     <!-- Dropdown Contenido NavBar-->
            <ul id='opcionesN' class='dropdown-content'>
                <li><a href="index.php">Cerrar Sesión</a></li>
                <li><a href="#!">Cambiar Contraseña</a></li>
                <li><a href="#!">Cambiar Pregunta secreta</a></li>
            </ul>
            <!--Dropdown Usuarios-->
            <ul id='dropUserN' class="dropdown-content">
                <li><a href="registrarUsuario.php">Registrar</a></li>
                <li><a href="modificarUsuario.php">Modificar</a></li>

            </ul>
            <!--Dropdown Consejales-->
            <ul id='dropConseN' class="dropdown-content">
                <li><a href="#!">Registrar</a></li>
                <li><a href="modificarConcejal.php">Modificar</a></li>

            </ul>
            <!--Dropdown Candidatos-->
            <ul id='dropCandiN' class="dropdown-content">
                <li><a href="altaCandidato.php">Nuevo</a></li>
                <li><a href="modificarCandidato.php">Modificar</a></li>
            </ul>
            <!--Dropdown Votaciones-->
            <ul id='dropVotN' class="dropdown-content">
                <li><a href="nuevaVotacion.php">Nueva</a></li>
                <li><a href="verVotaciones.php">Ver Votaciones</a></li>
            </ul>


   <!--Dropdown Contenido SideNav-->
            <ul id='opciones' class='dropdown-content'>
                <li><a href="index.php">Cerrar Sesión</a></li>
                <li><a href="#!">Cambiar Contraseña</a></li>
                <li><a href="#!">Cambiar Pregunta secreta</a></li>
            </ul>
            <!--Dropdown Usuarios-->
            <ul id='dropUser' class="dropdown-content">
                <li><a href="registrarUsuario.php">Registrar</a></li>
                <li><a href="modificarUsuario.php">Modificar</a></li>

            </ul>
            <!--Dropdown Consejales-->
            <ul id='dropConse' class="dropdown-content">
                <li><a href="altaCandidato.php">Registrar</a></li>
                <li><a href="modificarConcejal.php">Modificar</a></li>

            </ul>
            <!--Dropdown Candidatos-->
            <ul id='dropCandi' class="dropdown-content">
                <li><a href="altaCandidato.php">Nuevo</a></li>
                <li><a href="modificarCandidato.php">Modificar</a></li>
            </ul>
            <!--Dropdown Votaciones-->
            <ul id='dropVot' class="dropdown-content">
                <li><a href="nuevaVotacion.php">Nueva</a></li>
                <li><a href="verVotaciones.php">Ver Votaciones</a></li>
            </ul>


<!-- Menú navbar-->
    <nav class="grey lighten-2" data-target="menu">
      <div class="nav-wrapper">
       <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons black">menu</i></a>
        <a href="#" class="brand-logo left grey darken-1" style="margin-left: 7%;">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">

          <li style="width:140px;" class="deep-purple lighten-3"><i class="material-icons left">cloud_circle</i><a  href="">Votar</a></li>


          <li style="width:140px;" class="lime ligthten-1"><i class="material-icons left">cloud_circle</i><a class="dropdown-button" href="" data-activates="dropVotN" data-beloworigin="true">Votaciones</a></li>


          <li style="width:140px;" class="purple lighten-3"><i class="material-icons left">cloud_circle</i><a class="dropdown-button" href="" data-activates="dropCandiN" data-beloworigin="true">Candidatos</a></li>

          <li style="width:140px;" class="green accent-3"><i class="material-icons left">cloud_circle</i><a class="dropdown-button" href="" data-activates="dropUserN" data-beloworigin="true">Usuarios</a></li>

          <li style="width:140px;" class="light-blue accent-3"><i class="material-icons left">cloud_circle</i><a class="dropdown-button" href="" data-activates="dropConseN" data-beloworigin="true">Concejales</a></li>

          <li style="width:140px;" class="pink accent-2"><a class="dropdown-button" href="" data-activates="opcionesN"><i class="material-icons left">cloud_circle</i><?php echo $_SESSION['Mat']; ?></a></li>
        </ul>
      </div>
    </nav>






    <!-- SideNav -->


    <ul class="sidenav" id="slide-out">
        <div class="user-view">
            <ul class="grey darken-3">
             <li class="pink accent-2"><i class="material-icons left">cloud_circle</i><a class="dropdown-trigger" href="#" data-target="opciones"><?php echo $_SESSION['Mat']; ?></a></li>
             <h6 class="white">Opciones Administrativas</h6>

             <li class="light-blue accent-3"><i class="material-icons left">cloud_circle</i><a class="dropdown-trigger" href="#" data-target='dropConse'>Consejales</a></li>

             <li class="green accent-3"><i class="material-icons left">cloud_circle</i><a  class="dropdown-trigger" href="#" data-target="dropUser">Usuarios</a></li>
             <li class="purple lighten-3"><i class="material-icons left">cloud_circle</i><a class="dropdown-trigger" href="#" data-target="dropCandi">Candidatos</a></li>
             <li class="lime ligthten-1"><i class="material-icons left">cloud_circle</i><a class="dropdown-trigger" href="#" data-target="dropVot">Votaciones</a></li>
             <li class="deep-purple lighten-3"><i class="material-icons left">cloud_circle</i><a href="">Votar</a></li>
            </ul>
        </div>
    </ul>





<div class="row">
    <div class="col m12 l12">
        <h2 class="left" style="color: #e0e0e0;">Lista de Votaciones</h2>
    </div>
    <div class="col m12 l12">
        <div class="row" id="resultado">
            
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

</body>


        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script> 
       <script type="text/javascript" src="js/moment.js"></script>
       <script type="text/javascript" src="js/listaVotaciones.js"></script>
    
</html>
