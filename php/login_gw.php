<?php

include_once('servicio.php');

echo(login($_POST['username'], $_POST['password']));

?>