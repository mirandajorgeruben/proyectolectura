<?php

include_once('servicio.php');

include_once('Generos.php');

switch($_GET['op']){
	
    
    case 'mo':
		$Genero = new Generos();
		echo($Genero->modificar($_POST['nombre'],$_POST['id']));
	break;
	
	 case 'in':
		$Genero = new Generos();
		echo($Genero->insertar($_POST['nombre']));
	break;
	
}
?>