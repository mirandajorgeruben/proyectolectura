<html>
<head>
<title>Admin</title>
<meta http-equiv='Content-Type' content='text/html' charset="utf-8" />
<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../js/admin.js"></script>
<link href="../css/cuerpo.css" type="text/css"  rel="stylesheet"/>
<link href="../css/encabezado.css" type="text/css"  rel="stylesheet"/>

</head>
<body style="font-family:Arial;width:600px;margin:0px auto;">
<?php 
@session_start();

include('../php/Libro.php');

$libros =  new Libro();
$libro = $libros->traerTodosLosLibros();
?>
<div id="columna_centro" style="width:650px;height:auto;">
<table id="tabla" style="float:left;">
	<tr>
    	<td style="color:#520C06;width:300px;">
        Nombre
        </td>
        <td style="color:#520C06;width:300px;">
        Fecha de subida
        </td>
        <td style="color:#520C06;width:300px;">
        Género
        </td>
        <td style="color:#520C06;width:300px;">
        Autor
        </td>
    </tr>
    

<?php
while($row = mysql_fetch_array($libro)){
	$style="";
		
	
	
	echo '<tr style="'.$style.'">';
	echo '<td>'.$row['nombre'].'</td>';
	echo '<td>'.$row['fecha'].'</td>';
	echo '<td>'.$row['genero'].'</td>';
	echo '<td>'.$row['autor'].'</td>';
	
	//echo '<td><a href="generos_modificar.php?id='.$row['id'].'">Modificar</a></td>';
	echo '</tr>';
	
}
?>

</table>
</div>
<div>
	<input id="btn" class="fade" style="width:200px;margin-left:15px;" value='Generar Reporte'/>	
</div>
</body>
</html>
