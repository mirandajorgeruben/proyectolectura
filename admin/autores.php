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

include('../php/Autores.php');

$autores =  new Autores();
$auts = $autores->traerAutores();
?>
<div id="columna_centro" style="width:650px;height:auto;">
<a id="btn" style="cursor:pointer;float:right;width:auto;height:auto;clear:both;color:red;margin-top:20px;text-decoration:none;text-align:right;margin-bottom:20px;margin-right:20px;" href="autores_insertar.php">Insertar autores</a>
</br>
</br>
</br>
</br>
<table id="tabla" style="float:left;margin-left:20px;">
	<tr>
    	<td style="color:#520C06;width:300px;">
        Nombre
        </td>
        
                
        <td style="color:#520C06;width:300px;">
        
        </td>
        
    </tr>
    

<?php
while($row = mysql_fetch_array($auts)){
	$style="";
		
	
	
	echo '<tr style="'.$style.'">';
	echo '<td>'.$row['nombre'].'</td>';
	echo '<td><a id="btn" style="margin-left:20px;" href="autores_modificar.php?id='.$row['id'].'">Modificar</a></td>';
	echo '</tr>';
	
}
?>

</table>
</div>

</body>
</html>
