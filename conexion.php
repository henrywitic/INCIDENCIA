<?php
	//Configuracion de la conexion a base de datos
	$conbd = pg_connect("host=127.0.0.1 port=5432 dbname=bdincidencia user=postgres password=123456") or die(pg_last_error());
?>
