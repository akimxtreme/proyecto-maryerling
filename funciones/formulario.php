<?php
    /* Maquetación de los Formularios del Sitio Web */

    /* Formulario de Inicio */
    function formularioI($titulo,$funcionJS,$action,$large){
        echo '<form class="custom" action="'. $action .'" method="POST" onsubmit="return '. $funcionJS .'">';
            echo '<fieldset class="large-'. $large .' columns large-centered">';
                echo '<legend class="rojo">'. $titulo .'</legend>';
        
    }
    
    /* Formulario Final */
    function formularioF(){
        echo '</fieldset>';
    echo '</form>';
    }
	
	
// <><><><>  Páginas para correr el CALENDARIO de la function fecha(); <><><><><><><><><><><><><><><><><><><><><><><><><><><><>
function paginas_calendario(){
	// Páginas necesarias el diseño del calendario
	// NOTA: Llamar solo una (1) vez a la function paginas_calendario(); aunque se utilice la función fecha(); varias veces en una misma página, para que pueda funcionar el script del calendario que estará dentro de la(s) etiqueta(s)
	echo '<link href="../css/calendario.css" type="text/css" rel="stylesheet">';
	echo '<script src="../js/calendar.js" type="text/javascript"></script>';
	echo '<script src="../js/calendar-es.js" type="text/javascript"></script>';
	echo '<script src="../js/calendar-setup.js" type="text/javascript"></script>';
}// <><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><>

?>
