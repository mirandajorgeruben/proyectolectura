<?php 

include_once('servicio.php');

///////////// CLASE audiolibro/////////////
class Audiolibro {
	function traerAudiolibros($busqueda){
		$sql = "SELECT * FROM audiolibro WHERE nombre LIKE '%".$busqueda."%'";
		$result= query($sql,0);
		while($row = mysql_fetch_array($result)){
			echo '<div style="float:left;clear:both;width:400px;"><span style="float:left;margin-left:12px;cursor:pointer;" onclick="sumarAudiolibro('.$row['id'].');">'.$row['nombre'].'</span></div>';
		}
	}
	
	function sumarAudiolibro($audiolibrosArr,$ultimoagregado){
		if($audiolibrosArr<>''){
			$arr = explode(',',$audiolibrosArr);
			for($i=0;$i<count($arr);$i++){
				//echo $arr[$i].'<br />';
				$sql = "SELECT * FROM audiolibro WHERE id=".$arr[$i];
				$result= query($sql,0);
				while($row = mysql_fetch_array($result)){
					echo '<span style="margin-right:20px;float:left;">'.$row['nombre'].'</span><span onclick="eliminarAudiolibro('.$row['id'].')" style="float:left;cursor:pointer;color:red;">Eliminar </span><br />';
				}
				
			}
		}else{
			echo 'No hay audiolibros agregados en la lista.';
		}
		
	}
	
	function crearLista($audiolibrosArr,$iduser,$nombrelista,$generolista,$idprivacidad){
		//
		$sql = "INSERT INTO lista (id,nombre,fecha,id_visibilidad,id_usuario,id_control,id_genero) 
				VALUES(0,'".$nombrelista."','".date('Y-m-d H:i:s')."',".$idprivacidad.",".$iduser.",1,".$generolista.")";
		$ultimoId =  query($sql,1,1);
		
		
		//
		$arr = explode(',',$audiolibrosArr);
		for($i=0;$i<count($arr);$i++){
			$sql = "INSERT INTO lista_audiolibro (id,id_audiolibro,id_lista) 
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
        $xmlconcatenado.='<playlist version="1" xmlns="http://xspf.org/ns/0/">';
            $xmlconcatenado.='<title>'.$nombreplaylist.'</title>';
            $xmlconcatenado.='<creator>'.$nombreuser.'</creator>';
            $xmlconcatenado.='<link></link>';
            $xmlconcatenado.='<info></info>';
            $xmlconcatenado.='<image></image>';
        	
            $xmlconcatenado.='<trackList>';
			
			
			for($i=0;$i<count($arr);$i++){
				$sql = "SELECT * FROM audiolibro WHERE id=".$arr[$i];
				$resultaudiolibro= query($sql,0);
				while($row = mysql_fetch_array($resultaudiolibro)){
				$nombreaudiolibro = $row['nombre'];
				$hash = $row['hash'];
				
				}
				
				$xmlconcatenado.='<track>';
                $xmlconcatenado.='<location>uploads/'.$hash.'.mp3</location>';
                $xmlconcatenado.='<creator>'.$nombreaudiolibro.'</creator>';
                $xmlconcatenado.='<album></album>';
                $xmlconcatenado.='<title>'.$nombreaudiolibro.'</title>';
                $xmlconcatenado.='<annotation></annotation>';
                $xmlconcatenado.='<duration></duration>';
                $xmlconcatenado.='<image></image>';
                $xmlconcatenado.='<info></info>';
                $xmlconcatenado.='<link></link>';
                $xmlconcatenado.='</track>';
				
			}
                
                
               
        
            $xmlconcatenado.='</trackList>';
        $xmlconcatenado.='</playlist>';
		
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
                        <span style="float:left;margin-left:12px;cursor:pointer;" onclick="reproducirLista('.$row['id'].');">'.$row['nombre'].'</span>
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
                                <span class="puntero" onclick="reproducirLista('.$row['id'].');">'.$row['nombre'].' </span> 
                            </td>
                            <td style="width: 100px;">
                                '.$nombreuser.'
                            </td>
                            <td style="width: 25px;">
                                <span  id="cantVotosPlay'.$row['id'].'">'.$votos.'</span>  
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
	
	function agregarReproduccion($idlista,$iduser){
		$sql = "INSERT INTO reproducido (id,fecha,id_lista,id_usuario) 
				VALUES(0,'".date('Y-m-d H:i:s')."',".$idlista.",".$iduser.")";
			    query($sql,1,1);
	}
	
	
	
	
	function traerTodosLosAudiolibros(){
		$sql = "SELECT t.nombre, t.fecha, i.nombre as autor, g.nombre as genero FROM audiolibro t inner join genero g ON t.id_genero=g.id inner join autor i ON t.id_autor = i.id";
		return query($sql,0);
	
	}
	
}

?>