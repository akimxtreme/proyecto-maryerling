<?php
session_start();
// Variables de sesión
if(isset($_SESSION['nombre_usuario']) && isset($_SESSION['privilegio'])){
	$nombre_usuario =$_SESSION['nombre_usuario'];
	$privilegio = $_SESSION['privilegio'];
	$codigo_id = $_SESSION['id'];
	
	if($privilegio==777 || $privilegio==1){
	
include_once('funciones/template.php');
include_once ('funciones/formulario.php');
include_once('funciones/conexion.php');
doctype("Fundación Misión Ribas del Estado Miranda");
bannerSistema();
echo '<hr><h5 class="right"><small>Bienvenido(a): '. $nombre_usuario .'</small></h5>';
menuSistema();
//slideShow();
// Consultando el Estudiante
$sql = "SELECT * FROM usuario WHERE id='$codigo_id'";
			$query = mysql_query($sql,$conexion);
			$cont=mysql_num_rows($query);
			while ($row = mysql_fetch_array($query)){
					$nombre_completo = $row['nombre1'] . " " . $row['nombre2'] . ", " . $row['apellido1'] . " " . $row['apellido2'];
					$cod_nacionalidad = $row['nacionalidad'];
					$cedula = $row['cedula'];
					$usuario = $row['usuario'];
					$cod_privilegio = $row['privilegio'];
			}
// Consultando la Nacionalidad
$sql1 = "SELECT nacionalidad FROM nacionalidad WHERE id='$cod_nacionalidad'";
			$query1 = mysql_query($sql1,$conexion);
			while ($row1 = mysql_fetch_array($query1)){
				$sigla_nacionalidad = $row1[0];
			}
// Consultando el Privilegio
$sql2 = "SELECT privilegio FROM privilegio WHERE id='$cod_privilegio'";
			$query2 = mysql_query($sql2,$conexion);
			while ($row2 = mysql_fetch_array($query2)){
				$privilegio = $row2[0];
			}
			mysql_close();

echo '<hr><h3 class="verde">Configuración de la Cuenta</h3>';
?>
   
<table>
  <thead>
    <tr>
      <th width="100">Usuario</th>
      <th width="550">Nombre Completo</th>
      <th width="150">Cédula</th>
      <th width="150">Privilegio</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $usuario ?></td>
      <td><?php echo $nombre_completo ?></td>
      <td><?php echo $sigla_nacionalidad . $cedula ?></td>
      <td><?php echo $privilegio ?></td>
    </tr>
  </tbody>
</table>


<?php
formularioI("Cambiar Contraseña", "confCuenta();","funciones/bd_acciones.php","10");
?>

<h6><small class="rojo right">( * ) Campo Obligatorio</small></h6>
   <div class="row">
    <div id="contrasenia1D" class="large-6 columns">
              <span data-tooltip class="has-tip tip-top" title="Ingrese la Contraseña Actual">
              <label id="contrasenia1L">
                  <span class="radius secondary label">? </span>
                   <strong class="rojo"> * </strong>
              Contraseña Actual
              </label>
              </span>
            <input name="contrasenia1" id="contrasenia1" type="password" placeholder="Indique...">
            <small id="contrasenia1E" class="hidden-field">Campo Obligatorio</small>
     </div>
     
     <div id="contrasenia2D" class="large-6 columns">
              <span data-tooltip class="has-tip tip-top" title="Ingrese la Nueva Contraseña">
              <label id="contrasenia2L">
                  <span class="radius secondary label">? </span>
                   <strong class="rojo"> * </strong>
              Nueva Contraseña
              </label>
              </span>
            <input name="contrasenia2" id="contrasenia2" type="password" placeholder="Indique...">
            <small id="contrasenia2E" class="hidden-field">Campo Obligatorio</small>
     </div>      
      
            
        
        
      
      
      
    </div>
    <input type="hidden" name="id" value="<?php echo $codigo_id; ?>" />
    
<button name="acciones" value="confCuenta" class="button radius success right">Cambiar Contraseña</button>

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


  
  
