<?php session_start(); ?>
<html>
<head>
<style type="text/css">
#tabs div{
    float:left;
    border: 1px solid black;
    cursor: pointer;
}

#usuarios {
    display: block;
}

#playlists {
    display: none;
}

#canciones {
    display: none;
}
</style>
<script type="text/javascript">
function menu(tab){
    var usuarios = document.getElementById("usuarios");
    var playlists = document.getElementById("playlists");
    var canciones = document.getElementById("canciones");
    
    usuarios.style.display = tab == 'usuarios' ? 'block' : 'none';
    playlists.style.display = tab == 'playlists' ? 'block' : 'none';
    canciones.style.display = tab == 'canciones' ? 'block' : 'none';
}
</script>
</head>
<body>
<div>
    <a href="home.php">home</a>
    <div id="tabs">
        <div id="tabUsuarios" onclick="menu('usuarios');">Usuarios</div>
        <div id="tabPlaylist" onclick="menu('playlists');">Playlists</div>
        <div id="tabCanciones" onclick="menu('canciones');">Canciones</div>
    </div>
    <div id="usuarios">
        <div>
            <form action="#" method="post">
                <input type="text" name="usuario" />
                <input type="submit" value="Buscar" />
            </form>
            <table border="1">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                <?php            
                    $conn = mysql_connect("localhost","root","");
                    mysql_select_db("powerlists",$conn);
                    
                    $usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
                    
                    $query = "select id_usuario, nombre_usuario, nombre, apellido, email, rol from Usuario where nombre_usuario like '%".$usuario."%' and id_usuario != ".$_SESSION["idUsuarioLogueado"].";";
                    
                    $resultado = mysql_query($query, $conn);
                    
                    while($tabla = mysql_fetch_array($resultado)){
                    	echo "<tr>";
                    	echo "<td>".$tabla[1]."</td>";
                    	echo "<td>".$tabla[2]."</td>";
                    	echo "<td>".$tabla[3]."</td>";
                    	echo "<td>".$tabla[4]."</td>";
                        echo "<td><a href='borrarUsuario.php?IdUsuario=".$tabla[0]."'>borrar</a></td>";
                        if ($tabla[5] == "usuario")
                            echo "<td><a href='actualizarPermisos.php?IdUsuario=".$tabla[0]."&Rol=administrador'>hacer admin</a></td>";
                        else
                            echo "<td><a href='actualizarPermisos.php?IdUsuario=".$tabla[0]."&Rol=usuario'>hacer usuario</a></td>";
                    	echo "</tr>";
                    }
                    
                    mysql_close($conn);
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="playlists">
        <div>
            <form action="#" method="post">
                <input type="text" name="playlist" />
                <input type="submit" value="Buscar" />
            </form>
            <table border="1">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Genero</th>
                        <th>Categoria</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <tbody>
                <?php            
                    $conn = mysql_connect("localhost","root","");
                    mysql_select_db("powerlists",$conn);
                    
                    $playlist = isset($_POST["playlist"]) ? $_POST["playlist"] : "";
                    
                    $query = "select p.id_playlist, p.nombre, g.nombre, p.categoria, p.tipo from Playlist p inner join Genero g on g.id_genero = p.id_genero where p.nombre like '%".$playlist."%';";
                    
                    $resultado = mysql_query($query, $conn);
                    
                    while($tabla = mysql_fetch_array($resultado)){
                    	echo "<tr>";
                    	echo "<td>".$tabla[1]."</td>";
                    	echo "<td>".$tabla[2]."</td>";
                    	echo "<td>".$tabla[3]."</td>";
                    	echo "<td>".$tabla[4]."</td>";
                	    echo "<td><a href='borrarPlaylist.php?idPlaylist=".$tabla[0]."&cod=3'>borrar</a></td>";
                    	echo "</tr>";
                    }
                    
                    mysql_close($conn);
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="canciones">
        <div>
            <form action="#" method="post">
                <input type="text" name="usuario" />
                <input type="submit" value="Buscar" />
            </form>
            <table border="1">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                <?php            
                    $conn = mysql_connect("localhost","root","");
                    mysql_select_db("powerlists",$conn);
                    
                    $usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
                    
                    $query = "select nombre_usuario, nombre, apellido, email from Usuario where nombre_usuario like '%".$usuario."%';";
                    
                    $resultado = mysql_query($query, $conn);
                    
                    while($tabla = mysql_fetch_array($resultado)){
                    	echo "<tr>";
                    	echo "<td>".$tabla[0]."</td>";
                    	echo "<td>".$tabla[1]."</td>";
                    	echo "<td>".$tabla[2]."</td>";
                    	echo "<td>".$tabla[3]."</td>";
                    	echo "</tr>";
                    }
                    
                    mysql_close($conn);
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>