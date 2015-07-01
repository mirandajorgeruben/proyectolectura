<?php 
session_start(); 
if(isset($_GET['close']) and $_GET['close']==1){ // si vino la variable por get, destruye las variables de session
	$_SESSION['login']=0;
	$_SESSION['usuario']=''; 
	session_destroy();
}

?>
<link href="css/cuerpo.css" type="text/css"  rel="stylesheet"/>
    <div id="columna_centro">
    <h4>SUBIR PDF</h4>	
    <?php 
        if(isset($_GET['upload'])){
        echo 'Subido con éxito';
        }
    ?>
    	  <form name="formpdf" method="POST" action="php/pdf.php" enctype="multipart/form-data">
  			<div class="cont">
         	<label style="margin-left:10px;">PDF: </label>
         	<br />
         	<input type="file" id="pdf" value="" name="pdf"  />                
         </div>
   	  <div class="cont">
         	<label style="margin-left:10px;">Nombre del Libro: </label>
         	<br />
         	<input type="text" id="nombrelibro" name="nombrelibro" value="" />                
         </div>
        
        <input type="hidden" id="idusuario" name="idusuario" value="<?php echo $_SESSION['login']; ?>" />
        <div class="cont">
        <label style="margin-left:10px;">Genero: </label>
        	<br/>
        <select id="genero" name="genero">
        <?php
            include('php/servicio.php');
			$sql = 'SELECT * FROM genero';
            $generos=query($sql,0);
            while ($genero = mysql_fetch_array($generos)) {
                echo '<option value="'.$genero['id'].'">'.$genero['nombre'].'</option>';		
            }	
        ?>	
        </select>
        </div>
        <div class="cont">
        <label style="margin-left:10px;">Autor: </label>
        	<br/>
        <select id="autor" name="autor">
        <?php 
            $sql = 'SELECT * FROM autor';
            $autores=query($sql,0);
            while ($autor = mysql_fetch_array($autores)) {
                echo '<option value="'.$autor['id'].'">'.$autor['nombre'].'</option>';		
            }	
        ?>	
        </select>
        </div>    
        <div class="cont">
        <input name="enviar" type="submit" value="Subir" />
        </div>	
    </form>
    </div>



