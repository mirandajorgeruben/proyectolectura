<?php 
@session_start();

include('../php/Listas.php');
$libros = new Listas();

include('../php/Usuarios.php');
$users =  new Usuarios();
$usuarios = $users->traerUnNombreDeUsuario($_GET['id']);
?>

<html>
<head>
<title>Admin - Ver detalles del usuario <?php echo $usuarios; ?></title>
<meta http-equiv='Content-Type' content='text/html' charset="utf-8" />
<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../js/admin.js"></script>
<link href="../css/cuerpo.css" type="text/css"  rel="stylesheet"/>
<link href="../css/encabezado.css" type="text/css"  rel="stylesheet"/>

</head>
<body style="font-family:Arial;width:600px;margin:0px auto;">
<div id="columna_centro" style="width:650px;height:auto;">
<a id="btn" style="cursor:pointer;float:right;width:180px;clear:both;color:red;margin-top:20px;margin-right:20px;text-decoration:none;text-align:center;margin-bottom:20px;" href="usuarios.php">Volver a Usuarios</a>
</br>
</br>
</br>
</br>
</br>
<div style="margin-left:20px;" >
<?php 
$userdata = $users->traerUsuario($_GET['id']);
while($row = mysql_fetch_array($userdata)){
?>
<b>Usuario:</b> <?php echo $row['nombre']; ?><br />
<b>Mail:</b> <?php echo $row['mail']; ?>
<?php 
}
?>
<br />
<br />
<b>Libros del usuario</b>
<br />
</br>
<?php 
$userdatalista = $users->traerListaDeUnUsuario($_GET['id']);
while($rowplay = mysql_fetch_array($userdatalista)){
?>
<b>Nombre del libro</b> <?php echo $rowplay['nombre']; ?><br />
<b>Fecha de creación:</b> <?php echo $rowplay['fecha']; ?><br />
<b>Cantidad de libros:</b> <?php echo $libros->cantidadLibrosLista($rowplay['id']); ?><br />
<b>Votos Obtenidos:</b> <?php echo $libros->traerCantidadVotosLista($rowplay['id']); ?><br />
<b>Libros de la Lista:</b>
<br />
	<?php 
	
	$userlistalibros = $libros->traeLibrosLista($rowplay['id']);
	echo $userlistalibros;
	?>

<br />
<br />
<?php 
}
?>
</div>

</div>
</body>
</html>
