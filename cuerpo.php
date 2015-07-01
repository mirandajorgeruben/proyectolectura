<link href="css/cuerpo.css" type="text/css"  rel="stylesheet"/>
<link href="editor/ckeditor/sample.css" rel="stylesheet">
<div id="columna_izq" >
    
<?php 
if(!isset($_SESSION['login']) or $_SESSION['login']==0){ //si no esta definida la session ingresar
include ('registro.php');	// al registro de un nuevo usuario
}else{
 include ('editarperfil.php');   //si esta registrado va a la edicion del perfil
}
?>

</div>