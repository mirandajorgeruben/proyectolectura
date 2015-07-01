<?php 
include('../php/Registro.php');

$datos =  new Registro();
$datosusuario = $datos->traerRegistro($_GET['id']);
?>
<html>
<head>
<title>Administrar al usuario <?php echo $datosusuario['nombre'] ?></title>
<meta http-equiv='Content-Type' content='text/html' charset="utf-8" />
<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../js/admin.js"></script>
<link href="../css/cuerpo.css" type="text/css"  rel="stylesheet"/>
<link href="../css/encabezado.css" type="text/css"  rel="stylesheet"/>
<style>
div.contenedor_reg{float:left;width:400px;clear:Both;margin-top:20px;}
div.contenedor_reg span{width:100px;float:left;}
input{width:300px;float:left;}
</style>
</head>
<body style="font-family:Arial;width:600px;margin:0px auto;">
<div id="columna_centro" style="width:650px;">
<a id="btn" style="cursor:pointer;float:right;width:180px;clear:both;color:red;margin-top:20px;text-align:center;margin-right:20px;text-decoration:none;margin-bottom:20px;" href="usuarios.php">Volver a Usuarios</a>

<input type="hidden" id="id" value="<?php echo $_GET['id']; ?>"  />
<div style="margin-left:20px;">
<div class="contenedor_reg">
    <span>
        Nombre:
    </span>
    <input type="text" id="nombre" value="<?php echo $datosusuario['nombre'] ?>" placeholder="Nombre" />
</div>


<div class="contenedor_reg">
    <span>
        Email:
    </span>
    <input type="text" id="mail" value="<?php echo $datosusuario['mail'] ?>" placeholder="@" />
</div>

<div class="contenedor_reg">
    <span>
        Contrase&ntilde;a 
    </span>
    <input type="password" id="passactual" value="<?php echo $datosusuario['password'] ?>" placeholder="******" />
</div>
<span id="validacion" style="float:left;width:400px;clear:both;color:green;margin-top:20px;"></span>
</div>
<span id="btn" style="cursor:pointer;float:left;width:80px;clear:both;color:red;margin-top:20px;margin-left:20px;text-align:center;" onclick="enviarUsuarioAdmin();">ENVIAR</span>
</div>


</body>
</html>