<?php
include_once('servicio.php');

include_once('Registro.php');

switch($_GET['op']){	//recibe como parametro a traves de la url
	case 'in':	//inserta un registro
		$Registro = new Registro();
		echo($Registro->insertar($_POST['nombre'],$_POST['pass'],$_POST['mail']));
	break;
    
    case 'mo':	//modifica un registro
		$Registro = new Registro();
		echo($Registro->modificar($_POST['nombre'],$_POST['pass'],$_POST['mail'],$_POST['id']));
	break;
}
?>