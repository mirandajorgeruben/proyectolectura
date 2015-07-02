<link href="css/cuerpo.css" type="text/css"  rel="stylesheet"/>
<link href="css/crearlista.css" type="text/css"  rel="stylesheet"/>
       <div id="columna_izq">
            <h4>Buscar</h4> aaa
            <div class="cont">
                <label style="margin-left:10px;">Ingrese una búsqueda en el campo.</label>
                <input type="text" id="audiolibro" />
            </div>
            <a onClick="buscar();" id="btn" style="margin-left:10px;">Buscar</a>     
            <h4>Resultados encontrados:</h4>
            <div id="audiolibrosencontrados">	
                
            </div>
        </div>
        <div id="columna_centro">
       	    <h4>Libros agregados en la lista</h4>
            <div id="audiolibrossumados">
                No hay libros agregados
             </div>
                asdasd
                
            
        </div>      
    	<div id="columna_der">
            	<h5>Ingrese los datos para completar la lista.</h5>
                <div class="cont">
                    <label style="margin-left:10px;">Nombre: </label>
                    <br />
                     <input type="text" id="nombrelista" id="libro" />                
                </div>
                <div class="cont">
                    <label style="margin-left:10px;">G&eacute;nero: </label>
                    <br />
                    <select id="generolista" id="libro" >
                    	<?php 
                            include('php/servicio.php');
        					$sql = "SELECT * FROM genero";
        					$result= query($sql,0);
        					while($row = mysql_fetch_array($result))
                                {echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
        						}
        			     ?>
                    </select>
                </div>
                <div class="cont">
                    <label style="margin-left:10px;">Privacidad: </label>
                    <br />
                    
                    
                    <select id="privacidadlista"  onchange="preguntosicomparte();">
                   	    <option value="0">Privada (sólo yo)</option>
                        <option value="1">Pública</option>
                        <option value="2">Compartida</option>
                    </select>
                    
                    <br />
                    <div id="DivCompartir" style="display:none;">
                    <label style="margin-left:10px;">Compartir con: </label>
                    <br />
                    <select id="compartidaconamigos" name="compartidaconamigos" multiple height="40">
                    	 <?php 
                            @session_start();
							$sql = "SELECT * FROM amistad where (id_usuario=".$_SESSION['login']." or id_usuarioamigo=".$_SESSION['login'].") and estado =1";
        					$result= query($sql,0);
        					while($row = mysql_fetch_array($result))
                                {
									
									
									
									
									if($row['id_usuario']==$_SESSION['login']){
										$sql = "SELECT * FROM usuario where id=".$row['id_usuarioamigo'];
										$result2= query($sql,0);
										while($row2 = mysql_fetch_array($result2)){
											$nombre = $row2['nombre'];
										}
									
										echo '<option value="'.$row['id_usuarioamigo'].'">'.$nombre.'</option>';
									}else{
										$sql = "SELECT * FROM usuario where id=".$row['id_usuario'];
										$result2= query($sql,0);
										while($row2 = mysql_fetch_array($result2)){
											$nombre = $row2['nombre'];
										}
										echo '<option value="'.$row['id_usuario'].'">'.$nombre.'</option>';
									}
								}
        			     ?>
                    </select>
                    <span onclick="verdatosmultipleselect();">tomar datos multiple select</span>
                    </div>
                           
               	<span onClick="grabarLista();" id="btn" style="margin-left:10px;">
                    Grabar Lista
                </span>
                <div id="validacion" style="float:left;clear:both;width:350px;">
                    &nbsp;
                </div>
        </div>
        
    
