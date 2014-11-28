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

formularioI("Búscar Estudiante por:", "buscarE();","","10");
?>
<div class="row">
        	<div class="large-4 columns">
        		<select name="buscar" id="buscar" class="large-12">
            		<option value="cedula">Cédula</option>
          		</select>
            </div>
            <div class="large-2 columns">
        		<select name="nacionalidad" id="nacionalidad" class="large-12">
            		<?php 
					
					$sql = "SELECT id,detalles FROM nacionalidad ORDER BY nacionalidad DESC";
					$query = mysql_query($sql,$conexion);
						while ($row = mysql_fetch_array($query)){
							$cod_nacionalidad = $row[0];
							$detalles = $row[1];
							echo '<option value="'. $cod_nacionalidad .'">'. $detalles .'</option>';
						}
					?>
          		</select>
            </div>
            <div class="large-6 columns">
        		<input name="cedula" id="cedula" type="text" placeholder="Indique..." onkeypress="return solonumeros(event);" maxlength="9">
                <small id="cedulaE" class="hidden-field">Campo Obligatorio</small>
        	</div>
            
        </div>
        <button name="acciones" value="buscarE" class="button radius alert right">Buscar Estudiante</button>
<?php
formularioF();
 if(isset($_POST['acciones'])){
		echo '
			<table>
			  <thead>
				<tr>
				  <th width="150">Nombre Completo</th>
				  <th width="50">Cédula</th>
				  <th width="50">Sexo</th>
				  <th width="100">Fecha Nacimiento</th>
				  <th width="100">Teléfono</th>
				  <th width="400">Colegio</th>
				  <th width="50">Acción</th>
				</tr>
			  </thead>
			  <tbody>
		';
		
		// Consultando el Estudiante
$sql = 'SELECT * FROM estudiante WHERE serial="" AND cedula='. $_POST["cedula"] . ' AND nacionalidad='. $_POST['nacionalidad'];
			$query = mysql_query($sql,$conexion);
			$cont=mysql_num_rows($query);
			while ($row = mysql_fetch_array($query)){
					$id =$row['id'];
					$nombre_completo = $row['nombre1'] . " " . $row['nombre2'] . ", " . $row['apellido1'] . " " . $row['apellido2'];
					$cod_nacionalidad = $row['nacionalidad'];
					$cedula = $row['cedula'];
					$cod_sexo = $row['sexo'];
					$fecha_nacimiento = $row['fecha_nacimiento'];
					$telefono = $row['telefono'];
					$cod_colegio = $row['colegio'];
					
					// Consultando la Nacionalidad
					$sql1 = "SELECT nacionalidad FROM nacionalidad WHERE id='$cod_nacionalidad'";
					$query1 = mysql_query($sql1,$conexion);
					while ($row1 = mysql_fetch_array($query1)){
						$sigla_nacionalidad = $row1[0];
					}
					// Consultando el Sexo
					$sql2 = "SELECT sexo FROM sexo WHERE id='$cod_sexo'";
					$query2 = mysql_query($sql2,$conexion);
					while ($row2 = mysql_fetch_array($query2)){
						$sexo = $row2[0];
					}
					// Consultando el Colegio
					$sql3 = "SELECT colegio FROM colegio WHERE id='$cod_colegio'";
					$query3 = mysql_query($sql3,$conexion);
					while ($row3 = mysql_fetch_array($query3)){
						$colegio = $row3[0];
					}
					echo '<tr>
							  <td>'. $nombre_completo .'</td>
							  <td>'. $sigla_nacionalidad . $cedula .'</td>
							  <td>'. $sexo .'</td>
							  <td>'. $fecha_nacimiento .'</td>
							  <td>'. $telefono .'</td>
							  <td>'. $colegio .'</td>
							  <td><form action="aSerial2.php" method="post"><input type="hidden" name="id" value="'. $id .'" /><button class="button" name="acciones" value="aSerial">Serial</button></form></td>
						</tr>
							';
			}
		mysql_close();
		echo '
			  </tbody>
		</table>
		';
	 
	 }else{
?>

<table>
  <thead>
    <tr>
      <th width="150">Nombre Completo</th>
      <th width="50">Cédula</th>
      <th width="50">Sexo</th>
      <th width="100">Fecha Nacimiento</th>
      <th width="100">Teléfono</th>
      <th width="400">Colegio</th>
      <th width="50">Acción</th>
    </tr>
  </thead>
  <tbody>

<?php
// Consultando el Estudiante
$sql = "SELECT * FROM estudiante WHERE serial='' ORDER BY nombre1";
			$query = mysql_query($sql,$conexion);
			$cont=mysql_num_rows($query);
			while ($row = mysql_fetch_array($query)){
					$id =$row['id'];
					$nombre_completo = $row['nombre1'] . " " . $row['nombre2'] . ", " . $row['apellido1'] . " " . $row['apellido2'];
					$cod_nacionalidad = $row['nacionalidad'];
					$cedula = $row['cedula'];
					$cod_sexo = $row['sexo'];
					$fecha_nacimiento = $row['fecha_nacimiento'];
					$telefono = $row['telefono'];
					$cod_colegio = $row['colegio'];
					
					// Consultando la Nacionalidad
					$sql1 = "SELECT nacionalidad FROM nacionalidad WHERE id='$cod_nacionalidad'";
					$query1 = mysql_query($sql1,$conexion);
					while ($row1 = mysql_fetch_array($query1)){
						$sigla_nacionalidad = $row1[0];
					}
					// Consultando el Sexo
					$sql2 = "SELECT sexo FROM sexo WHERE id='$cod_sexo'";
					$query2 = mysql_query($sql2,$conexion);
					while ($row2 = mysql_fetch_array($query2)){
						$sexo = $row2[0];
					}
					// Consultando el Colegio
					$sql3 = "SELECT colegio FROM colegio WHERE id='$cod_colegio'";
					$query3 = mysql_query($sql3,$conexion);
					while ($row3 = mysql_fetch_array($query3)){
						$colegio = $row3[0];
					}
					echo '<tr>
							  <td>'. $nombre_completo .'</td>
							  <td>'. $sigla_nacionalidad . $cedula .'</td>
							  <td>'. $sexo .'</td>
							  <td>'. $fecha_nacimiento .'</td>
							  <td>'. $telefono .'</td>
							  <td>'. $colegio .'</td>
							  <td><form action="aSerial2.php" method="post"><input type="hidden" name="id" value="'. $id .'" /><button class="button" name="acciones" value="aSerial">Serial</button></form></td>
						</tr>
							';
			}
		

			mysql_close();


?>


    
  </tbody>
</table>
<?php
	 }// fin del isset($acciones)
?>

<?php
footer();
	}else{
		echo '<html><head><meta http-equiv="REFRESH" content="0; url=cerrarSesion.php"></head></html>';
		}
}else {
	echo '<html><head><meta http-equiv="REFRESH" content="0; url=cerrarSesion.php"></head></html>';
	}
?>


  
  
