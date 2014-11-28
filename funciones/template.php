<?php
    /* Maquetación del Sitio Web */
    function doctype($title){
        if($title==""){
            $title="Sistema de Gestión para el Registro de Títulos de la Fundación Misión Ribas del Estado Miranda";
        }
        echo '<!DOCTYPE html>';
        echo '<!--[if IE 8]>';
        echo '<html class="no-js lt-ie9" lang="en" > <![endif]-->';
        echo '<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->';
        echo '<head>';
	echo '<meta charset="utf-8">';
        echo '<meta name="viewport" content="width=device-width">';
        echo '<link rel="icon" href="images/minilogo.png"/>';
            echo '<title>'. $title .'</title>';
            echo '<link rel="stylesheet" href="css/foundation.css">';
            echo '<link rel="stylesheet" href="css/stylesheet.css">';
            echo '<script src="js/vendor/custom.modernizr.js"></script>';
            echo '<script src="js/function.js"></script>';
        echo '</head>';
        echo '<body>';
        echo '<div class="row">';
        echo '<div class="contenedor large-12 columns">';
        
    }
    /*Banner*/
    function banner(){
        echo'
        <div class="row">
            <div class="large-12 columns">
                <img src="images/banner.png" title="Banner de la Fundación" alt="Muestra el Banner de la Fundación"/>
            </div>
        </div>
        ';
    }
    /*Slide*/
    function slideShow(){
        echo '
            <div class="row">
                <div class="large-12 columns">
                    <hr />
                    <ul data-orbit>
                        <li>
                            <img src="images/slide1.png" />
                            <div class="orbit-caption">Misión Ribas en el Estado Miranda</div>
                        </li>
                        <li>
                          <img src="images/slide2.png" />
                          <div class="orbit-caption">Fotografias de Hugo Rafael Chávez Frías</div>
                        </li>
                    </ul>
		</div>
            </div>
        ';
    }
    /*Menu Superior*/
    function menuSuperior(){
        echo '
            <div class="row">
                <div class="large-12 columns">
                    <nav class="top-bar">
                        <ul class="title-area">
                        <!-- Title Area -->
                            <li class="name">
                                <h1><a href="index.php" title="Página Principal">Principal</a></h1>
                            </li>
                        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                        </ul>
                        <section class="top-bar-section">
                        <!-- Left Nav Section -->
                            <ul class="left">
                                <li class="divider"></li>
                                <li class="has-dropdown"><a href="#">Acerca de la Fundación</a>
                                    <ul class="dropdown">
                                        <li><a href="antecedentes.php">&raquo Antecedentes</a></li>
                                        <li class="divider"></li>
                                        <li><a href="biografia.php">&raquo Biografía de José Felix Ribas</a></li>
                                        <li class="divider"></li>
                                        <li><a href="misionRibas.php">&raquo ¿Qué es la Misión Ribas?</a></li>
                                        <li class="divider"></li>
                                        <li><a href="organigrama.php">&raquo Organigrama</a></li>
                                        <li class="divider"></li>
                                    </ul>
                                </li>
                                <li class="divider"></li>
                                <li class="has-dropdown"><a href="#">Programa Educativo</a>
                                    <ul class="dropdown">
                                        <li><a href="principal.php">&raquo Registro de Títulos para la Fundación Misión Ribas</a></li>
                                        <li class="divider"></li>
                                    </ul>
                                </li>
                                <li class="divider"></li>
                            </ul>
                        </section>
                    </nav> 
                </div>
            </div>
        ';
    }
    /*Footer*/
    function footer(){
        echo'
        <div class="row">
            <div class="large-12 columns">
                <h6>&copy; 2013 Misión Ribas</h6>
            </div>
        </div>
        <script>
  document.write("<script src=" +
  ("__proto__" in {} ? "js/vendor/zepto" : "js/vendor/jquery") +
  ".js><\/script>")
  </script>
  
  <script src="js/foundation.min.js"></script>
  <!--
  
  <script src="js/foundation/foundation.js"></script>
  
  <script src="js/foundation/foundation.alerts.js"></script>
  
  <script src="js/foundation/foundation.clearing.js"></script>
  
  <script src="js/foundation/foundation.cookie.js"></script>
  
  <script src="js/foundation/foundation.dropdown.js"></script>
  
  <script src="js/foundation/foundation.forms.js"></script>
  
  <script src="js/foundation/foundation.joyride.js"></script>
  
  <script src="js/foundation/foundation.magellan.js"></script>
  
  <script src="js/foundation/foundation.orbit.js"></script>
  
  <script src="js/foundation/foundation.reveal.js"></script>
  
  <script src="js/foundation/foundation.section.js"></script>
  
  <script src="js/foundation/foundation.tooltips.js"></script>
  
  <script src="js/foundation/foundation.topbar.js"></script>
  
  <script src="js/foundation/foundation.interchange.js"></script>
  
  <script src="js/foundation/foundation.placeholder.js"></script>
  
  <script src="js/foundation/foundation.abide.js"></script>
  
  -->
  
  <script>
    $(document).foundation();
  </script>
  </div><!-- Fin del row 12 columnas -->
</div><!-- Fin del row maestro -->
</body>
</html>
        ';
    }
 /*Banner del Sistema*/
    function bannerSistema(){
        echo'
        <div class="row">
            <div class="large-12 columns">
                <img src="images/bannerSistema.png" title="Banner del Sistema de Gestión para el Registro de Títulos de la Fundación Misión Ribas del Estado Miranda" alt="Muestra el Banner del Sistema de Gestión para el Registro de Títulos de la Fundación Misión Ribas del Estado Miranda"/>
            </div>
        </div>
        ';
    }
