<?php 
@session_Start();
?>
<h4 style="font-size:15px;float:left;margin-left:20px;margin-top:20px;padding:0px;margin-bottom:0px;">
Mis amistades
</h4>
<div style="float:left;margin-left:20px;margin-top:20px;clear:both;">
<?php 
include_once('php/Usuarios.php');
$Usuario = new Usuarios();
$amistades = $Usuario->traerAmistades($_SESSION['login']);
echo $amistades;
?>
</div>


<h4 style="font-size:15px;float:left;margin-left:20px;margin-top:20px;padding:0px;margin-bottom:0px;clear:both;">
Mis solicitudes pendientes
</h4>
<div style="float:left;margin-left:20px;margin-top:20px;clear:both;">
<?php 

$amistadespendientes = $Usuario->traerAmistadesPendientes($_SESSION['login']);
echo $amistades;
?>
</div>