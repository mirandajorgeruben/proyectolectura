
function validar(){
	var username=document.getElementById('username').value;//Tomo el value de los campos
	var password=document.getElementById('password').value;
	
	var data = 'username=' + username + '&password=' + password; //Cargo los parametros a una variable.

	$.ajax({
		url: "php/login_gw.php",	//Le paso las variables a esta url. Esta se va a encargar de setear las variables Globales de sesion
		type: "POST", //a travès de POST
		data: data,		
		cache: false,
		success: function (html) {	//Devuelve la respuesta de la url en la variable html			
			if (html>0) {					
				window.location.href='index.php';	// al re cargar la dirección, va a haber una actualización de la variable de sesion. Puede ser 0 o el id de usuario
			} else {
				//document.getElementById('cargando').innerHTML='Los datos son incorrectos';
				document.getElementById('username').value="";
				document.getElementById('password').value="";
				document.getElementById('username').style.backgroundColor="#99ccff";
               	document.getElementById('password').style.backgroundColor="#99ccff";
			}
		}		
	});
	
	
}