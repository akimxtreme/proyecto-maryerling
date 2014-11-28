/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//Funcion Javascript para Validar solo Números en un campo Input...
 function solonumeros(evt)
      {
		var keyPressed = (evt.which) ? evt.which : event.keyCode
        return !(keyPressed > 31 && (keyPressed < 48 || keyPressed > 57));
      }
//Funcion Javascript para Validar solo Números en un campo Input...
 function solonumeros(evt)
      {
		var keyPressed = (evt.which) ? evt.which : event.keyCode
        return !(keyPressed > 31 && (keyPressed < 48 || keyPressed > 57));
      }
// Funcion Javascript para Validar solo Letras en un Campo Input
function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = [8,37,39,46];

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
	  
function acceso(){
    var validado = true;
    
    function valida(campo){
        var valida = document.getElementById(campo);
        var campoE = campo + "E";
        var campoL = campo + "L";
        var cmall = document.getElementById(campoE);
        var label = document.getElementById(campoL);
        
        if(valida.value==""){
            validado = false;
            valida.className="error";
            label.className="error";
            cmall.className="error";
            
        }else{
            
            valida.className="";
            label.className="";
            cmall.className="hidden-field";
        }
    }
    
    valida('usuario');
    valida('contrasenia');
    
    
    return validado;
}


function aEstudiante(){
    var validado = true;
    
    function valida(campo){
        var valida = document.getElementById(campo);
        var campoE = campo + "E";
        var campoL = campo + "L";
        var cmall = document.getElementById(campoE);
        var label = document.getElementById(campoL);
        
        if(valida.value=="" || valida.value=="Seleccione..." || valida.value=="aa" || valida.value=="mm" || valida.value=="dd" ){
			if(!document.getElementsByTagName("SELECT")){
            valida.className="error";
			}
			if(campo=='dia' || campo=='mes' || campo=='anio'){
				document.getElementById('fecha_nacimiento').className="error";
				}else{
					label.className="error";
				}
            cmall.className="error";
			validado = false;
		}else{
            if(!document.getElementsByTagName("SELECT")){
            valida.className="";
			}
            if(campo =='dia' || campo=='mes' || campo=='anio'){
				document.getElementById('fecha_nacimiento').className="";
				}else{
					label.className="";
				}
            cmall.className="hidden-field";
        }
    }
    
    valida('nombre1');
	valida('apellido1');
    valida('cedula');
	valida('sexo');
	//valida('fecha_nacimiento');
	valida('telefono');
	valida('anio');
	valida('mes');
	valida('dia');
	
	valida('colegio');
	
    
    
    return validado;
}

function buscarE(){
	var validado = true;
    
    function valida(campo){
        var valida = document.getElementById(campo);
        var campoE = campo + "E";
        var campoL = campo + "L";
        var cmall = document.getElementById(campoE);
        
        
        if(valida.value==""){
            validado = false;
            valida.className="error";
            
            cmall.className="error";
            
        }else{
            
            valida.className="";
            
            cmall.className="hidden-field";
        }
    }
    
    valida('cedula');
       
    return validado;
}

// Validacion Buscar Cuenta
function buscarC(){
	var validado = true;
    
    function valida(campo){
        var valida = document.getElementById(campo);
        var campoE = campo + "E";
        var campoL = campo + "L";
        var cmall = document.getElementById(campoE);
        
        
        if(valida.value==""){
            validado = false;
            valida.className="error";
            
            cmall.className="error";
            
        }else{
            
            valida.className="";
            
            cmall.className="hidden-field";
        }
    }
    
    valida('usuario');
       
    return validado;
}

// Agregar Cuenta de Usuario
function aCuenta(){
    var validado = true;
    
    function valida(campo){
        var valida = document.getElementById(campo);
        var campoE = campo + "E";
        var campoL = campo + "L";
        var cmall = document.getElementById(campoE);
        var label = document.getElementById(campoL);
        
        if(valida.value=="" || valida.value=="Seleccione..." || valida.value=="aa" || valida.value=="mm" || valida.value=="dd" ){
			if(!document.getElementsByTagName("SELECT")){
            valida.className="error";
			}
			if(campo=='dia' || campo=='mes' || campo=='anio'){
				document.getElementById('fecha_nacimiento').className="error";
				}else{
					label.className="error";
				}
            cmall.className="error";
			validado = false;
		}else{
            if(!document.getElementsByTagName("SELECT")){
            valida.className="";
			}
            if(campo =='dia' || campo=='mes' || campo=='anio'){
				document.getElementById('fecha_nacimiento').className="";
				}else{
					label.className="";
				}
            cmall.className="hidden-field";
        }
    }
    
    valida('nombre1');
	valida('apellido1');
    valida('cedula');
	valida('usuario');
	
	
    
    
    return validado;
}
// Validando el campo Serial 
function aSerial(){
	var validado = true;

    
    function valida(campo){
        var valida = document.getElementById(campo)
        var campoE = campo + "E";
        var campoL = campo + "L";
        var cmall = document.getElementById(campoE);
                
        if(valida.value=="" || valida.value.length==1){
            validado = false;
            valida.className="error";
            cmall.className="error";
            
        }else{
            valida.className="";
            cmall.className="hidden-field";
        }	
    }
    
    valida('serial1');
	valida('serial2');
	
       
    return validado;
}

function confCuenta(){
	var validado = true;
	var contrasenia1 = document.getElementById('contrasenia1');
	var contrasenia2 = document.getElementById('contrasenia2');
	function valida(campo){
        var valida = document.getElementById(campo)
        var campoE = campo + "E";
        var campoL = campo + "L";
        var cmall = document.getElementById(campoE);
		
		if(valida.value==""){
            validado = false;
            valida.className="error";
            cmall.className="error";
            
        }else{
            valida.className="";
            cmall.className="hidden-field";
        }
	}
	
	valida('contrasenia1');
	valida('contrasenia2');
	

       
    return validado;
}
