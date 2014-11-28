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
$sql = "SELECT * FROM estudiante WHERE cedula='$agregado' AND nacionalidad=$cod_nac";
			$query = mysql_query($sql,$conexion);
			$cont=mysql_num_rows($query);
			while ($row = mysql_fetch_array($query)){
					$nombre_completo = $row['nombre1'] . " " . $row['nombre2'] . ", " . $row['apellido1'] . " " . $row['apellido2'];
					$cod_nacionalidad = $row['nacionalidad'];
					$cedula = $row['cedula'];
					$cod_sexo = $row['sexo'];
					$fecha_nacimiento = $row['fecha_nacimiento'];
					$telefono = $row['telefono'];
					$cod_colegio = $row['colegio'];
			}
// Consultando la Nacionalidad
$sql = "SELECT nacionalidad FROM nacionalidad WHERE id='$cod_nacionalidad'";
			$query = mysql_query($sql,$conexion);
			$cont=mysql_num_rows($query);
			while ($row = mysql_fetch_array($query)){
				$sigla_nacionalidad = $row[0];
			}
// Consultando el Sexo
$sql = "SELECT sexo FROM sexo WHERE id='$cod_sexo'";
			$query = mysql_query($sql,$conexion);
			$cont=mysql_num_rows($query);
			while ($row = mysql_fetch_array($query)){
				$sexo = $row[0];
			}
// Consultando el Colegio
$sql = "SELECT colegio FROM colegio WHERE id='$cod_colegio'";
			$query = mysql_query($sql,$conexion);
			$cont=mysql_num_rows($query);
			while ($row = mysql_fetch_array($query)){
				$colegio = $row[0];
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
      <th width="150">Nombre Completo</th>
      <th width="50">Cédula</th>
      <th width="50">Sexo</th>
      <th width="100">Fecha Nacimiento</th>
      <th width="100">Teléfono</th>
      <th width="400">Colegio</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $nombre_completo ?></td>
      <td><?php echo $sigla_nacionalidad . $cedula ?></td>
      <td><?php echo $sexo ?></td>
      <td><?php echo $fecha_nacimiento ?></td>
      <td><?php echo $telefono ?></td>
      <td><?php echo $colegio ?></td>
    </tr>
  </tbody>
</table>


<?php
// Cambia la Ruta de la variable $url dependiendo de la Acción
echo '<a href="'. $url .'Estudiante.php" class="button secondary">Volver &raquo;</a>';
footer();
	}else{
		echo '<html><head><meta http-equiv="REFRESH" content="0; url=cerrarSesion.php"></head></html>';
		}
}else {
	echo '<html><head><meta http-equiv="REFRESH" content="0; url=cerrarSesion.php"></head></html>';
	}
?>


  
  
