<?php 
@session_start();
if(!isset($_SESSION['login']) || $_SESSION['login']==0){
header('Location:index.php');
}else{
session_start(); 
if(isset($_GET['close']) and $_GET['close']==1){ // si vino la variable por get, destruye las variables de session
	$_SESSION['login']=0;
	$_SESSION['usuario']=''; 
	session_destroy();
}

?>
<html>
    <head>
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
     <script type="text/javascript" src="js/footer.js"></script>
    <link href="css/base.css" type="text/css"  rel="stylesheet"/>
            <link href="css/cuerpo.css" type="text/css"  rel="stylesheet"/>

    <script >
    	var session = <?php echo $_SESSION['login'];?>;
    </script>
    
    <script type="text/javascript" src="js/crearlista.js"></script>

    
    
    <script type="text/javascript" src="js/buscarUsuarios.js"></script>
	<script type="text/javascript" src="jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="jquery.fancybox.pack.js"></script>
<link rel="stylesheet" type="text/css" href="jquery.fancybox.css" media="screen" />
    
    <meta http-equiv='Content-Type' content='text/html' charset="utf-8" />
    
    </head>
    <body> 
       <div id="contenedor">
		<div id="encabezado">
			<?php include('cabecera_logeado.php'); ?>
		</div>
		<div id="menu">
			<?php include('menu_animado.php'); ?>
		</div>
        <br><br>
           <br>
           <br>
           <div id="cuerpo"></div>
		<div id="columna_der" style="height: 200px;">
			<?php include('reproductor.php'); ?>
		</div>
	</div>
    <script type="text/javascript" >
        $(document).ready(function () {
            $(".fancybox").fancybox();

        });
    </script>
    </body>

</html>
<?php 
}
?>
