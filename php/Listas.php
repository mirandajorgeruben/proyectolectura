<?php 

include_once('servicio.php');

///////////// CLASE listas////////////
class Listas {
	function traerListas($busqueda=NULL){
		if($busqueda==NULL){		
			$sql = "SELECT * FROM lista";
			return query($sql,0);
		}
		if($busqueda<>NULL) {
			$sql = "SELECT * FROM lista WHERE nombre LIKE '%".$busqueda."%'";
			$result= query($sql,0);
			while($row = mysql_fetch_array($result)){
				echo '<div style="float:left;clear:both;"><span style="float:left;margin-left:12px;cursor:pointer;" onclick="agregarLista('.$row['id'].');">'.$row['nombre'].'</span></div>';
			}	
		}
	}
	
	function sumarLista($listaArr,$ultimoagregadop){
		if($listaArr<>''){
			$arr = explode(',',$listaArr);
			for($i=0;$i<count($arr);$i++){
				//echo $arr[$i].'<br />';
				$sql = "SELECT * FROM lista WHERE id=".$arr[$i];
				$result= query($sql,0);
				while($row = mysql_fetch_array($result)){
					echo '<span onclick="reproducirLista('.$row['id'].')">'.$row['nombre'].'</span><span onclick="quitarLista('.$row['id'].')" style="float:left;cursor:pointer;color:red;">Eliminar </span><br />';
				}
				
			}
		}else{
			echo 'No hay Listas agregadas';
		}
		
	}
	
	function agregarReproduccion($idlista,$iduser){
		$sql = "INSERT INTO reproducido (id,fecha,id_lista,id_usuario) 
				VALUES(0,'".date('Y-m-d H:i:s')."',".$idlista.",".$iduser.")";
			    query($sql,1,1);
	}
	
	function banear($id,$estado){
		$sql = "UPDATE lista SET id_visibilidad=".$estado." WHERE id=".$id;
		return query($sql,0,1);
	}
	
	function traeAudiolibrosLista($id){
		$sql = "SELECT * FROM lista_audiolibro WHERE id_lista=".$id;
		$result= query($sql,0);
		$audiolibros = '';
		while($row = mysql_fetch_array($result)){
			$audiolibros .= $this->traerNombreAudiolibro($row['id_audiolibro']);
		}
		return $audiolibros;
	}
	
	function traerNombreAudiolibro($idaudiolibro){
		$sql = "SELECT nombre FROM audiolibro WHERE id=".$idaudiolibro;
		$result= query($sql,0);
		
		while($row = mysql_fetch_array($result)){
			$audiolibro = ' &bull; '.$row['nombre'];
		}
		return $audiolibro;
	
	}
	
	function cantidadAudiolibrosLista($id){
		$sql = "SELECT count(1) as cantidad FROM lista_audiolibro WHERE id_lista=".$id;
		$result= query($sql,0);
		
		while($row = mysql_fetch_array($result)){
			$cant = $row['cantidad'];
		}
		return $cant;
	}

}

?>