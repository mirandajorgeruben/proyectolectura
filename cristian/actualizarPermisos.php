<?php
$conn = mysql_connect("localhost","root","");
mysql_select_db("powerlists",$conn);

$idUsuario = $_GET["IdUsuario"];
$rol = $_GET["Rol"];

$query = "update Usuario set rol = '".$rol."' where id_usuario = ".$idUsuario.";";

$resultado = mysql_query($query, $conn);

mysql_close($conn);

header("location:admin.php")
?>