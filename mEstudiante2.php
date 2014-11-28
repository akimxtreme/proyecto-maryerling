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
// Consultando el Estudiante

$sql = 'SELECT * FROM estudiante WHERE id='. $_POST["id"];
			$query = mysql_query($sql,$conexion);
			$cont=mysql_num_rows($query);
			while ($row = mysql_fetch_array($query)){
					$id =$row['id'];
					$nombre1 = $row['nombre1'];
					$nombre2 = $row['nombre2'];
					$apellido1 = $row['apellido1'];
					$apellido2 = $row['apellido2'];
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
					
			}
		mysql_close();


//slideShow();
   formularioI("Modificar Estudiante", "aEstudiante();","funciones/bd_acciones.php","10");
   ?>
   <h6><small class="rojo right">( * ) Campo Obligatorio</small></h6>
   
    <div class="row">
      <div id="nombre1D" class="large-6 columns">
          <span data-tooltip class="has-tip tip-top" title="Ingrese el Primer Nombre <br>Ej: José">
          <label id="nombre1L">
              <span class="radius secondary label">? </span>
              <strong class="rojo"> * </strong> 
          Primer Nombre
          </label>
          </span>
        <input name="nombre1" id="nombre1" type="text" placeholder="Indique..." value="<?php echo $nombre1;  ?>">
        <small id="nombre1E" class="hidden-field">Campo Obligatorio</small>
      </div>
      <div id="nombre2D" class="large-6 columns">
          <span data-tooltip class="has-tip tip-top" title="Opcional: Ingrese el Segundo Nombre <br> Ej: Felix">
          <label id="nombre2L">
              <span class="radius secondary label">? </span>
               
          Segundo Nombre
          </label>
          </span>
        <input name="nombre2" id="nombre2" type="text" placeholder="Indique..." value="<?php echo $nombre2;  ?>">
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
        <input name="apellido1" id="apellido1" type="text" placeholder="Indique..." value="<?php echo $apellido1;  ?>">
        <small id="apellido1E" class="hidden-field">Campo Obligatorio</small>
      </div>
      <div id="apellido2D" class="large-6 columns">
          <span data-tooltip class="has-tip tip-top" title="Opcional: Ingrese el Segundo Apellido <br> Ej: Palacio">
          <label id="apellido2L">
              <span class="radius secondary label">? </span>
               
          Segundo Apellido
          </label>
          </span>
        <input name="apellido2" id="apellido2" type="text" placeholder="Indique..." value="<?php echo $apellido2;  ?>">
        <small id="apellido2E" class="hidden-field">Campo Obligatorio</small>
      </div>
    </div>
    
    <div class="row">   
      <div id="cedulaD" class="large-6 columns">
          <span data-tooltip class="has-tip tip-top" title="Ingrese la Nacionalidad y la Cédula de Identidad <br>Ej: Nacionalidad = V <br> Cedula = 20977033">
          <label id="cedulaL">
              <span class="radius secondary label">? </span>
              <strong class="rojo"> * </strong> 
          Cédula de Identidad
          </label>
          </span>
        <div class="row">
        	<div class="large-2 columns">
        		<select name="nacionalidad" id="nacionalidad" class="large-12">
                	
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
            <div class="large-10 columns">
        		<input name="cedula" id="cedula" type="text" placeholder="Indique..." onkeypress="return solonumeros(event);" maxlength="9" value="<?php echo $cedula;  ?>">
                <small id="cedulaE" class="hidden-field">Campo Obligatorio</small>
        	</div>
            
        </div>
        
      </div>
      <div id="sexoD" class="large-6 columns">
          <span data-tooltip class="has-tip tip-top" title="Seleccione el Tipo de Sexo <br> Ej: Masculino">
          <label id="sexoL">
              <span class="radius secondary label">? </span>
              <strong class="rojo"> * </strong>
          Sexo
          </label>
          </span>
          <select name="sexo" id="sexo" class="large-12">
          	
            <?php 
			if($cod_sexo==1){
						echo "<option value='$cod_sexo'>Femenino</option>";
						}else{
							echo "<option value='$cod_sexo'>Masculino</option>";
							}
					
					$sql = "SELECT id,sexo FROM sexo ORDER BY sexo";
					$query = mysql_query($sql,$conexion);
						while ($row = mysql_fetch_array($query)){
							$cod_sexo = $row[0];
							$sexo = $row[1];
							echo '<option value="'. $cod_sexo .'">'. $sexo .'</option>';
						}
					?>
          </select>
       
        <small id="sexoE" class="hidden-field">Campo Obligatorio</small>
      </div>
    </div>
    
    <div class="row">
      <div id="" class="large-6 columns">
          <span data-tooltip class="has-tip tip-top" title="Ingrese la Fecha de Nacimiento <br>Ej: Año 2013<br>Mes 10<br>Día 10">
          <label id="fecha_nacimiento">
              <span class="radius secondary label">? </span>
              <strong class="rojo"> * </strong> 
          Fecha de Nacimiento
          </label>
          </span>

		 <div id="anioD" class="large-4 columns">
         <select name="anio" id="anio" class="large-12">
          	<option><?php echo substr($fecha_nacimiento, 0, 4); ?></option>
            <?php 
			for($i=date('Y');$i>=1900;$i--){
				echo '<option>'. $i .'</option>';
				}
			?>
          </select>
        
        <small id="anioE" class="hidden-field">Obligatorio</small>
        </div>
        
        <div id="mesD" class="large-4 columns">
         <select name="mes" id="mes" class="large-12">
         	<option><?php echo substr($fecha_nacimiento, 5, 2); ?></option>
          	
            <?php 
			for($i=12;$i>=1;$i--){
				echo '<option>'. $i .'</option>';
				}
			?>
          </select>
        
        <small id="mesE" class="hidden-field">Obligatorio</small>
        </div>
        
        <div id="diaD" class="large-4 columns">
         <select name="dia" id="dia" class="large-10">
          	<option><?php echo substr($fecha_nacimiento, 8, 2); ?></option>
            <?php 
			for($i=31;$i>=1;$i--){
				echo '<option>'. $i .'</option>';
				}
			?>
          </select>
        
        <small id="diaE" class="hidden-field">Obligatorio</small>
        </div>
        
      </div>
      <div id="telefonoD" class="large-6 columns">
          <span data-tooltip class="has-tip tip-top" title="Opcional: Ingrese el Número Telefónico <br> Ej: 02122191615">
          <label id="telefonoL">
              <span class="radius secondary label">? </span>
              <strong class="rojo"> * </strong>
          Número Telefónico
          </label>
          </span>
        <input name="telefono" id="telefono" type="text" placeholder="Indique..." onkeypress="return solonumeros(event);" maxlength="11" value="<?php echo $telefono;  ?>">
        <small id="telefonoE" class="hidden-field">Campo Obligatorio</small>
      </div>
   </div>
   
   <div class="row">
      <div id="colegioD" class="large-12 columns">
          <span data-tooltip class="has-tip tip-top" title="Seleccione el Colegio de donde egresó el Estudiante <br>Ej: U.E José Felix Ribas">
          <label id="colegioL">
              <span class="radius secondary label">? </span>
              <strong class="rojo"> * </strong> 
          Colegio de donde Egresó el Estudiante
          </label>
          </span>
       	<select name="colegio" id="colegio" class="large-12">
          	
            <?php 
					// Consultando el colegio del Estudiante
					$sql = "SELECT id,colegio FROM colegio WHERE id=$cod_colegio";
					$query = mysql_query($sql,$conexion);
						while ($row = mysql_fetch_array($query)){
							$cod_colegio = $row[0];
							$colegio = $row[1];
							echo '<option value="'. $cod_colegio .'">'. $colegio .'</option>';
						}
					// Consultando todos los colegios
					$sql = "SELECT id,colegio FROM colegio ORDER BY colegio";
					$query = mysql_query($sql,$conexion);
						while ($row = mysql_fetch_array($query)){
							$cod_colegio = $row[0];
							$colegio = $row[1];
							echo '<option value="'. $cod_colegio .'">'. $colegio .'</option>';
						}
					?>
          </select>
        <small id="colegioE" class="hidden-field">Campo Obligatorio</small>
      </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $id ?>" />
      
<button name="acciones" value="mEstudiante" class="button radius alert right">Modificar Estudiante</button> 
  
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


  
  
