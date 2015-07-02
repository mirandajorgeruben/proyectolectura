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
    <form method="post" action="insertarPlaylist.php">
        <div>Nombre: <input type="text" id="nombrePlaylist" name="nombrePlaylist" /></div>
        <div>Genero: 
            <select id="generoPlaylist" name="generoPlaylist">
            <?php
                $conn = mysql_connect("localhost","root","");
                mysql_select_db("powerlists",$conn);
                
                $query = "select nombre from Genero;";
                
                $resultado = mysql_query($query, $conn);
    
                while ($genero = mysql_fetch_array($resultado)){
                        echo "<option value='".$genero[0]."'>".$genero[0]."</option>";
                }
                mysql_close($conn);
            ?>
            </select>
        </div>
        <div>Categoria: <input type="text" id="categoriaPlaylist" name="categoriaPlaylist"/></div>
        <div>Tipo: <select id="tipoPlaylist" name="tipoPlaylist"><option value="privada">Privada</option><option value="publica">Publica</option><option value="compartida">Compartida</option></select></div>
        <div><input type="submit" value="Crear" id="button"/></div>
    </form>
</div>

<div id="footer">
</div>

</body>
</html>