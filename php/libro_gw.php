<?php
include_once('servicio.php');

include_once('Libro.php');

switch($_GET['op']){
	
    
    case 'bu':
		$Libro = new Libro();
		echo($Libro->traerLibros($_POST['busqueda']));
	break;
	
	case 'aglibro':
		$Libro = new Libro();
		echo($Libro->sumarLibro($_POST['libros'],$_POST['ultimoagregado']));
	break;
	
	case 'aglista':
		$Libro = new Libro();
		echo($Libro->crearLista($_POST['libros'],$_POST['iduser'],$_POST['nombrelista'],$_POST['generolista'],$_POST['privacidadlista'],$_POST['compartircon']));
	break;
	
	case 'visualizacion':
		$Libro = new Libro();
		echo($Libro->agregarVisualizacion($_POST['idlista'],$_POST['iduser']));
	break;
	
	case 'voto':
		$Libro = new Libro();
		echo($Libro->votarLista($_POST['idlista'],$_POST['iduser']));
	break;
}
?>