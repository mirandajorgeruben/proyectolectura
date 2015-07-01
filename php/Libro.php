<?php 
include_once('servicio.php');

///////////// CLASE LIBRO/////////////
class Libro {
	function traerLibros($busqueda){
		$sql = "SELECT * FROM libro WHERE nombre LIKE '%".$busqueda."%'";
		$result= query($sql,0);
		while($row = mysql_fetch_array($result)){
			echo '<div style="float:left;clear:both;width:400px;"><span style="float:left;margin-left:12px;cursor:pointer;" onclick="sumarLibro('.$row['id'].');">'.$row['nombre'].'</span></div>';
		}
	}
	
	function sumarLibro($librosArr,$ultimoagregado){
		if($librosArr<>''){
			$arr = explode(',',$librosArr);
			for($i=0;$i<count($arr);$i++){
				//echo $arr[$i].'<br />';
				$sql = "SELECT * FROM libro WHERE id=".$arr[$i];
				$result= query($sql,0);
				while($row = mysql_fetch_array($result)){
					echo '<span style="margin-right:20px;float:left;">'.$row['nombre'].'</span><span onclick="eliminarLibro('.$row['id'].')" style="float:left;cursor:pointer;color:red;">Eliminar </span><br />';
				}
				
			}
		}else{
			echo 'No hay libros agregados en la lista.';
		}
		
	}
	
	function crearLista($librosArr,$iduser,$nombrelista,$generolista,$idprivacidad){
		//Inserto los datos de la lista
		$sql = "INSERT INTO lista (id,nombre,fecha,id_visibilidad,id_usuario,id_control,id_genero) 
				VALUES(0,'".$nombrelista."','".date('Y-m-d H:i:s')."',".$idprivacidad.",".$iduser.",1,".$generolista.")";
		$ultimoId =  query($sql,1,1);
		
		
		//Inserto cada libro de la lista creada.
		$arr = explode(',',$listasArr);
		for($i=0;$i<count($arr);$i++){
			$sql = "INSERT INTO lista_libro (id,id_libro,id_lista) 
				VALUES(0,".$arr[$i].",".$ultimoId.")";
			    query($sql,1,1);
		
		}
		
		
		//Armo el XML.
		/**/
		$sql = "SELECT * FROM usuario WHERE id=".$iduser;
		$resultuser= query($sql,0);
		while($row = mysql_fetch_array($resultuser)){
		$nombreuser = $row['nombre'];
		}
		$xmlconcatenado = '';
		$xmlconcatenado.='<?xml version="1.0" encoding="UTF-8"?>';
        $xmlconcatenado.='<lista version="1" xmlns="http://xspf.org/ns/0/">';
            $xmlconcatenado.='<title>'.$nombrelista.'</title>';
            $xmlconcatenado.='<creator>'.$nombreuser.'</creator>';
            $xmlconcatenado.='<link></link>';
            $xmlconcatenado.='<info></info>';
            $xmlconcatenado.='<image></image>';
        	
            $xmlconcatenado.='<libList>';//tracking
			
			
			for($i=0;$i<count($arr);$i++){
				$sql = "SELECT * FROM libro WHERE id=".$arr[$i];
				$resultlibro= query($sql,0);
				while($row = mysql_fetch_array($resultlibro)){
				$nombrelibro = $row['nombre'];
				$hash = $row['hash'];
				
				}
				
				$xmlconcatenado.='<lib>';
                $xmlconcatenado.='<location>uploads/'.$hash.'.pdf</location>';
                $xmlconcatenado.='<creator>'.$nombrelibro.'</creator>';
                $xmlconcatenado.='<edito></edito>';
                $xmlconcatenado.='<title>'.$nombrelibro.'</title>';
                $xmlconcatenado.='<annotation></annotation>';
                $xmlconcatenado.='<pages></pages>';
                $xmlconcatenado.='<image></image>';
                $xmlconcatenado.='<info></info>';
                $xmlconcatenado.='<link></link>';
                $xmlconcatenado.='</lib>';
				
			}
                
                
               
        
            $xmlconcatenado.='</libList>';
        $xmlconcatenado.='</lista>';
		
		$ruta = "../listas/".$ultimoId.".xml";
		$fp = fopen($ruta,"a+");
		fwrite($fp, $xmlconcatenado);
		fclose($fp);
			
		/**/
		//Retorno un 1;
		return 1;
		
		
	}
	
	
	function traerLista($idUser){
		if($idUser<>0){
			$sql = "SELECT * FROM lista WHERE id_usuario=".$idUser;
			$result= query($sql,0);
			while($row = mysql_fetch_array($result)){
				echo '<div style="float:left;width:200px;">
                        <span style="float:left;margin-left:12px;cursor:pointer;" onclick="visualizarLista('.$row['id'].');">'.$row['nombre'].'</span>
                      </div>';
			}
		}else{
			$sql = "SELECT * FROM lista WHERE id_visibilidad=1";
			$result= query($sql,0);
			while($row = mysql_fetch_array($result)){
				
				$sql = "SELECT * FROM usuario WHERE id=".$row['id_usuario'];
				$resultuser= query($sql,0);
				while($rowuser = mysql_fetch_array($resultuser)){
					$nombreuser = $rowuser['nombre'];
				}
				
				$sql = "SELECT count(1) as cantidad FROM calificacion WHERE id_lista=".$row['id'];
				$resultvotos= query($sql,0);
				while($rowvotos = mysql_fetch_array($resultvotos)){
					$votos = $rowvotos['cantidad'];
				}
				
				
				echo '<div style="float:left;width:200px;">
                        <tr>
                             <td style="width: 100px;">
                                <span class="puntero" onclick="visualizarLista('.$row['id'].');">'.$row['nombre'].' </span> 
                            </td>
                            <td style="width: 100px;">
                                '.$nombreuser.'
                            </td>
                            <td style="width: 25px;">
                                <span  id="cantVotosLista'.$row['id'].'">'.$votos.'</span>  
                            </td>
                            <td style="width: 50px;">
                                <span id="btn" onclick="votarLista('.$row['id'].')">Votar</span>
                            </td>
                        </tr>
                           
                      </div>';
			}
		
		}
	}
	
