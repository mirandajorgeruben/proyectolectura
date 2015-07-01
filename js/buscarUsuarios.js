function buscarUnUsuario(){
	
	var data = "nombre="+document.getElementById('usuariobuscado').value;
	$.ajax({
		url: "php/usuarios_gw.php?op=traerUsuario",//Le paso las variables a esta url Nota: envio con opcion "mo"
		type: "POST", //a travès de POST
		data: data,		
		cache: false,
		success: function (html) {	//Devuelve la respuesta de la url en la variable html			
			document.getElementById('resultadosDeUsuario').innerHTML=html;
		}		
	});
	
}

function agregarUsuarioComoAmigo(idagregar,nombre){
	
	var data = "idaagregar="+idagregar+"&idagrega="+session;
	$.ajax({
		url: "php/usuarios_gw.php?op=agregarAmigo",//Le paso las variables a esta url Nota: envio con opcion "mo"
		type: "POST", //a travès de POST
		data: data,		
		cache: false,
		success: function (html) {	//Devuelve la respuesta de la url en la variable html			
			document.getElementById('resultadosDeAgregarUsuario').innerHTML="Espera a que <b>"+nombre+"</b> acepte la solicitud para ver sus listas.";
		}		
	});

}


function verListasDe(id){
	$.ajax({
			url: "php/usuarios_gw.php?op=traerlistausuario",//Le paso las variables a esta url
			type: "POST", //a travès de POST
			data: 'id='+id+"&iduserlogueado="+session,		
			cache: false,
			success: function (html) {	//Devuelve la respuesta de la url en la variable html			
				document.getElementById('listsUser'+id).innerHTML=html;
				 
			}		
		});

}


function confirmarAmigo(id){
	$.ajax({
			url: "php/usuarios_gw.php?op=confirmarAmistad",//Le paso las variables a esta url
			type: "POST", //a travès de POST
			data: 'id='+id,		
			cache: false,
			success: function (html) {	//Devuelve la respuesta de la url en la variable html			
				 refreshDivs('cuerpo','amigos.php');
			}		
		});

}