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
include('../php/Usuarios.php');
include('../php/Listas.php');
$listas =  new Listas();
$lists = $listas->traerListas();
?>
<div id="columna_centro" style="width:650px;height:auto;">
<table id="tabla" style="float:left;">
	<tr>
    	<td style="color:#520C06;width:200px;">
        Nombre
        </td>
        <td style="color:#520C06;width:200px;">
        Creador
        </td>
        <td style="color:#520C06;width:200px;">
        Visibilidad
        </td>
        
        <td style="color:#520C06;width:200px;">
        Horario de creación
        </td>
                
        <td style="color:#520C06;width:200px;">
        Banear/Reactivar
        </td>
        
        <td style="color:#520C06;width:200px;">
        
        </td>
    </tr>
    

<?php
while($row = mysql_fetch_array($lists)){
	$style="";
	if($row['id_visibilidad']==1){
		$estado = 'Pública';
		$style ="";
	}
	if($row['id_visibilidad']==0){
		$estado = 'Privada';
		$style ="";
	}
	if($row['id_visibilidad']==4){
		$estado = 'Baneada';
		$style ="background-color:orange;";
	}
	
	
	
	echo '<tr style="'.$style.'">';
	
	$users =  new Usuarios();
	$NombreDeUsuario = $users->traerUnNombreDeUsuario($row['id_usuario']);
	
	
	echo '<td style="font-size:12px;">'.$row['nombre'].'</td>';
	echo '<td style="font-size:12px;"><b>'.$NombreDeUsuario.'</b></td>';
	echo '<td style="font-size:12px;">';
	echo $estado;
	echo '</td>';
	echo '<td style="font-size:12px;">'.$row['fecha'].'</td>';
	if($estado=='Baneada'){
		echo '<td style="font-size:12px;"><span id="btn" style="font-size:1em;padding:.10em;" onclick="cambiarEstadoLista(0,'.$row['id'].');" style="cursor:pointer;color:red;font-size:12px;">Recuperar</span></td>';
	}else{
		echo '<td style="font-size:12px;"><span id="btn" style="font-size:1em;padding:.10em;" onclick="cambiarEstadoLista(4,'.$row['id'].');" style="cursor:pointer;color:red;font-size:12px;">Banear</span></td>';
	}
	
	echo '<td style="font-size:12px;"><span id="btn" style="font-size:1em;padding:.10em;" onclick="traerLibrosLista('.$row['id'].');" style="cursor:pointer;"></span></td>';
	
	
	echo '</tr>';
	echo '<tr>';
		echo '<td colspan="6">';
		echo '<div id="list'.$row['id'].'" style="font-size:12px;background-color:yellow;"></div>';
		echo '</td>';
	echo '</tr>';
}
?>

</table>

</div>
</body>
</html>