	function traerUltimaLista($idUser){
		$sql = "SELECT * FROM lista WHERE id_usuario=".$idUser." ORDER BY id DESC LIMIT 1";
		$result= query($sql,0);
		while($row = mysql_fetch_array($result)){
			return $row['id'];
		}
	}
	
	function agregarVisualizacion($idlista,$iduser){
		$sql = "INSERT INTO visto (id,fecha,id_lista,id_usuario) 
				VALUES(0,'".date('Y-m-d H:i:s')."',".$idlista.",".$iduser.")";
			    query($sql,1,1);
	}
	
	function votarLista($idlista,$iduser){
		
		$sql = "SELECT count(1) as cantidad FROM calificacion WHERE id_usuario=".$iduser." and id_lista=".$idlista;
		$result= query($sql,0);
		while($row = mysql_fetch_array($result)){
			$cantidad =  $row['cantidad'];
		}
		
		if($cantidad==0){
		
			$sql = "INSERT INTO calificacion (id,puntuacion,comentario,id_usuario,id_lista) 
				VALUES(0,1,'',".$iduser.",".$idlista.")";
			query($sql,1,1);
			
			$sql = "SELECT count(1) as cantidad FROM calificacion WHERE id_lista=".$idlista;
			$resultvotos= query($sql,0);
			while($rowvotos = mysql_fetch_array($resultvotos)){
				$votos = $rowvotos['cantidad'];
			}
			echo $votos;
		}else{
		
			return 0;
		
		}
				
	
	}
	
	
	function traerTodosLosLibros(){
		$sql = "SELECT t.nombre, t.fecha, i.nombre as autor, g.nombre as genero FROM libro t inner join genero g ON t.id_genero=g.id inner join autor i ON t.id_autor = i.id";
		return query($sql,0);
	
	}
	
}

?>