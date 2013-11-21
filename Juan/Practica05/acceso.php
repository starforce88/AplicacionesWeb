<?php 
//Proceso de conexión con la base de datos
$conex = mysql_connect("localhost", "admin", "admin")
		or die("No se pudo realizar la conexion");
	mysql_select_db("aplicaciones_web",$conex)
		or die("ERROR con la base de datos");

//Inicio de variables de sesión
if (!isset($_SESSION)) {
  session_start();
}

//Recibir los datos ingresados en el formulario
$usuario= $_POST['usuario'];
$contrasena= $_POST['contrasena'];

//Consultar si los datos son están guardados en la base de datos
$consulta= "SELECT * FROM usuarios WHERE username='".$usuario."' AND pass='".$contrasena."'"; 
$resultado= mysql_query($consulta,$conex) or die (mysql_error());
$fila=mysql_fetch_array($resultado);


if (!$fila[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
{
	echo '<script language = javascript>
	alert("Usuario o Password errados, por favor verifique.")
	self.location = "index.php"
	</script>';
}
else if($fila[3]==0)//opcion2: Usuario logueado correctamente
{
	//Definimos las variables de sesión y redirigimos a la página de usuario
	$_SESSION['id_usuario'] = $fila['id'];
	$_SESSION['nombres'] = $fila['nombre'];
	$_SESSION['paterno'] = $fila['a_paterno'];
	$_SESSION['materno'] = $fila['a_materno'];
	$_SESSION['admin'] = $fila['admin'];
	$_SESSION['usuario'] = $fila['username'];
	$_SESSION['sexo'] = $fila['sexo'];
	$_SESSION['pass'] = $fila['pass'];
	$_SESSION['mail'] = $fila['email'];
	$_SESSION['nac'] = $fila['f_nacimiento'];

	header("Location: usuario.php");
}
else
{
	//Definimos las variables de sesión y redirigimos a la página de usuario
	$_SESSION['id_usuario'] = $fila['id'];
	$_SESSION['nombres'] = $fila['nombre'];
	$_SESSION['paterno'] = $fila['a_paterno'];
	$_SESSION['materno'] = $fila['a_materno'];
	$_SESSION['admin'] = $fila['admin'];
	$_SESSION['usuario'] = $fila['username'];
	$_SESSION['sexo'] = $fila['sexo'];
	$_SESSION['pass'] = $fila['pass'];
	$_SESSION['mail'] = $fila['email'];
	$_SESSION['nac'] = $fila['f_nacimiento'];
	header("Location: administrador.php");
}
?>