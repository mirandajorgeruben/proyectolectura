
function buscar(){
            var busqueda = document.getElementById('audiolibro').value;
			$.ajax({
				url: "php/audiolibro_gw.php?op=bu",//Le paso las variables a esta url Nota: envio con opcion "mo"
				type: "POST", //a travès de POST
				data: 'busqueda='+busqueda,		
				cache: false,
				success: function (html) {	//Devuelve la respuesta de la url en la variable html			
					
					 document.getElementById('audiolibrosencontrados').innerHTML=html;
                   
				}		
			});
        }
		
		var audiolibrosAgregados = Array();
			
		function sumarAudiolibro(id){
				
			audiolibrosAgregados.push(id);
			$.ajax({
				url: "php/audiolibro_gw.php?op=agaudiolibro",//Le paso las variables a esta url Nota: envio con opcion "mo"
				type: "POST", //a travès de POST
				data: 'audiolibros='+audiolibrosAgregados+'&ultimoagregado='+id,		
				cache: false,
				success: function (html) {	//Devuelve la respuesta de la url en la variable html			
					
					 document.getElementById('audiolibrossumados').innerHTML=html;
                   
				}		
			});
			
		}
		
		function eliminarAudiolibro(id){
			var pos = audiolibrosAgregados.indexOf(id);
			if(pos!=-1) audiolibrosAgregados.splice(pos, 1); // Lo borramos definitivamente
			//
			
			$.ajax({
				url: "php/audiolibro_gw.php?op=agaudiolibro",//Le paso las variables a esta url Nota: envio con opcion "mo"
				type: "POST", //a travès de POST
				data: 'audiolibros='+audiolibrosAgregados+'&ultimoagregado=0',		
				cache: false,
				success: function (html) {	//Devuelve la respuesta de la url en la variable html			
					
					 document.getElementById('audiolibrossumados').innerHTML=html;
                   
				}		
			});
			
		}
		
		function grabarLista(){
			var datas = 'audiolibros='+audiolibrosAgregados+'&nombrelista='+document.getElementById('nombrelista').value+'&iduser='+session+'&generolista='+document.getElementById('generolista').value+"&privacidadlista="+document.getElementById('privacidadlista').value+"&compartircon="+verdatosmultipleselect();
			//alert(datas);
			
			$.ajax({
				url: "php/audiolibro_gw.php?op=aglista",//Le paso las variables a esta url Nota: envio con opcion "mo"
				type: "POST", //a travès de POST
				data: datas,		
				cache: false,
				success: function (html) {	//Devuelve la respuesta de la url en la variable html			
					 //alert(html);
					 //
                   	document.getElementById('validacion').innerHTML="La Audiolista <b>"+document.getElementById('nombrelista').value+"</b> fué creada con éxito.";
				}		
			});
			
		}
		
		
		
		function preguntosicomparte(){
			if(document.getElementById('privacidadlista').value==2){
				document.getElementById('DivCompartir').style.display="block";
			}else{
				document.getElementById('DivCompartir').style.display="none";
			}
		}
		
		var concatenaMultipleValores='';
		var cantvalores = 0;
		function verdatosmultipleselect(){
			//alert(document.getElementById('compartidaconamigos').value);
			var select = document.getElementById('compartidaconamigos');
			concatenaMultipleValores="";
			cantvalores=0;
			for ( var i = 0, l = select.options.length, o; i < l; i++ )
			{
			  o = select.options[i];
			  if ( o.selected  == true )
			  {
				if(cantvalores==0){
				concatenaMultipleValores = o.value
				}else{
				concatenaMultipleValores = concatenaMultipleValores +','+ o.value
				}
				cantvalores++;
			  }
			}
			return concatenaMultipleValores;
		}
