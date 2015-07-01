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
<div id="columna_centro" style="width:650px;">
<?php 
@session_start();

include('../php/Usuarios.php');
$users =  new Usuarios();
$usuarios = $users->traerUsuarios();
?>

<table style="float:left;">
	<tr>
    	<td style="color:#520C06;width:200px;">
        Nombre
        </td>
        <td style="color:#520C06;width:200px;">
        Email
        </td>
        
        <td style="color:#520C06;width:200px;">
        Ver
        </td>
        
        <td style="color:#520C06;width:200px;">
        Modificar
        </td>
        
        <td style="color:#520C06;width:200px;">
        Eliminar/Reactivar
        </td>
    </tr>
    

<?php
while($row = mysql_fetch_array($usuarios)){
	$style="";
	if($row['admin']==2){
	$style="background-color:#33C2B9;";
	}
	
	echo '<tr style="'.$style.'">';
	echo '<td>'.$row['nombre'].'</td>';
	echo '<td>'.$row['mail'].'</td>';
	//echo '<td>'.$row['admin'].'</td>';
	echo '<td style="width:200px;"><a id="btn" style="font-size:1em;padding:.10em;" href="detalle_usuario.php?id='.$row['id'].'">Ver</span></td>';
	if($row['admin']<>1){
		
		echo '<td style="width:200px;"><a id="btn" style="font-size:1em;padding:.10em;" href="usuarios_modificar.php?id='.$row['id'].'"> Modificar </a></td>';
		if($row['admin']==0){
		echo '<td style="width:200px;"><span id="btn" style="font-size:1em;padding:.10em;" onclick="dardebaja('.$row['id'].',2);" style="cursor:pointer;">Eliminar</span></td>';
		}else{
		echo '<td style="width:200px;"><span id="btn" style="font-size:1em;padding:.10em;" onclick="dardebaja('.$row['id'].',0);" style="cursor:pointer;">Reactivar</span></td>';	
		}
	}
	echo '</tr>';
}
?>

</table>
	
</div>
</body>
</html>
