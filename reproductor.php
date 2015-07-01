<script src="js/jquery-1.9.1.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>

<link href="css/footer.css" type="text/css"  rel="stylesheet"/>
<link href="css/cuerpo.css" type="text/css"  rel="stylesheet"/>
<link href="css/jquery-ui-1.9.2.custom.min.css" type="text/css"  rel="stylesheet"/>


<?php
include('php/Listas.php'); 
include('php/Audiolibro.php');
$Audiolibro = new Audiolibro();
?>

<?php

$sql = "select p.nombre from lista as p order by p.nombre";
$res = query($sql,0);

$arreglo_php = array();
if(mysql_num_rows($res)==0)
   array_push($arreglo_php, "No hay datos");
else{
  while($palabras = mysql_fetch_array($res)){
    array_push($arreglo_php, $palabras[0]);
  }
}
?>

<script>
  $(function(){
    var autocompletar = new Array();
    <?php //Esto es un poco de php para obtener lo que necesitamos
     for($p = 0;$p < count($arreglo_php); $p++){ ?>
       autocompletar.push('<?php echo $arreglo_php[$p]; ?>');
     <?php } ?>
     $("#listabuscar").autocomplete({ //Usamos el ID de la caja de texto donde lo queremos
       source: autocompletar //Le decimos que nuestra fuente es el arreglo
     });
  });
</script>

<div class="footer" >
    <div class="listabuscar">
		<input type="text" id="listabuscar" /> <span id="btn" onclick="buscarLista();">Buscar</span>
		
			<div class="listaresultados" id="listaresultados">
			
			</div>
		    
    </div>
    <br>
    	<div class="listasmias">
    	<h3>Audiolistas:</h3>
        <div class="listas">
				<div id="listaAgregadas">
			
               <?php 
							echo($ultimaCreada = $Audiolibro->traerUltimaLista($_SESSION['login']));
					?>
            
            </div>
        </div>
    	</div>

    <div class="reproductor" id="contenedorReproductor">
        <?php 
		$ultimaCreada = $Audiolibro->traerUltimaLista($_SESSION['login']);
		?>
        <embed src="reproductor/dewplayer-playlist.swf" height="200" width="240" wmode="transparent" flashvars="xml=listas/<?php echo $ultimaCreada; ?>.xml&autoplay=0&autoreplay=1&randomplay=0&volume=100"></embed>
    </div>
</div>
    <br>
    <br>
    

    


