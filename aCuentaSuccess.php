<?php
session_start();
// Variables de sesión
if(isset($_SESSION['nombre_usuario']) && isset($_SESSION['privilegio']) && isset($_GET['agregado'])){
	$nombre_usuario =$_SESSION['nombre_usuario'];
	$privilegio = $_SESSION['privilegio'];
	$codigo_id = $_SESSION['id'];
	$agregado = $_GET['agregado'];
	$cod_nac = $_GET['nac'];
	$url = $_GET['url'];
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
$sql = "SELECT * FROM usuario WHERE usuario='$agregado'";
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


?>
<div data-alert class="alert-box success">
  <!-- Your content goes here -->
  Acción Realizada de Manera Exitosa
  <a href="#" class="close">&times;</a>
</div>   
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
// Cambia la Ruta de la variable $url dependiendo de la Acción
echo '<a href="'. $url .'Cuenta.php" class="button secondary">Volver &raquo;</a>';
footer();
	}else{
		echo '<html><head><meta http-equiv="REFRESH" content="0; url=cerrarSesion.php"></head></html>';
		}
}else {
	echo '<html><head><meta http-equiv="REFRESH" content="0; url=cerrarSesion.php"></head></html>';
	}
?>


  
  
