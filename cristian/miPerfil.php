<?php session_start(); ?>
<html>
<head>
<style type="text/css">
#divPassword {
    display: none;
}
</style>
<script type="text/javascript">
function cambiarPassword(){
    var divPassword = document.getElementById("divPassword");
    
    divPassword.style.display = divPassword.style.display != "block" ? "block" : "none";
}
</script>

<link rel="stylesheet" type="text/css" href="css/estilos_miperfil.css"/>
<title id="title">Bienvenido a PowerLists</title>

</head>

<body>

<div id="header">

<img src="img/pl_logo2.png" id="logo" /> 
<span id="title">El sitio web de intercambio de listas!</span>

</div>

<div id="container_left">
<a href="home.php">Home</a>

<?php
$conn = mysql_connect("localhost","root","");
mysql_select_db("powerlists",$conn);

$query = "select nombre, apellido, email from Usuario where id_usuario = '".$_SESSION["idUsuarioLogueado"]."';";

$resultado = mysql_query($query, $conn);

$tabla = mysql_fetch_array($resultado);
?>
<div>
    <form action="actualizarPerfil.php" method="post">
    Usuario <input type="text" name="usuario" value="<?php echo $_SESSION["usuarioLogueado"]; ?>"/><br/>
    Nombre <input type="text" name="nombre" value="<?php echo $tabla[0]; ?>"/><br/>
    Apellido <input type="text" name="apellido" value="<?php echo $tabla[1]; ?>"/><br/>
    Email <input type="text" name="email" value="<?php echo $tabla[2]; ?>"/><br/>
    <input type="submit" value="Guardar" id="button"/><br/>
    </form>
</div>
<a href="#" onclick="cambiarPassword();">Cambiar Password</a>
<?php
$error = isset($_GET["error"]) ? $_GET["error"] : 0;

if ($error != 0){
    echo "<p style='color: red;'>La antigua password es incorrecta</p>";
}
?>
<div id="divPassword">
    <form action="actualizarPassword.php" method="post">
    Password Anterior <input type="password" name="passAnterior" /><br/>
    Nuevo Password<input type="password" name="passActual" /><br/>
    Confirmar Nuevo Password<input type="password" name="confirmaPassActual" /><br/>
    <input type="submit" value="Guardar" id="button"/>
    </form>
</div><br/><br/>
<div>
Personas que sigues
<ul>
<?php
    $query = "select u.nombre_usuario from Solicitud s inner join Usuario u on s.id_usuario_solicitado = u.id_usuario where s.id_usuario_solicitante = ".$_SESSION["idUsuarioLogueado"].";";
    $resultado = mysql_query($query, $conn);

    while ($tabla = mysql_fetch_array($resultado)){
        echo "<li><a href='perfilUsuario.php?usuario=".$tabla[0]."'>".$tabla[0]."</a></li>";        
    }
?>
</ul>
</div>

</div>



<div id="footer">

</div>
</body>

<?php mysql_close($conn); ?>
</html>