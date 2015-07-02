<?php
$conn = mysql_connect("localhost","root","");
mysql_select_db("powerlists",$conn);

$idUsuario = $_GET["IdUsuario"];

$query = "delete from Voto where id_usuario = ".$idUsuario.";";
$resultado = mysql_query($query, $conn);

$query = "delete from PlaylistUsuario where id_usuario = ".$idUsuario.";";
$resultado = mysql_query($query, $conn);

$query = "delete from Solicitud where id_usuario_solicitado = ".$idUsuario." or id_usuario_solicitante = ".$idUsuario.";";
$resultado = mysql_query($query, $conn);

$query = "delete from PlaylistUsuario where id_playlist in (select id_playlist from Playlist where id_usuario_creador = ".$idUsuario.");";
$resultado = mysql_query($query, $conn);

$query = "delete from Voto where id_playlist in (select id_playlist from Playlist where id_usuario_creador = ".$idUsuario.");";
$resultado = mysql_query($query, $conn);

$query = "delete from Playlist where id_usuario_creador = ".$idUsuario.";";
$resultado = mysql_query($query, $conn);

$query = "delete from Notificacion where id_usuario = ".$idUsuario.";";
$resultado = mysql_query($query, $conn);

$query = "delete from Usuario where id_usuario = ".$idUsuario.";";
$resultado = mysql_query($query, $conn);

mysql_close($conn);

header("location: admin.php");
?>