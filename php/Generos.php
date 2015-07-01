<?php 

include_once('servicio.php');

///////////// CLASE GENEROS////////////
class Generos {
	function traerGeneros(){
		$sql = "SELECT * FROM genero";
		return query($sql,0);
	}
	
	function traerGenero($id){
		$sql = "SELECT * FROM genero where id=".$id;
		$result= query($sql,0);
		while($row = mysql_fetch_array($result)){
		 return $row['nombre'];
		}
	}
	
	
	function modificar($nombre,$id){
		
		$sql = "UPDATE genero SET nombre='".$nombre."' WHERE id=".$id;
		return query($sql,0,1);
		
	}
	
	
	function insertar($nombre){
		
		$sql = "INSERT INTO genero (id, nombre) VALUES (0,'".$nombre."')";
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