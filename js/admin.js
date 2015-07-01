
	function dardebaja(id,elimina){
		$.ajax({
				url: "../php/usuarios_gw.php?op=el",//Le paso las variables a esta url
				type: "POST", //a travès de POST
				data: 'id='+id+"&elimina="+elimina,		
				cache: false,
				success: function (html) {	//Devuelve la respuesta de la url en la variable html			
					if (html==1) {					
						window.location='usuarios.php';
                        
                    } 
				}		
			});
	}


	function enviarUsuarioAdmin(){
			var nombre = document.getElementById('nombre').value;
			var pass = document.getElementById('passactual').value;
			var mail = document.getElementById('mail').value;
			var id = document.getElementById('id').value;
			
			var data = "nombre="+nombre+"&pass="+pass+"&mail="+mail+"&id="+id;
			$.ajax({
				url: "../php/usuarios_gw.php?op=mo",//Le paso las variables a esta url
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
	
	
	function cambiarEstadoLista(estado,id){
		$.ajax({
				url: "../php/Listas_gw.php?op=bannrea",//Le paso las variables a esta url
				type: "POST", //a travès de POST
				data: 'id='+id+'&estado='+estado,		
				cache: false,
				success: function (html) {	//Devuelve la respuesta de la url en la variable html			
					if (html==1) {					
						window.location='listas.php';
                        
                    } 
				}		
			});
	
	
	}
	
	function traerLibrosLista(id){
		$.ajax({
				url: "../php/listas_gw.php?op=traerlibros",//Le paso las variables a esta url
				type: "POST", //a travès de POST
				data: 'id='+id,		
				cache: false,
				success: function (html) {	//Devuelve la respuesta de la url en la variable html			
					document.getElementById('list'+id).innerHTML=html;
                     
				}		
			});
	
	}
	
	
	function enviarGeneroAdmin(){
			var nombre = document.getElementById('nombre').value;
			var id = document.getElementById('id').value;
			
			var data = "nombre="+nombre+"&id="+id;
			$.ajax({
				url: "../php/generos_gw.php?op=mo",//Le paso las variables a esta url
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
	
	function insertarGeneroAdmin(){
		 var data = "nombre="+document.getElementById('nombre').value;
			$.ajax({
				url: "../php/generos_gw.php?op=in",//Le paso las variables a esta url
				type: "POST", //a travès de POST
				data: data,		
				cache: false,
				success: function (html) {	//Devuelve la respuesta de la url en la variable html			
					if (html==1) {					
						//window.location='index.php';
                        document.getElementById('validacion').innerHTML="Inserción exitosa.";
                        
                    } else {
						
                        document.getElementById('validacion').innerHTML=html;
						
					}
				}		
			});	
	}
	
	function enviarAutorAdmin(){
			var nombre = document.getElementById('nombre').value;
			var id = document.getElementById('id').value;
			
			var data = "nombre="+nombre+"&id="+id;
			$.ajax({
				url: "../php/autores_gw.php?op=mo",//Le paso las variables a esta url
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
	
	
	function insertarAutoresAdmin(){
		 //alert("ert");
		 var data = "nombre="+document.getElementById('nombre').value;
			$.ajax({
				url: "../php/autores_gw.php?op=in",//Le paso las variables a esta url
				type: "POST", //a travès de POST
				data: data,		
				cache: false,
				success: function (html) {	//Devuelve la respuesta de la url en la variable html			
					if (html==1) {					
						//window.location='index.php';
                        document.getElementById('validacion').innerHTML="Inserción exitosa.";
                        
                    } else {
						
                        document.getElementById('validacion').innerHTML=html;
						
					}
				}		
			});	
	}
	