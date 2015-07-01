<?php

include_once('servicio.php');

include_once('Autores.php');

switch($_GET['op']){
	
    
    case 'mo':
		$Autores = new Autores();
		echo($Autores->modificar($_POST['nombre'],$_POST['id']));
	break;
	
	 case 'in':
		$Autores = new Autores();
		echo($Autores->insertar($_POST['nombre']));
	break;
	
}
?>