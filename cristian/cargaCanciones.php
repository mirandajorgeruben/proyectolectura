<html>
<head>
<link rel="stylesheet" type="text/css" href="css/estilos_creacionpl.css"/>
<title id="title">Bienvenido a PowerLists</title>
</head>
<body>

<div id="header">
<a id="homelink" href="home.php"><img src="img/pl_logo2.png" id="logo" alt="powerlist"/></a> 
<span id="title">El sitio web de intercambio de playlists!</span>
</div>

<div id="container_left">
<form action="cargarCancion.php" method="post" enctype="multipart/form-data">
<input type="file" name="file"/><br/>
<input type="submit" value="Subir MP3" id="button" />
</form>
</div>
</body>
</html>