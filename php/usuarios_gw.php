<?php
include_once('servicio.php');

include_once('Usuarios.php');

switch($_GET['op']){
	
    
    case 'mo':
		$Usuario = new Usuarios();
		echo($Usuario->modificar($_POST['nombre'],$_POST['pass'],$_POST['mail'],$_POST['id']));
	break;
	
	case 'el':
		$Usuario = new Usuarios();
		echo($Usuario->eliminar($_POST['id'],$_POST['elimina']));
	break;
	
	case 'traerUsuario':
		$Usuario = new Usuarios();
		echo($Usuario->traerUsuariosBusqueda($_POST['nombre']));
	break;
	
	case 'agregarAmigo':
		$Usuario = new Usuarios();
		echo($Usuario->agregarAmigo($_POST['idaagregar'],$_POST['idagrega']));
	break;
	
	case 'traerlistausuario':
		$Usuario = new Usuarios();
		echo($Usuario->traerListaUsuario($_POST['id'],$_POST['iduserlogueado']));
	break;
	
	case 'confirmarAmistad':
		$Usuario = new Usuarios();
		echo($Usuario->confirmarAmistad($_POST['id']));
	break;
}
?>