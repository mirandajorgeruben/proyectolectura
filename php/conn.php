<?php

//$conex = mysql_connect('190.228.29.195', 'pci', 'pci2012') or die ('cannot reach database');
//$conex = mysql_connect('mysql.spider-investments.com', 'spidergoldenberg', 'QXbZFiBy') or die ('cannot reach database');
//$db = mysql_select_db("spiderinvestments") or die ("this is not a valid database");

$conex = mysql_connect('localhost', 'root', '') or die ('cannot reach database'); 
$db = mysql_select_db("audio") or die ("this is not a valid database");
?>
