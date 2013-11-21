<?php
$nombre=$_POST['nombre'];
$paterno=$_POST['paterno'];
$materno=$_POST['materno'];
$mail=$_POST['mail'];
$pass=$_POST['pass'];
$usuario=$_POST['usuario'];
$nac=$_POST['nac'];
$sexo=$_POST['sexo'];
include("configuracion.php");
$query="select username from Usuarios where username='".$usuario."'";
$result=mysql_query($query) or die("Error en la instruccion SQL");
if (mysql_num_rows($result) > 0) {
echo "El registro ya se encuentra insertado </br>";
echo "<a href=index.php>Regresar</a>";
} elseif (mysql_num_rows($result) == 0) {
$query="INSERT INTO usuarios (username, pass, admin, email, nombre, a_paterno, a_materno, sexo, f_nacimiento)
values('$usuario','$pass',0,'$mail','$nombre','$paterno','$materno',$sexo,'$nac')";
$result=mysql_query($query) or die("Error ejecutar la instrucción SQL ".mysql_error());
echo "Registro guardado<br/>";
echo "<a href=index.php>Regresar</a>";
mysql_close();
}
?>