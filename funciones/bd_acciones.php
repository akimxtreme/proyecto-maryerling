<?php
session_start();
include_once("conexion.php");
// Función para enviar mensajes en Javascript mendiante un alert();
function alertas($mensaje){
	if($mensaje!=""){
	echo "<script language='JavaScript'>";
	echo "alert('".$mensaje."')";
    echo "</script>";
	}
}
function redireccion($ruta){
	if($ruta!=""){
		echo '<html><head><meta http-equiv="REFRESH" content="0; url='. $ruta .'"></head></html>';
		}
	}
/*
Variable para todas las acciones del sistema
*/
if(isset($_POST['acciones'])){
	$acciones = $_POST['acciones'];
	switch($acciones){
		case 'acceder':
			
			$usuario = $_POST['usuario'];
				//
				$usuario = strtoupper ($usuario);
			$contrasenia = $_POST['contrasenia'];
				// transformando la contrasenia en md5
				$contrasenia = md5 ($contrasenia);
			//validando accesos
			$sql = "SELECT usuario,contrasenia,nombre1,nombre2,apellido1,apellido2,privilegio,id FROM usuario WHERE usuario='$usuario' AND contrasenia='$contrasenia'";
			$query = mysql_query($sql,$conexion);
			$cont=mysql_num_rows($query);
			if($cont>=1){
				while ($row = mysql_fetch_array($query)){
					$codigo_id = $row['id'];
					$privilegio = $row['privilegio'];
					$nombre_usuario = $row[2] . " " . $row[3] . ", " . $row[4] . " " . $row[5];
						$_SESSION['privilegio']= $privilegio;
						$_SESSION['nombre_usuario']= $nombre_usuario ;
						$_SESSION['id']= $codigo_id;
						redireccion('../modulos.php');
						mysql_close();
				}
			}else{
				alertas("Usuario y/o Clave Incorrecta");
				redireccion('../principal.php');
				}
		break;
		
		case 'aEstudiante':
		
			$sql = "SELECT cedula,nacionalidad FROM estudiante WHERE cedula='". $_POST['cedula'] . "' AND nacionalidad=". $_POST['nacionalidad'];
			$query = mysql_query($sql,$conexion);
			$cont=mysql_num_rows($query);
			if($cont>=1){
				alertas("El Estudiante ya Existe, Intente Agregar Otro");
				redireccion('../aEstudiante.php');
			}else{
				$sql ="INSERT INTO estudiante (
												nombre1,
												nombre2,
												apellido1,
												apellido2,
												nacionalidad,
												cedula,
												sexo,
												fecha_nacimiento,
												telefono,
												colegio
											   ) VALUES
											   (
											   	'". $_POST['nombre1'] ."',
												'". $_POST['nombre2'] ."',
												'". $_POST['apellido1'] ."',
												'". $_POST['apellido2'] ."',
												'". $_POST['nacionalidad'] ."',
												'". $_POST['cedula'] ."',
												'". $_POST['sexo'] ."',
												'". $_POST['anio'] .'-'. $_POST['mes'].'-'.$_POST['dia'] ."',
												'". $_POST['telefono'] ."',
												'". $_POST['colegio'] ."'
											   )";
				$query = mysql_query($sql,$conexion);
				mysql_close();
				$cedula = $_POST['cedula'];
				$cod_nac = $_POST['nacionalidad'];
				redireccion("../aEstudianteSuccess.php?agregado=$cedula&nac=$cod_nac&url=a");
				}
		
		
		break;
		case 'mEstudiante':
			$sql = "SELECT cedula,nacionalidad FROM estudiante WHERE cedula='". $_POST['cedula'] . "' AND nacionalidad=". $_POST['nacionalidad']." AND id<>". $_POST['id'];
			$query = mysql_query($sql,$conexion);
			$cont=mysql_num_rows($query);
			if($cont>=1){
				alertas("El Estudiante ya Existe, Intente Agregar Otro");
				redireccion('../mEstudiante.php');
			}else{
				$sql = "UPDATE estudiante SET 
												nombre1='".$_POST['nombre1']."',
												nombre2='".$_POST['nombre2']."',
												apellido1='".$_POST['apellido1']."',
												apellido2='".$_POST['apellido2']."',
												nacionalidad=".$_POST['nacionalidad'].",
												cedula=".$_POST['cedula'].",
												sexo=".$_POST['sexo'].",
												fecha_nacimiento='".$_POST['anio']."-".$_POST['mes']."-".$_POST['dia']."',
												telefono='".$_POST['telefono']."',
												colegio=".$_POST['colegio']."
									 WHERE
												id=".$_POST['id'];
				$query = mysql_query($sql,$conexion);
				mysql_close();
				$cedula = $_POST['cedula'];
				$cod_nac = $_POST['nacionalidad'];
				redireccion("../aEstudianteSuccess.php?agregado=$cedula&nac=$cod_nac&url=m");
				}
		
		
		break;
		case 'eEstudiante':
				
				$sql = "DELETE FROM estudiante WHERE id=".$_POST['id'];
				$query = mysql_query($sql,$conexion);
				mysql_close();
				alertas("El Estudiante ha sido Eliminado");
				redireccion('../eEstudiante.php');	
		break;
		case 'aCuenta':
			$sql = "SELECT usuario FROM usuario WHERE usuario='". $_POST['usuario']."'";
			$query = mysql_query($sql,$conexion);
			$cont=mysql_num_rows($query);
			if($cont>=1){
				alertas("Ya existe un Usuario con ese Nombre Intente con Otro");
				redireccion('../aCuenta.php');
			}else{
				
				$sql ="INSERT INTO usuario (
												usuario,
												contrasenia,
												nombre1,
												nombre2,
												apellido1,
												apellido2,
												nacionalidad,
												cedula,
												privilegio
											   ) 
											   VALUES
											   (
											   	'". $_POST['usuario'] ."',
												'". md5 ($_POST['cedula'])."',
												'". $_POST['nombre1'] ."',
												'". $_POST['nombre2'] ."',
												'". $_POST['apellido1'] ."',
												'". $_POST['apellido2'] ."',
												'". $_POST['nacionalidad'] ."',
												'". $_POST['cedula'] ."',
												". 1 ."
											   )";
				$query = mysql_query($sql,$conexion);
				mysql_close();
				$usuario = $_POST['usuario'];
				$cod_nac = $_POST['nacionalidad'];
				redireccion("../aCuentaSuccess.php?agregado=$usuario&nac=$cod_nac&url=a");
				}
		break;
		case 'mCuenta':
			$sql = "SELECT usuario FROM usuario WHERE usuario='". $_POST['usuario'] . "' AND id<>". $_POST['id'];
			$query = mysql_query($sql,$conexion);
			$cont=mysql_num_rows($query);
			if($cont>=1){
				alertas("Ya existe un Usuario con ese Nombre Intente con Otro");
				redireccion('../mCuenta.php');
			}else{
				$sql = "UPDATE usuario SET 
												usuario='".$_POST['usuario']."',
												nombre1='".$_POST['nombre1']."',
												nombre2='".$_POST['nombre2']."',
												apellido1='".$_POST['apellido1']."',
												apellido2='".$_POST['apellido2']."',
												nacionalidad=".$_POST['nacionalidad'].",
												cedula=".$_POST['cedula']."
									   WHERE
												id=".$_POST['id'];
				$query = mysql_query($sql,$conexion);
				mysql_close();
				$usuario = $_POST['usuario'];
				$cod_nac = $_POST['nacionalidad'];
				redireccion("../aCuentaSuccess.php?agregado=$usuario&nac=$cod_nac&url=m");
				}
		break;
		case 'eCuenta':
				$sql = "DELETE FROM usuario WHERE id=".$_POST['id'];
				$query = mysql_query($sql,$conexion);
				mysql_close();
				alertas("El Usuario ha sido Eliminado");
				redireccion('../eCuenta.php');
		break;
		case 'aSerial':
			$serial = strtoupper ($_POST['serial1']) . $_POST['serial2'];
			$sql = "SELECT serial FROM estudiante WHERE serial='". $serial ."' AND id<>". $_POST['id'];
			$query = mysql_query($sql,$conexion);
			$cont=mysql_num_rows($query);
			if($cont>=1){
				alertas("Ya exite un Estudiante con ese Serial, Intente Agregar Otro Serial");
				redireccion('../aSerial.php');
			}else{
				$sql = "UPDATE estudiante SET 
												serial='".$serial."'
										  WHERE
												id=".$_POST['id'];
				$query = mysql_query($sql,$conexion);
				mysql_close();
				$cedula = $_POST['cedula_id'];
				$cod_nac = $_POST['nacionalidad_id'];
				redireccion("../aSerialSuccess.php?agregado=$cedula&nac=$cod_nac&url=a");
				}
		
		
		break;
		case 'mSerial':
			$serial = strtoupper ($_POST['serial1']) . $_POST['serial2'];
			$sql = "SELECT serial FROM estudiante WHERE serial='". $serial ."' AND id<>". $_POST['id'];
			$query = mysql_query($sql,$conexion);
			$cont=mysql_num_rows($query);
			if($cont>=1){
				alertas("Ya exite un Estudiante con ese Serial, Intente Agregar Otro Serial");
				redireccion('../aSerial.php');
			}else{
				$sql = "UPDATE estudiante SET 
												serial='".$serial."'
										  WHERE
												id=".$_POST['id'];
				$query = mysql_query($sql,$conexion);
				mysql_close();
				$cedula = $_POST['cedula_id'];
				$cod_nac = $_POST['nacionalidad_id'];
				redireccion("../aSerialSuccess.php?agregado=$cedula&nac=$cod_nac&url=m");
				}
		
		
		break;
		case 'confCuenta':
			
			$contrasenia1 = $_POST['contrasenia1'];
				// transformando la contrasenia en md5
				$contrasenia1 = md5 ($contrasenia1);
			
			$contrasenia2 = $_POST['contrasenia2'];
				// transformando la contrasenia en md5
				$contrasenia2 = md5 ($contrasenia2);
			
			//validando accesos
			$sql = "SELECT contrasenia FROM usuario WHERE id=". $_POST['id'] . " AND contrasenia='$contrasenia1'";
			$query = mysql_query($sql,$conexion);
			$cont=mysql_num_rows($query);
			if($cont>=1){
						$sql = "UPDATE usuario SET 
														contrasenia='".$contrasenia2."'
										 		  WHERE
														id=".$_POST['id'];
						$query = mysql_query($sql,$conexion);
						mysql_close();
						alertas("Clave Actualizada Exitosamente, debe Ingresar al Sistema con la Nueva Clave");
						redireccion('../cerrarSesion.php');
						
			}else{
				alertas("Clave Actual Incorrecta");
				redireccion('../confCuenta.php');
				}
		break;
		
		default:
		
		redireccion('../principal.php');
		}
}else{
	redireccion('../cerrarSesion.php');
	}

?>