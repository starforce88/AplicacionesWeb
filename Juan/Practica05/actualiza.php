<?php
$nombre=$_POST['nombre'];
$paterno=$_POST['paterno'];
$materno=$_POST['materno'];
$mail=$_POST['mail'];
$pass=$_POST['pass'];
$usuario=$_POST['usuario'];
$nac=$_POST['nac'];
$sexo=$_POST['sexo'];
$id=$_POST['id'];
include("configuracion.php");
$query="UPDATE usuarios SET username = '".$usuario."', pass = '".$pass.
                    "', email = '".$mail."', nombre = '".$nombre."', a_paterno = '".$paterno.
                    "', a_materno ='".$materno."', sexo =".$sexo.", f_nacimiento = '".$nac."' WHERE id=".$id;
$result=mysql_query($query) or die("Error ejecutar la instrucción SQL ".mysql_error());
echo "Registro actualizado<br/>";
echo "<a href=usuario.php>Regresar</a>";
mysql_close();

?>