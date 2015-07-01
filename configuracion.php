<?php 
session_start(); 
if(isset($_GET['close']) and $_GET['close']==1){ // si vino la variable por get, destruye las variables de session
	$_SESSION['login']=0;
	$_SESSION['usuario']=''; 
	session_destroy();
}


?>
<html>
<head>

<meta http-equiv='Content-Type' content='text/html' charset="utf-8" />

</head>
<body>

<?php 
    include('cabecera_logeado.php');
?>
	<div class="cuerpo">
        
        <?php
		  include('cuerpoizquierdo.php');
        ?>
    </div>
    <iframe class="footer" frameborder=0 src="reproductor.html"></iframe>
	
</body>
</html>
