<?php
session_start(); //Iniciamos la Sesion o la Continuamos
if ($_SESSION['Nombre'])
{

}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Modificar Usuario</title>
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
                <li><a href="#!">Nuevo</a></li>
                <li><a href="#!">Modificar</a></li>
            </ul>
            <!--Dropdown Votaciones-->
            <ul id='dropVotN' class="dropdown-content">
                <li><a href="#!">Nueva</a></li>
                <li><a href="#!">Ver Votaciones</a></li>
            </ul>


   <!--Dropdown Contenido SideNav-->
            <ul id='opciones' class='dropdown-content'>
                <li><a href="index.html">Cerrar Sesión</a></li>
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
                <li><a href="#!">Registrar</a></li>
                <li><a href="modificarConcejal.php">Modificar</a></li>

            </ul>
            <!--Dropdown Candidatos-->
            <ul id='dropCandi' class="dropdown-content">
                <li><a href="#!">Nuevo</a></li>
                <li><a href="#!">Modificar</a></li>
            </ul>
            <!--Dropdown Votaciones-->
            <ul id='dropVot' class="dropdown-content">
                <li><a href="#!">Nueva</a></li>
                <li><a href="#!">Ver Votaciones</a></li>
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

ce

    <div id="modal1" class="modal">
      <div id="modal-content1" class="modal-content">
      </div>
    </div>

    <div id="modal2" class="modal">
      <div id="modal-content2" class="modal-content">
      <span>¿Estas Seguro?</span>
      </div>
      <div class="modal-footer">
        <a class=" modal-action modal-close waves-effect waves-green btn-flat">cancelar</a>
        <a id="si-borrar" class=" modal-action modal-close waves-effect waves-green btn-flat">Si</a>
      </div>
    </div>

    <section class="container">
      <div id="div-buscar" class="row">
        <div class="col s12 m6 offset-m3">
          <h5 id="titulo1">Modificar usuario</h5>

          <div class="input-field">
            <input id="busqueda" type="text" name="buscarMN" placeholder="Ingrese matricula o nombre a buscar...">
          </div>

          <div id="div-btn-buscar">
            <button id="btn-buscar" class="btn green" href="#modal1">Buscar</button>
          </div>

          <div id="div-btn-cancelar">
            <button id="btn-cancelar" class="btn grey">Cancelar</button>
          </div>

        </div>
      </div>

      <div id="div-datos" class="row">
        <div class="col s12 m3">
          <button id="btn-regresar" class="btn grey">Regresar a busqueda</button>
        </div>

        <div class="col s12 m6">
          <h5 id="titulo2">Datos de [Matricula, Nombre completo]</h5>

          <div class="input-field">
            <input id="nombre" type="text" name="nombre">
          </div>

          <div class="input-field">
            <input id="matricula" type="text" name="matricula">
          </div>

          <div class="input-field">
            <select id="carrera">
              <option value="0" disabled selected>Carrera</option>
              <option value="1">Ing. Sistemas Computacionales</option>
              <option value="2">Ing. Informatica</option>
              <option value="3">Ing. Tecnologias de la Informacion</option>
              <option value="4">Ing. Industrial</option>
              <option value="5">Ing. Gestion Empresarial</option>
              <option value="6">Lic. Administracion</option>
              <option value="7">Ing. Electrica</option>
              <option value="8">Lic. Contador Publico</option>
              <option value="9">Ing. Bioquimica</option>
              <option value="10">Ing. Electronica</option>
              <option value="11">Ing. Mecatronica</option>
              <option value="12">Ing. Mecanica</option>
              <option value="13">Ing. Materiales</option>
            </select>
          </div>

          <div class="input-field">
            <label for="administrador">
              <input type="checkbox" id="administrador"/>
              <span>Es administrador</span>
            </label>
          </div>

          <div id="div-btn-actualizar">
            <button id="btn-actualizar" class="btn green">Actualizar</button>
          </div>

          <div id="div-btn-borrar">
            <button id="btn-borrar" class="btn red" href="#modal2">Borrar usuario</button>
          </div>

          <div id="div-btn-cancelar">
            <button id="btn-cancelar2" class="btn grey">Cancelar</button>
          </div>
        </div>
      </div>
    </section>
  </body>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
  <script src="js/modificarUsuario.js"></script>


</html>
