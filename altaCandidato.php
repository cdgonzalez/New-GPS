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
    <title>Alta de un candidato</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link rel="stylesheet" href="css/altaCandidato.css">
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
                <li><a class="modal-trigger" href="#modal2">Cambiar Pregunta secreta</a></li>
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
                <li><a href="altaCandidato.php">Registrar</a></li>
                <li><a href="modificarCandidato.php">Modificar</a></li>
            </ul>
            <!--Dropdown Votaciones-->
            <ul id='dropVotN' class="dropdown-content">
                <li><a href="nuevaVotacion.php">Nueva Votación</a></li>
                <li><a href="verVotaciones.php">Ver Votaciones</a></li>
            </ul>


   <!--Dropdown Contenido SideNav-->
            <ul id='opciones' class='dropdown-content'>
                <li><a href="index.html">Cerrar Sesión</a></li>
                <li><a href="#!">Cambiar Contraseña</a></li>
                <li><a class="modal-trigger" href="#modal2">Cambiar Pregunta secreta</a></li>
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
                <li><a href="altaCandidato.php">Registrar</a></li>
                <li><a href="modificarCandidato.php">Modificar</a></li>
            </ul>
            <!--Dropdown Votaciones-->
            <ul id='dropVot' class="dropdown-content">
                <li><a href="nuevaVotacion.php">Nueva Votación</a></li>
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




 

	    <div id="modal1" class="modal">
	      <div id="modal-content1" class="modal-content">
	      </div>
	    </div>

	    <section class="container">
		    <div id="div-buscar" class="row">
		        <div class="col s12 m6 offset-m3">
		          <h5 id="titulo1">Alta candidato</h5>

		          <div class="input-field">
		            <input id="busqueda" type="text" name="buscarMN" placeholder="Ingrese matricula o nombre a buscar...">
		          </div>

		          <div id="div-btn-buscar">
		            <button id="btn-buscar" class="btn btns green" href="#modal1">Buscar</button>
		          </div>

		          <div id="div-btn-cancelar">
		            <button id="btn-cancelar" class="btn btns grey">Cancelar</button>
		          </div>
		        </div>
		    </div>

	      	<div id="div-datos" class="row">
		        <div class="col s12 m3">
		          <button id="btn-regresar" class="btn btns grey">Regresar a busqueda</button>
		        </div>
		        
		        <div class="col s12 m6">
		          	<h5 id="titulo2" class="center-align">Dar de alta a [Nombre completo, Matricula]</h5>

		          	<div class="card-image">
		            	<img id="output" src="images/sinFoto.jpg">
		          	</div>

		          	<div id="buscarArchivo" class="file-field input-field">
		           	 	<div class="btn">
		              		<span>Buscar</span>
		              		<input id="archivo" type="file" accept=".png,.jpg">
		            	</div>
		            	<div class="file-path-wrapper">
		              		<input id="nombre-archivo" class="file-path validate" type="text" placeholder="Fotografia">
		            	</div>
		          	</div>

		          	<div class="input-field col s12 m6">
		            	<select id="periodo">
		              		<option value="0" disabled selected>Periodo</option>
			              	<option value="1">ENE-JUN</option>
			              	<option value="2">AGO-DIC</option>
			            </select>
		          	</div>

		          	<div class="input-field col s12 m6">
		            	<select id="ano">
		              		<option value="0" disabled selected>Año</option>
		            	</select>
		          	</div>
	        	</div>

	        	<div id="div-btn-añadir" class="col s12 m3">
	          		<button id="btn-add" class="btn blue">Añadir propuesta</button>
		          	<div id="div_propuestas" class="row"></div>
	        	</div>

	        	<div id="div-btn-datos" class="col s12 m6 offset-m3">
	          		<div id="div-btn-registrar">
	              		<button id="btn-registrar" class="btn btns blue">Registrar</button>
	            	</div>

	            	<div id="div-btn-cancelar">
	              		<button id="btn-cancelar2" class="btn btns red">Cancelar</button>
	            	</div>           
	          	</div>
	        </div>
	    </section>

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


	</body>


  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>  
	<script src="js/altaCandidato.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
    
        $('#modal2').modal(); 
        
    });
</script>
    <script type="text/javascript" src="js/preguntasSecretas.js"></script>
	
</html>