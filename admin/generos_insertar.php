<?php 
include('../php/Generos.php');

?>
<html>
<head>
<title>Administrar géneros. Insertar.</title>
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
<div id="columna_centro" style="width:650px;height:auto;">
<a id="btn" style="cursor:pointer;float:right;width:auto;clear:both;color:red;margin-top:20px;text-decoration:none;text-align:right;margin-bottom:20px;margin-right:20px;" href="generos.php">Volver a la lista de géneros</a>

<div class="contenedor_reg" style="margin-left:20px;">
    <span>
        Nombre:
    </span>
    
    <input type="text" id="nombre" value="" placeholder="Nombre" />
</div>



<span id="validacion" style="float:left;width:auto;clear:both;color:green;margin-top:20px;margin-left:20px;"></span>
<span id="btn" style="cursor:pointer;float:left;width:auto;clear:both;color:red;margin-top:20px;margin-left:20px;" onClick="insertarGeneroAdmin();">Guardar</span>
</div>
</body>
</html>