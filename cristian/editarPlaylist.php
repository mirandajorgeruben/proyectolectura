<?php session_start();?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/estilos_creacionpl.css"/>
<title id="title">Bienvenido a PowerLists</title>
</head>
<body>

<div id="header">
<a id="homelink" href="home.html"><img src="img/pl_logo2.png" id="logo" alt="powerlist"/></a> 
<span id="title">El sitio web de intercambio de playlists!</span>
</div>

<div id="container_left">
    <a href="home.php">home</a>
    <?php
    $conn = mysql_connect("localhost","root","");
    mysql_select_db("powerlists",$conn);
    
    $idPlaylist = $_GET["idPlaylist"];
    
    $query = "select p.nombre, g.nombre, p.categoria, p.tipo from Playlist p inner join Genero g on g.id_genero = p.id_genero where p.id_playlist = ".$idPlaylist.";";
    
    $resultado = mysql_query($query, $conn);
    
    $tabla = mysql_fetch_array($resultado);
    
    $query = "select nombre from Genero;";
    
    $resultado = mysql_query($query, $conn);
    
    echo "<form method='post' action='actualizarPlaylist.php?idPlaylist=".$idPlaylist."'>";
    echo "<div>Nombre: <input type='text' id='nombrePlaylist' name='nombrePlaylist' value='".$tabla[0]."' /></div>";
    echo "<div>Genero:"; 
    echo "<select id='generoPlaylist' name='generoPlaylist' value='".$tabla[1]."'>";
    while ($genero = mysql_fetch_array($resultado)){
        if ($genero[0] == $tabla[1])
            echo "<option value='".$genero[0]."' selected>".$genero[0]."</option>";
        else
            echo "<option value='".$genero[0]."'>".$genero[0]."</option>";
    }
    echo "</select>";
    echo "</div>";
    echo "<div>Categoria: <input type='text' id='categoriaPlaylist' name='categoriaPlaylist' value='".$tabla[2]."' /></div>";
    echo "<div>Tipo: <select id='tipoPlaylist' name='tipoPlaylist' value='".$tabla[3]."'>";
    if ($tabla[3] == "privada")
        echo "<option value='privada' selected>Privada</option>";
    else
        echo "<option value='privada'>Privada</option>";
     if ($tabla[3] == "publica")
        echo "<option value='publica' selected>Publica</option>";
    else
        echo "<option value='publica'>Publica</option>";
     if ($tabla[3] == "compartida")
        echo "<option value='compartida' selected>Compartida</option>";
    else
        echo "<option value='compartida'>Compartida</option>";
    echo "</select></div>";
    echo "<div><input type='submit' value='Guardar' id='button' /></div>";
    echo "</form>";
    
    mysql_close($conn);
    ?>
</div>
</body>
</html>