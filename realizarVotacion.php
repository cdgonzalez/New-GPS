<?php
session_start(); //Iniciamos la Sesion o la Continuamos
if ($_SESSION['Nombre'])
{

}

?>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<html>
	 <head>
	  	<meta charset="UTF-8">
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <title>Realizar votacion</title>
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/css/materialize.min.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
	    <link rel="stylesheet" href="css/realizarVotacion.css">

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
            


<!-- Menú navbar-->
    <nav class="grey lighten-2" data-target="menu">
      <div class="nav-wrapper">
       <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons black">menu</i></a>
        <a href="#" class="brand-logo left grey darken-1" style="margin-left: 7%;">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">

          <li style="width:140px;" class="deep-purple lighten-3"><i class="material-icons left">cloud_circle</i><a  href="verificarCredencialQR.php">Votar</a></li>


          <li style="width:140px;" class="lime ligthten-1"><i class="material-icons left">cloud_circle</i><a class="dropdown-button" href="" data-activates="dropEva" data-beloworigin="true">Evaluaciones</a></li>


          <li style="width:140px;" class="purple lighten-3"><i class="material-icons left">cloud_circle</i><a class="dropdown-button" href="" data-activates="dropEst" data-beloworigin="true">Estadisticas</a></li>

          <li style="width:140px;" class="pink accent-2"><i class="material-icons left">cloud_circle</i><a id="control" class="dropdown-button" href="" data-activates="opcionesN"><?php echo $_SESSION['Mat']; ?></a></li>
        </ul>
      </div>
    </nav>



    <!-- SideNav -->


    <ul class="sidenav" id="slide-out">
        <div class="user-view">
            <ul class="grey darken-3">
             <li class="pink accent-2"><i class="material-icons left">cloud_circle</i><a class="dropdown-trigger" href="#" data-target="opciones"><?php echo $_SESSION['Mat']; ?></a></li>
             <li class="purple lighten-3"><i class="material-icons left">cloud_circle</i><a class="dropdown-trigger" href="#" data-target="dropCandi">Estadisticas</a></li>
             <li class="lime ligthten-1"><i class="material-icons left">cloud_circle</i><a class="dropdown-trigger" href="#" data-target="dropVot">Evaluaciones</a></li>
             <li class="deep-purple lighten-3"><i class="material-icons left">cloud_circle</i><a href="realizarVotacion.html">Votar</a></li>
            </ul>
        </div>
    </ul>

	    <div class="row">
	    	<div class="col s12 m12">
	    		<div class="col s12 m12">
	    			<p id="titulo">Selecciona el candiato de tu preferencia y luego ingresa tu <br> número de control para confirmar.</p>
	    		</div>
	    		
	    		<div class="col s12 m12">
	    			<div id="candidatos">
				    </div>

				    <div class="col s12 m4" style="margin: 20px auto;">
			        	<div class="card-image">
			          		<img id="candidato0" class="imagen" src="images/nulo.jpg" style="border: 5px solid blue;" onclick="seleccionar(0)">
			        	</div>

			        	<span class="card-title">NULO</span>
				    </div>
	    		</div>


		    	<div id="div-control" class="input-field col s12 m4">
		    			<input id="confirmaControl" type="text" name="confirmaControl" placeholder="Número de control">
		    	</div>

		    	<div id="div-botones" class="col s12 m4 offset-m4">
		    		<div id="div-btn-confirmar">
		    			<button id="btn-confirmar" class="btn blue">Confirmar y votar</button>
		    		</div>
		    		<div id="div-btn-cancelar">
		    			<button id="btn-cancelar" class="btn red">Cancelar</button>
		    		</div>
		    	</div>
		    </div>
	    </div>
	</body>

	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>    
	<script src="js/realizarVotacion.js"></script>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
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
</html>