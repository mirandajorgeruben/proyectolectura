<?php 
include_once('servicio.php');

///////////// CLASE REGISTRO/////////////
class Usuarios {
	function traerUsuarios(){
		$sql = "SELECT * FROM usuario ";
		return query($sql,0);
	}
	
	function traerUsuario($id){
		$sql = "SELECT * FROM usuario WHERE id=".$id;
		return query($sql,0);
	}
	
	function traerUsuariosBusqueda($nombre){
		$sql = "SELECT * FROM usuario WHERE nombre LIKE '%".$nombre."%'";
		$result= query($sql,0);
		while($row = mysql_fetch_array($result)){
			echo '<div style="float:left;clear:both;width:400px;"><span style="float:left;margin-left:12px;cursor:pointer;" onclick="agregarUsuarioComoAmigo('.$row['id'].',\''.$row['nombre'].'\');"> Agregar como amigo a <b>'.$row['nombre'].'</b></span></div>';
		}
	
	}
	
	function traerAmistades($iduser){
		$sql = "SELECT * FROM amistad WHERE (id_usuario=".$iduser." or id_usuarioamigo=".$iduser.") and estado=1";
		$result = query($sql,0);
		while($row = mysql_fetch_array($result)){
			
			if($row['id_usuario']==$iduser){
				//Traigo el id del amigo
				$nombre = $this->traerUnNombreDeUsuario($row['id_usuarioamigo']);
				echo '<div style="float:left;clear:both;width:400px;"><span style="float:left;margin-left:12px;cursor:pointer;font-size:14px;" onclick="verListasDe('.$row['id_usuarioamigo'].');"> <b>'.$nombre.'</b> - Ver sus lista de libros</span><span id="listasUser'.$row['id_usuarioamigo'].'"></span></div>';
			}else{
				//Traigo el id del que me agregó como amigo
				$nombre = $this->traerUnNombreDeUsuario($row['id_usuario']);
				echo '<div style="float:left;clear:both;width:400px;"><span style="float:left;margin-left:12px;cursor:pointer;font-size:14px;" onclick="verListasDe('.$row['id_usuario'].');"> <b>'.$nombre.'</b> - Ver sus lista de libros</span><span id="listasUser'.$row['id_usuario'].'"></span></div>';
			}
			
			
		}
	}
	
	function confirmarAmistad($id){
		$sql = "UPDATE amistad SET estado=1 WHERE id=".$id;
		return query($sql,0,1);
	}
	
	function traerAmistadesPendientes($iduser){
		$sql = "SELECT * FROM amistad WHERE id_usuarioamigo=".$iduser." and estado=0";
		$result = query($sql,0);
		$cuenta=0;
		while($row = mysql_fetch_array($result)){
			$cuenta++;
			$nombre = $this->traerUnNombreDeUsuario($row['id_usuario']);
			
					
			
			
			echo '<div style="float:left;clear:both;width:400px;"><span style="float:left;margin-left:12px;cursor:pointer;font-size:14px;" onclick="confirmarAmigo('.$row['id'].');"> <b>'.$nombre.'</b> - Confirmar Solicitud</span></div>';
			
			
			
		}
		if($cuenta==0){
			echo '<div style="float:left;clear:both;width:400px;"><span style="float:left;margin-left:12px;cursor:pointer;font-size:14px;"> No tiene solicitudes pendientes </span></div>';
		}
		
	}
	
	
	
	
	function traerListaUsuario($id,$idusulogueado){
		$sql = "SELECT * FROM lista WHERE id_usuario=".$id." and (id_visibilidad=1 or id_visibilidad=2 )";
		$result = query($sql,0);
		$cuenta = 0;
		while($row = mysql_fetch_array($result)){
			if($row['id_visibilidad']==1){
			$cuenta++;
			
			$sql = "SELECT count(1) as cantidad FROM calificacion WHERE id_lista=".$row['id'];
			$result2= query($sql,0);
			
			while($row2 = mysql_fetch_array($result2)){
				$cant2 = $row2['cantidad'];
			}
			
			
			echo '<div style="float:left;clear:both;width:400px;"><span style="float:left;margin-left:12px;cursor:pointer;" onclick="visualizarLista('.$row['id'].');"> <b>'.$row['nombre'].'</b></span> <span onclick="votarLista('.$row['id'].')" style="cursor:pointer;margin-left:12px;">Votar <span id="cantVotosLista'.$row['id'].'" >('.$cant2.')</span></span><br /></div>';	
			}else{
				$sql = "SELECT * FROM compartido WHERE id_usuario=".$idusulogueado." and id_lista=".$row['id'];
				$result2 = query($sql,0);
				while($row2 = mysql_fetch_array($result2)){
					
					$sql = "SELECT count(1) as cantidad FROM calificacion WHERE id_lista=".$row['id'];
					$result3= query($sql,0);
					
					while($row3 = mysql_fetch_array($result3)){
						$cant3 = $row3['cantidad'];
					}
					
					
					echo '<div style="float:left;clear:both;width:400px;"><span style="float:left;margin-left:12px;cursor:pointer;" onclick="visualizarLista('.$row['id'].');"> <b>'.$row['nombre'].'</b></span> <span onclick="votarLista('.$row['id'].')" style="cursor:pointer;margin-left:12px;">Votar <span id="cantVotosLista'.$row['id'].'" >('.$cant3.')</span></span><br /></div>';
				}
			}
			
			
		}
		if($cuenta==0){
			echo '<div style="float:left;clear:both;width:400px;"><span style="float:left;margin-left:12px;cursor:pointer;">No tiene Listas creadas</span></div>';
		}
	}
	
	
	function agregarAmigo($idaagregar,$idagrega){
		$sql = "INSERT INTO amistad (id, id_usuario,id_usuarioamigo,estado) VALUES (0,".$idagrega.",".$idaagregar.",0)";
		return query($sql,0,1);
	}	
	
	
	function modificar($nombre,$pass,$mail,$id){
		
		$sql = "UPDATE usuario SET nombre='".$nombre."', mail='".$mail."' , password='".$pass."' WHERE id=".$id;
		return query($sql,0,1);
		
	}
	
	function eliminar($id,$elimina){
		
		$sql = "UPDATE usuario SET admin=".$elimina." WHERE id=".$id;
		return query($sql,0,1);
		
	}
	
	function traerUnNombreDeUsuario($id){
		$sql = "SELECT nombre FROM usuario where id=".$id;
		$result= query($sql,0);
		while($row = mysql_fetch_array($result)){
		 return $row['nombre'];
		}
	}
	
	function traerListaDeUnUsuario($id){
		$sql = "SELECT * FROM lista WHERE id_usuario=".$id;
		return query($sql,0);
	}
	
	
	
}

?>