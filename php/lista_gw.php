<?php


	include_once("servicio.php");
	
	include_once("Listas.php");
	
switch($_GET['op']){
	
	case 'buscar':
		$Listas = new Listas();
		echo($Listas->traerListas($_POST['busqueda']));
	break;    
	case 'agrlista':
		$Listas = new Listas();
		echo($Listas->sumarLista($_POST['lista'],$_POST['ultimoagregadop']));
	break;
	case 'traeraudiolibros':
		$Listas = new Listas();
		echo($Listas->traeAudiolibrosLista($_POST['id']));
	break;	
	case 'reproduccion':
		$Listas = new Listas();
		echo($Listas->agregarReproduccion($_POST['idlista'],$_POST['iduser']));
	break;
}

?>