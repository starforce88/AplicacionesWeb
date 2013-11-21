<?php
//Datos del servidor y base de datos
$server="localhost";
$username="admin";
$password="admin";
$database_name="aplicaciones_web";
//Establecemos la conexión con el servidor
$conexion=mysql_connect($server, $username, $password)
or die("Problemas al tratar de establecer la conexion");
//Seleccionamos la base de datos
$bd_sel=mysql_select_db($database_name) or die("Problemas al seleccionar la base de datos");
?>