
function enviarDatos(){    //Empieza a Validar los datos
		
		var errores = 0;
		var nombre = document.getElementById('nombre').value;
		var mail = document.getElementById('mail').value;
        var passactual = document.getElementById('passactual').value;
        var pass = document.getElementById('pass').value;
        var pass1 = document.getElementById('pass1').value;
		
		if (passactual=='' && pass=='' && pass1=='')
            {if(nombre=='')
                {errores = 1;
			     document.getElementById('nombre').style.borderColor="#ff0";
		        }
             if(mail=='')
                {errores = 1;
			     document.getElementById('mail').style.borderColor="#ff0";
		        }
            }
         else
            {
              if(passactual!='<?php echo $datosusuario['password']; ?>'){
                errores = 1;
			    document.getElementById('passactual').style.borderColor="#ff0";
                
              }else{
                 if(pass!=pass1 && pass!=''){
        			errores = 1;
        			document.getElementById('pass').style.borderColor="#ff0";
                    document.getElementById('pass1').style.borderColor="#ff0";
        		 }
              
              }  
              
              if(nombre==''){
    			errores = 1;
    			document.getElementById('nombre').style.borderColor="#ff0";
    		  }
              
              if(mail==''){
    			errores = 1;
    			document.getElementById('mail').style.borderColor="#ff0";
    		  }
        
                
            }
        		//Si no hay errores empieza a procesar los datos
		if(errores == 0){
			//Envìo de datos por ajax.
			var data = "nombre="+nombre+"&pass="+pass+"&mail="+mail+"&id=<?php echo $_SESSION['login']; ?>";
			$.ajax({
				url: "php/registro_gw.php?op=mo",//Le paso las variables a esta url Nota: envio con opcion "mo"
				type: "POST", //a travès de POST
				data: data,		
				cache: false,
				success: function (html) {	//Devuelve la respuesta de la url en la variable html			
					if (html==1) {					
						//window.location='index.php';
                        document.getElementById('validacion').innerHTML="Modificación exitosa.";
                        
                    } else {
						
                        document.getElementById('validacion').innerHTML=html;
						
					}
				}		
			});
			
		}
		
	}
	
	function quitarValidacion(id){     // deja sin marcacion los casilleros una vez actualizado los datos con exito
			
		document.getElementById(id).style.borderColor="#000";	
	
	}
