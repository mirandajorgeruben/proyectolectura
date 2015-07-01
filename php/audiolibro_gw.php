<?php

include_once('servicio.php');

include_once('Audiolibro.php');

switch($_GET['op']){
	
    
    case 'bu':
		$Audiolibro = new Audiolibro();
		echo($Audiolibro->traerAudiolibros($_POST['busqueda']));
	break;
	
	case 'agaudiolibro':
		$Audiolibro = new Audiolibro();
		echo($Audiolibro->sumarAudiolibro($_POST['audiolibros'],$_POST['ultimoagregado']));
	break;
	
	case 'aglista':
		$Audiolibro = new Audiolibro();
		echo($Audiolibro->crearLista($_POST['audiolibros'],$_POST['iduser'],$_POST['nombrelista'],$_POST['generolista'],$_POST['privacidadlista'],$_POST['compartircon']));
	break;
	
	case 'reproduccion':
		$Audiolibro = new Audiolibro();
		echo($Audiolibro->agregarReproduccion($_POST['idlista'],$_POST['iduser']));
	break;
	
	
}
?>