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

formularioI("Búscar Cuenta por:", "buscarC();","","10");
?>
<div class="row">
        	<div class="large-4 columns">
        		<select name="buscar" id="buscar" class="large-12">
            		<option value="usuario">Nombre de Usuario</option>
          		</select>
            </div>
            
            <div class="large-8 columns">
        		<input name="usuario" id="usuario" type="text" placeholder="Indique..." maxlength="15">
                <small id="usuarioE" class="hidden-field">Campo Obligatorio</small>
        	</div>
            
        </div>
        <button name="acciones" value="buscarC" class="button radius alert right">Buscar Cuenta de Usuario</button>
<?php
formularioF();
 if(isset($_POST['acciones'])){
		echo '
			<table>
			  <thead>
				<tr>
				  <th width="100">Usuario</th>
				  <th width="450">Nombre Completo</th>
				  <th width="150">Cédula</th>
				  <th width="150">Privilegio</th>
				  <th width="100">Acción</th>
				</tr>
			  </thead>
			  <tbody>
		';
		
		// Consultando el Estudiante
$sql = 'SELECT * FROM usuario WHERE usuario="'. $_POST["usuario"]. '" AND id<>'.$codigo_id;
			$query = mysql_query($sql,$conexion);
			while ($row = mysql_fetch_array($query)){
					$id = $row['id'];
					$nombre_completo = $row['nombre1'] . " " . $row['nombre2'] . ", " . $row['apellido1'] . " " . $row['apellido2'];
					$cod_nacionalidad = $row['nacionalidad'];
					$cedula = $row['cedula'];
					$usuario = $row['usuario'];
					$cod_privilegio = $row['privilegio'];
					
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
					
					echo '<tr>
							  <td>'. $usuario .'</td>
							  <td>'. $nombre_completo .'</td>
							  <td>'. $sigla_nacionalidad . $cedula .'</td>
							  <td>'. $privilegio .'</td>
							  <td><form action="aCuentaSuccess.php" method="get"><input type="hidden" name="agregado" value="'. $usuario .'" /><input type="hidden" name="nac" value="'. $cod_nacionalidad .'" /><button class="button success secondary" name="url" value="c">Consultar</button></form></td>
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
      	<th width="100">Usuario</th>
		<th width="450">Nombre Completo</th>
		<th width="150">Cédula</th>
		<th width="150">Privilegio</th>
		<th width="100">Acción</th>
    </tr>
  </thead>
  <tbody>

<?php
// Consultando el Estudiante
$sql = 'SELECT * FROM usuario WHERE id<>'. $codigo_id .' ORDER BY usuario';
			$query = mysql_query($sql,$conexion);
			$cont=mysql_num_rows($query);
			while ($row = mysql_fetch_array($query)){
					$id = $row['id'];
					$nombre_completo = $row['nombre1'] . " " . $row['nombre2'] . ", " . $row['apellido1'] . " " . $row['apellido2'];
					$cod_nacionalidad = $row['nacionalidad'];
					$cedula = $row['cedula'];
					$usuario = $row['usuario'];
					$cod_privilegio = $row['privilegio'];
					
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
					
					echo '<tr>
							  <td>'. $usuario .'</td>
							  <td>'. $nombre_completo .'</td>
							  <td>'. $sigla_nacionalidad . $cedula .'</td>
							  <td>'. $privilegio .'</td>
							  <td><form action="aCuentaSuccess.php" method="get"><input type="hidden" name="agregado" value="'. $usuario .'" /><input type="hidden" name="nac" value="'. $cod_nacionalidad .'" /><button class="button success secondary" name="url" value="c">Consultar</button></form></td>
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


  
  
