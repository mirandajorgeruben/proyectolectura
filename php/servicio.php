<?php


/*----------------------------------------------------------------------
FUNCION QUERY: Sirve para regresar el último id inserto. 
Chequea además si hubo un error al realizar cualquier tipo de consulta
----------------------------------------------------------------------*/

function query ($sql, $accion, $log=0){	// se envia la consulta, la accion, y opcional se harcodea si se quiere un log

	include('conn.php');

	if($log){

		$arch=fopen("log.txt",'a');

		fwrite($arch,$sql);

		fclose($arch);

	}

	$result= mysql_query($sql,$conex);	//retorna verdadero si fue exitoso la consulta enviada(resulset). Retorna falso si fallo

	if ($accion && $result){

			$result= mysql_insert_id();	//devuelve el último id
										//Dependiendo de la accion si es exitoso retorna el último id insertado ó todo el resultado de la consulta
	} 

	mysql_close($conex);	

	return $result;		//devuelve el último id ó el array

}

/*----------------------------------------------------------------------
FUNCION isLog: Chequea si el usuario está logueado. Devuelve uno si lo está.
Devuelve 0 si no lo está
----------------------------------------------------------------------*/

function isLog(){

	session_start();

	if(isset($_SESSION["login"]) and $_SESSION["login"]==1){

		return 1;

	} else {

		return 0;

	}

}



function CursorToXml($result){

	$final = "";

	$ncampos=mysql_num_fields($result);

	$final=$final . '<?xml version="1.0" encoding="UTF-8"?>'.chr(13);

	$final=$final . "<lista>".chr(13);

	while ($registro = mysql_fetch_array($result)) {

		$final=$final . "<registro>".chr(13);

		$i=0;

		for($i;$i<$ncampos;$i++){

			if(substr(mysql_field_name($result,$i),0,1)=='c'){

				$final=$final . '<' . mysql_field_name($result,$i) . '><![CDATA['. utf8_encode($registro[$i]).']]></' . mysql_field_name($result,$i) . '>'.chr(13);

			} else {

				$final=$final . '<' . mysql_field_name($result,$i) . '>'. utf8_encode($registro[$i]).'</' . mysql_field_name($result,$i) . '>'.chr(13);

			}

		}

		$final=$final . "</registro>".chr(13);

	}

	$final=$final . "</lista>".chr(13);

	mysql_free_result($result);

	return $final;

}



function ValorToXml($val){

	$final = "";

	$final=$final . '<?xml version="1.0" encoding="UTF-8"?>'.chr(13);

	$final=$final . "<registro>".chr(13);

	$final=$final . "<valor>".$val."</valor>".chr(13);

	$final=$final . "</registro>".chr(13);

	return $final;

}

/*----------------------------------------------------------------------
FUNCION login: chequea la existencia del usuario y password.
Si el usuario es Valido lo loguea, seteando las variables globales en "login"
con el id de usuario, y "usuario" con el mail del usuario
----------------------------------------------------------------------*/


function login($username, $password){

	session_start();

	$sql = 'SELECT * FROM usuario WHERE mail = "' . $username . '" AND password = "' . $password . '"';		//string para la consulta del usuario y password

	$log=query($sql,0);	//Devuelve el resultado de la consulta si la consulta fue exitosa, o FALSE si no lo fue

//Empieza a procesar la consulta

	if(mysql_num_rows($log)>0){	//Pregunta si fue exitosa
		
		while ($registro = mysql_fetch_array($log)) {	//Procesa las filas
			$idusuario = $registro[0];		
		}		
		
		$_SESSION["login"]=$idusuario;	//Setea la variable global login con el ID de usuario

		$_SESSION["usuario"]=$username;	//Setea la variable global con el mail del usuario

		return(1);

	} else {

		//Si la consulta falla, cambia las variables globales a 0 y sin usuario
		$_SESSION["login"]=0;

		$_SESSION["usuario"]='';

		return(0);

	}

}



function chequeaLogin(){

	session_start();

	if(isset($_SESSION["login"]) and $_SESSION["login"]==1){

		return(1);

	} else {

		return(0);

	}

}



?>