/*Menu del Sistema*/
    function menuSistema(){
        echo '
            <div class="row">
                <div class="large-12 columns">
                    <nav class="top-bar">
                        <ul class="title-area">
                        <!-- Title Area -->
                            <li class="name">
                                <h1><a href="modulos.php" title="Página Principal del Sistema">Principal</a></h1>
                            </li>
                        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                        </ul>
                        <section class="top-bar-section">
                        <!-- Left Nav Section -->
                            <ul class="left">
                                <li class="divider"></li>
                                <li class="has-dropdown"><a href="#">Registro de Estudiantes</a>
                                    <ul class="dropdown">
                                        <li><a href="aEstudiante.php">&raquo Agregar Estudiante</a></li>
                                        <li class="divider"></li>
                                        <li><a href="mEstudiante.php">&raquo Modificar Estudiante</a></li>
                                        <li class="divider"></li>
                                        <li><a href="eEstudiante.php">&raquo Eliminar Estudiante</a></li>
                                        <li class="divider"></li>
                                        <li><a href="cEstudiante.php">&raquo Consultar Estudiante</a></li>
                                        <li class="divider"></li>
                                    </ul>
                                </li>
                                <li class="divider"></li>
                                <li class="has-dropdown"><a href="#">Registro de Cuentas</a>
                                    <ul class="dropdown">
                                        <li><a href="aCuenta.php">&raquo Agregar Cuenta</a></li>
                                        <li class="divider"></li>
                                        <li><a href="mCuenta.php">&raquo Modificar Cuenta</a></li>
                                        <li class="divider"></li>
                                        <li><a href="eCuenta.php">&raquo Eliminar Cuenta</a></li>
                                        <li class="divider"></li>
                                        <li><a href="cCuenta.php">&raquo Consultar Cuenta</a></li>
                                        <li class="divider"></li>
                                    </ul>
                                </li>
                                <li class="divider"></li>
								<li class="has-dropdown"><a href="#">Registro de Títulos</a>
                                    <ul class="dropdown">
                                        <li><a href="aSerial.php">&raquo Agregar Serial</a></li>
                                        <li class="divider"></li>
                                        <li><a href="mSerial.php">&raquo Modificar Serial</a></li>
                                        <li class="divider"></li>
                                        <li><a href="cSerial.php">&raquo Consultar Serial </a></li>
                                        <li class="divider"></li>
                                        <li><a href="cSerialMaestra.php">&raquo Consulta Maestra</a></li>
                                        <li class="divider"></li>
										<li><a href="SerialesR.php">&raquo Seriales Registrados</a></li>
                                        <li class="divider"></li>
										<li><a href="SerialesP.php">&raquo Seriales Por Registrar</a></li>
                                        <li class="divider"></li>
                                    </ul>
                                </li>
                                <li class="divider"></li>
                            </ul>
							    <!-- Right Nav Section -->
    <ul class="right">
      <li class="divider hide-for-small"></li>
      <li class="has-dropdown"><a href="#">Mi Sesión</a>

        <ul class="dropdown">
          <li><label>Mi Sesión</label></li>
          
          <li><a href="confCuenta.php">&raquo; Configuración de la Cuenta</a></li>
		  <li class="divider"></li>
          <li><a href="cerrarSesion.php">&raquo; Cerrar Sesión</a></li>
          <li class="divider"></li>
        </ul>
      </li>
      <li class="divider"></li>
      
    </ul>
                        </section>
                    </nav> 
                </div>
            </div>
        ';
    }
?>
