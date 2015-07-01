<!DOCTYPE html>
<html>
<head>
<link href="css/menu.css" type="text/css"  rel="stylesheet"/>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<!--[if lt IE 9]>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<script type="text/javascript" src="jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="jquery.fancybox.pack.js"></script>
<link rel="stylesheet" type="text/css" href="jquery.fancybox.css" media="screen" />
<script>
function abrirPopUp(linka){
window.open(linka,'','width=300, height=400');
}
</script>
</head>
<body>
    <div>
    <nav id="colorNav">
    	 <ul>
             <li >
        	   <a href="#" >Libreria</a>
            	  <ul>
                	 <!--<li><a onclick="abrirPopUp('subirpdf.php')">Subir pdf</a></li>-->
                      <li><a class="fancybox-manual-b" href="javascript:;" name="1">Subir PDF</a></li>
                	 <li><a onclick="refreshDivs('cuerpo','crearlista.php')">Crear Recopilacion</a></li>
            	 </ul>
             </li>
        	 <li >
        	   <a href="#" >Audiolistas</a>
            	 <ul>
                	 <li><a onclick="abrirPopUp('subirmp3.php')">Subir Audiolibro</a></li>
                	 <li><a onclick="refreshDivs('cuerpo','crearlista.php')">Crear Audiolista</a></li>
                     <li><a onclick="refreshDivs('cuerpo','editor/index.php')">Redactor</a></li>
                	 
            	 </ul>
             </li>

            <li>
            	 <a href="#" >Social</a>
            	 <ul>
                	 <li><a onclick="refreshDivs('cuerpo','social.php')">Buscar amigos</a></li>
                	 <li><a onclick="refreshDivs('cuerpo','amigos.php')">Mis amigos</a></li>
                 </ul>
        	</li>

			 <?php 
                //function esAdmin($id){
        
        //$sql = "SELECT admin FROM usuario WHERE id=".$id;
		//$registros = mysql_fetch_array(query($sql,0));
		//return $registros['admin'];	//devuelve la columna admin para los resultados obtenidos.
                include('php/Registro.php');

                $datos =  new Registro();
                $admin = $datos->esAdmin($_SESSION['login']); //obtiene los datos si el usuario esta en la columna "admin"
                
                if($admin==1){
                
             ?>

            <li >
            	 <a class="" href="#" >Administrar</a>
            	 <ul>
                	 <li><a onclick="abrirPopUp('admin/usuarios.php')">Usuarios</a></li>
                	 <li><a onclick="abrirPopUp('admin/libros.php')">Libros</a></li>
                    
                     <li><a onclick="abrirPopUp('admin/generos.php')">Generos</a></li>
                     <li><a onclick="abrirPopUp('admin/autores.php')">Autores</a></li>
            	 </ul>
        	 </li>
       		<?php 
               }
                
                ?>
          </ul>
        

        
</nav>
</div>
    
</body>
</html>
            
       
             
        	 
               
                
              
    	 
 