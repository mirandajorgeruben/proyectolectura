
function reproducirLista(idlista){
	
	document.getElementById('contenedorReproductor').innerHTML='<embed src="reproductor/dewplayer-playlist.swf" height="200" width="240" wmode="transparent" flashvars="xml=listas/'+idlista+'.xml&autoplay=0&autoreplay=1&randomplay=0&volume=100"></embed>';
	
	//Agrego un registro en la tabla de reproducciones
	var data = "idlista="+idlista+"&iduser="+session;
	$.ajax({
		url: "php/lista_gw.php?op=reproduccion",
		type: "POST", //a travès de POST
		data: data,		
		cache: false,
		success: function (html) {}		
		});
	}

		
function buscarLista(){
            var busqueda = document.getElementById('listabuscar').value;
			$.ajax({
				url: "php/lista_gw.php?op=buscar",
				type: "POST", 
				data: 'busqueda='+busqueda,		
				cache: false,
				success: function (html) {	//Devuelve la respuesta de la url en la variable html			
					
					 document.getElementById('listaresultados').innerHTML=html;
                   
				}		
			});
        }		

var listaAgregados = Array();

function agregarLista(id){
		
		listaAgregados.push(id);		
		$.ajax({
				url: "php/lista_gw.php?op=agrlista",
				type: "POST", //a travès de POST
				data: 'lista='+listaAgregados+'&ultimoagregadop='+id,		
				cache: false,
				success: function (html) {	//Devuelve la respuesta de la url en la variable html			
					
					 document.getElementById('listaAgregadas').innerHTML=html;
                   
				}		
			})	
	}
	
		function quitarLista(id){
			var pos = listaAgregados.indexOf(id);
			if(pos!=-1) listaAgregados.splice(pos, 1); // Lo borramos definitivamente
			//
			
			$.ajax({
				url: "php/lista_gw.php?op=agrlista",//Le paso las variables a esta url Nota: envio con opcion "mo"
				type: "POST", //a travès de POST
				data: 'lista='+listaAgregados+'&ultimoagregado=0',		
				cache: false,
				success: function (html) {	//Devuelve la respuesta de la url en la variable html			
					
					 document.getElementById('listaAgregadas').innerHTML=html;
                   
				}		
			});
			
		}
	

