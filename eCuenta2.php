<?php
session_start();
// Variables de sesión
if(isset($_SESSION['nombre_usuario']) && isset($_SESSION['privilegio']) && isset($_POST['id'])){
	$nombre_usuario =$_SESSION['nombre_usuario'];
	$privilegio = $_SESSION['privilegio'];
	$codigo_id = $_SESSION['id'];
	$id = $_POST['id'];
	if($privilegio==777 || $privilegio==1){
	
include_once('funciones/template.php');
include_once ('funciones/formulario.php');
include_once('funciones/conexion.php');
doctype("Fundación Misión Ribas del Estado Miranda");
bannerSistema();
echo '<hr><h5 class="right"><small>Bienvenido(a): '. $nombre_usuario .'</small></h5>';
menuSistema();
// Consultando los Datos del Usuario
$sql = "SELECT * FROM usuario WHERE id='$id'";
			$query = mysql_query($sql,$conexion);
			$cont=mysql_num_rows($query);
			while ($row = mysql_fetch_array($query)){
					$nombre_completo = $row['nombre1'] . " " . $row['nombre2'] . ", " . $row['apellido1'] . " " . $row['apellido2'];
					$nombre1 = $row['nombre1'];
					$nombre2 = $row['nombre2'];
					$apellido1 = $row['apellido1'];
					$apellido2 = $row['apellido2'];
					$cod_nacionalidad = $row['nacionalidad'];
					$cedula = $row['cedula'];
					$usuario = $row['usuario'];
					$cod_privilegio = $row['privilegio'];
			}
// Consultando la Nacionalidad
$sql = "SELECT nacionalidad FROM nacionalidad WHERE id='$cod_nacionalidad'";
			$query = mysql_query($sql,$conexion);
			$cont=mysql_num_rows($query);
			while ($row = mysql_fetch_array($query)){
				$sigla_nacionalidad = $row[0];
			}

			mysql_close();


//slideShow();
   formularioI("Eliminar Cuenta de Usuario", "","funciones/bd_acciones.php","10");
   ?>
   <h6><small class="rojo right">( * ) Campo Obligatorio</small></h6>
   <div class="row">
    <div id="usuarioD" class="large-6 columns">
              <span data-tooltip class="has-tip tip-top" title="Opcional: Ingrese un nombre de Usuario <br> Ej: jribas">
              <label id="usuarioL">
                  <span class="radius secondary label">? </span>
                   
              Usuario
              </label>
              </span>
            <input name="usuario" id="usuario" type="text" placeholder="Indique..." maxlength="15" value="<?php echo $usuario; ?>" disabled="disabled">
            <small id="usuarioE" class="hidden-field">Campo Obligatorio</small>
          </div>      
      <div id="cedulaD" class="large-6 columns">
          <span data-tooltip class="has-tip tip-top" title="Ingrese la Nacionalidad y la Cédula de Identidad <br>Ej: Nacionalidad = V <br> Cedula = 20977033">
          <label id="cedulaL">
              <span class="radius secondary label">? </span>
              <strong class="rojo"> * </strong> 
          Cédula de Identidad
          </label>
          </span>
        <div class="row">
        	<div class="large-3 columns">
        		<select name="nacionalidad" id="nacionalidad" class="large-12" disabled="disabled">
            		<?php 
					if($cod_nacionalidad==1){
						echo "<option value='$cod_nacionalidad'>V</option>";
						}else{
							echo "<option value='$cod_nacionalidad'>E</option>";
							}
					$sql = "SELECT id,nacionalidad FROM nacionalidad ORDER BY nacionalidad DESC";
					$query = mysql_query($sql,$conexion);
						while ($row = mysql_fetch_array($query)){
							$cod_nacionalidad = $row[0];
							$nacionalidad = $row[1];
							echo '<option value="'. $cod_nacionalidad .'">'. $nacionalidad .'</option>';
						}
					?>
          		</select>
            </div>
            <div class="large-9 columns">
        		<input name="cedula" id="cedula" type="text" placeholder="Indique..." onkeypress="return solonumeros(event);" maxlength="9" value="<?php echo $cedula; ?>" disabled="disabled">
                <small id="cedulaE" class="hidden-field">Campo Obligatorio</small>
        	</div>
            
        </div>
        
      </div>
      
      
    </div>
    <div class="row">
      <div id="nombre1D" class="large-6 columns">
          <span data-tooltip class="has-tip tip-top" title="Ingrese el Primer Nombre <br>Ej: José">
          <label id="nombre1L">
              <span class="radius secondary label">? </span>
              <strong class="rojo"> * </strong> 
          Primer Nombre
          </label>
          </span>
        <input name="nombre1" id="nombre1" type="text" placeholder="Indique..." value="<?php echo $nombre1; ?>" disabled="disabled">
        <small id="nombre1E" class="hidden-field">Campo Obligatorio</small>
      </div>
      <div id="nombre2D" class="large-6 columns">
          <span data-tooltip class="has-tip tip-top" title="Opcional: Ingrese el Segundo Nombre <br> Ej: Felix">
          <label id="nombre2L">
              <span class="radius secondary label">? </span>
               
          Segundo Nombre
          </label>
          </span>
        <input name="nombre2" id="nombre2" type="text" placeholder="Indique..." value="<?php echo $nombre2; ?>" disabled="disabled">
        <small id="nombre2E" class="hidden-field">Campo Obligatorio</small>
      </div>
   </div>
   <div class="row">   
      <div id="nombre1D" class="large-6 columns">
          <span data-tooltip class="has-tip tip-top" title="Ingrese el Primer Apellido <br>Ej: Ribas">
          <label id="apellido1L">
              <span class="radius secondary label">? </span>
              <strong class="rojo"> * </strong> 
          Primer Apellido
          </label>
          </span>
        <input name="apellido1" id="apellido1" type="text" placeholder="Indique..."value="<?php echo $apellido1; ?>" disabled="disabled">
        <small id="apellido1E" class="hidden-field">Campo Obligatorio</small>
      </div>
      <div id="apellido2D" class="large-6 columns">
          <span data-tooltip class="has-tip tip-top" title="Opcional: Ingrese el Segundo Apellido <br> Ej: Palacio">
          <label id="apellido2L">
              <span class="radius secondary label">? </span>
               
          Segundo Apellido
          </label>
          </span>
        <input name="apellido2" id="apellido2" type="text" placeholder="Indique..." value="<?php echo $apellido2; ?>" disabled="disabled">
        <small id="apellido2E" class="hidden-field">Campo Obligatorio</small>
      </div>
    </div>
    
    
    
   
    </div>
      <input type="hidden" name="id" value="<?php echo $id; ?>" />
<button name="acciones" value="eCuenta" class="button radius alert right">Eliminar Cuenta</button> 
  
<?php
formularioF();
footer();
	}else{
		echo '<html><head><meta http-equiv="REFRESH" content="0; url=cerrarSesion.php"></head></html>';
		}
}else {
	echo '<html><head><meta http-equiv="REFRESH" content="0; url=cerrarSesion.php"></head></html>';
	}
?>


  
  
