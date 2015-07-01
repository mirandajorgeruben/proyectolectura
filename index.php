<?php 
session_start(); 
if(isset($_GET['close']) and $_GET['close']==1){ // si vino la variable por get, destruye las variables de session
	$_SESSION['login']=0;
	$_SESSION['usuario']=''; 
	session_destroy();
}
if(!isset($_SESSION['login']) or $_SESSION['login']==0){ //si no esta definido la variable de sesion con un id de usuario
	
?>
<html>
<head>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="jquery.fancybox.pack.js"></script>
<link rel="stylesheet" type="text/css" href="jquery.fancybox.css" media="screen" />
<meta http-equiv='Content-Type' content='text/html' charset="utf-8" />

</head>
<body>
<!-- pagina inicio -->
<div id="contenedor">
<div id="encabezado">
<?php 
		include('login.php');
?>
</div>
    <div id="cuerpo">
    <?php
            include('cuerpoizquierdo.php'); //es la caja para registrarse
    ?>
    </div>
    
</div>
</body>
</html>
<?php 
} else { header('Location: inicio.php');}
?>
