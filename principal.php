<?php
include_once('funciones/template.php');
include_once ('funciones/formulario.php');
doctype("Fundación Misión Ribas del Estado Miranda");
bannerSistema();
menuSuperior();
//slideShow();
?>
   <!-- Sistema -->
   <?php
   formularioI("Acceso al Sistema", "acceso();","funciones/bd_acciones.php","6");
   ?>
   <h6><small class="rojo right">( * ) Campo Obligatorio</small></h6>
   
    <div class="row">
      <div id="usuarioD" class="large-12 columns">
          <span data-tooltip class="has-tip tip-top" title="Ingrese el Nombre de Usuario <br>Ej: jribas">
          <label id="usuarioL">
              <span class="radius secondary label">? </span>
              <strong class="rojo"> * </strong> 
          Usuario
          </label>
          </span>
        <input name="usuario" id="usuario" type="text" placeholder="Indique...">
        <small id="usuarioE" class="hidden-field">Campo Obligatorio</small>
      </div>
    </div>
   
    <div class="row">
      <div id="contraseniaD" class="large-12 columns">
          <span data-tooltip class="has-tip tip-top" title="Ingrese la Contraseña para el Acceso al Sistema">
          <label id="contraseniaL">
              <span class="radius secondary label">? </span>
              <strong class="rojo"> * </strong> 
          Contraseña
          </label>
          </span>
        <input name="contrasenia" id="contrasenia" type="password" placeholder="Indique...">
        <small id="contraseniaE" class="hidden-field">Campo Obligatorio</small>
      </div>
    </div>
   
    <!--<div class="row">
        <div class="large-12 columns">
          <label for="customDropdown1">Medium Example</label>
          <select id="customDropdown1" class="large-12">
            <option DISABLED>This is a dropdown</option>
            <option>This is another option</option>
            <option>This is another option too</option>
            <option>Look, a third option</option>
          </select>
        </div>
    </div>-->   
<button name="acciones" value="acceder" class="button radius alert right">Accesar</button> 
  
<?php
formularioF();
footer();
?>


  
  
