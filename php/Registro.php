<?php
include_once('servicio.php');

///////////// CLASE REGISTRO/////////////
class Registro {

	
	function insertar($nombre,$pass,$mail){	//Inserta un nuevo registro en la base de usuarios. Actualiza el Log
		
		$sql = "SELECT count(1) as cantidad FROM usuario WHERE mail='".$mail."'";
		$registros = mysql_fetch_array(query($sql,0));
		if($registros['cantidad']>0){
			echo '2';	// Imprime 2 en el caso de que ya exista el registro
		}else{
			$sql = "INSERT INTO usuario (id,nombre,mail,password,admin) VALUES (0,'".$nombre."','".$mail."','".$pass."',0)";
			return query($sql,0,1);
		}
	}
	
    function traerRegistro($id){	//Envia todos los campos del registro consultado
		
		$sql = "SELECT * FROM usuario WHERE id=".$id;
		$registros = mysql_fetch_array(query($sql,0));
		return $registros;
		
	}
    
    function modificar($nombre,$pass,$mail,$id){	//Actualiza la base de datos con los datos enviados. Ademas actualiza el log
		$cambiapass="";
		if($pass<>''){
		  $cambiapass=",password='".$pass."'";
    
		}
		$sql = "UPDATE usuario SET nombre='".$nombre."', mail='".$mail."' ".$cambiapass." WHERE id=".$id;
		return query($sql,0,1);
		
	}
	
    function esAdmin($id){
        
        $sql = "SELECT admin FROM usuario WHERE id=".$id;
		$registros = mysql_fetch_array(query($sql,0));
		return $registros['admin'];	//devuelve la columna admin para los resultados obtenidos.
    }
    
    
    
}

?>