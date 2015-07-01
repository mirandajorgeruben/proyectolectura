<?php 

include_once('servicio.php');

///////////// CLASE Autores////////////
class Autores {
	function traerAutores(){
		$sql = "SELECT * FROM autor";
		return query($sql,0);
	}
	
	function traerAutor($id){
		$sql = "SELECT * FROM autor where id=".$id;
		$result= query($sql,0);
		while($row = mysql_fetch_array($result)){
		 return $row['nombre'];
		}
	}
	
	
	function modificar($nombre,$id){
		
		$sql = "UPDATE autor SET nombre='".$nombre."' WHERE id=".$id;
		return query($sql,0,1);
		
	}
	
	
	function insertar($nombre){
		
		$sql = "INSERT INTO autor (id, nombre) VALUES (0,'".$nombre."')";
		return query($sql,0,1);
		
	}
	/*
	function eliminar($id,$elimina){
		
		$sql = "UPDATE usuario SET admin=".$elimina." WHERE id=".$id;
		return query($sql,0,1);
		
	}
	*/
}

?>