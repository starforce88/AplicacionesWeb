<?php
//Proceso de conexión con la base de datos
$conex = mysql_connect("localhost", "admin", "admin")
		or die("No se pudo realizar la conexion");
	mysql_select_db("aplicaciones_web",$conex)
		or die("ERROR con la base de datos");

//Iniciar Sesión
session_start();

//Validar si se está ingresando con sesión correctamente
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

$id_usuario = $_SESSION['id_usuario'];

$consulta= "SELECT * FROM usuarios WHERE id='".$id_usuario."'"; 
$resultado= mysql_query($consulta,$conex) or die (mysql_error());
$fila=mysql_fetch_array($resultado);
$nombre = $fila['nombre'];
$paterno = $fila['a_paterno'];
$materno = $fila['a_materno'];
$usuario = $fila['username'];
$pass = $fila['pass'];
$sexo = $fila['sexo'];
$naci = $fila['f_nacimiento'];
$admin = $fila['admin'];
$id = $fila['id'];
$mail = $fila['email'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="public/css/estilos.css" />
	<title>Pagina de Usuario</title>
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
</head>
<body>
	<header class="formtitle1">
		<a href="editar.php">EDITAR INFORMACION </a>
	</header>
	
	<div class="wrapper">
            <div class="form1">
                <div class="formtitle">Datos de Mi pagina</div>
            
                <div class="input">
                    <div class="inputtext">id: </div>
                    <div class="inputcontent"> <?php echo $id ?> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Usuario: </div>
                    <div class="inputcontent"> <?php echo $usuario?> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Contraseña: </div>
                    <div class="inputcontent"> <?php echo $pass?> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Administrador: </div>
                    <div class="inputcontent"> 
					<?php 
						if($admin==1){
							echo SI;
						}else{
							echo NO;
						}
					?> 
					</div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Correo Electronico: </div>
                    <div class="inputcontent"> <?php echo $mail?> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Nombre: </div>
                    <div class="inputcontent"> <?php echo $nombre?> </div>
                </div>
                
                <div class="input">
                    <div class="inputtext">Apellido Paterno: </div>
                    <div class="inputcontent"> <?php echo $paterno?> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Apellido Materno: </div>
                    <div class="inputcontent"> <?php echo $materno ?> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Sexo: </div>
                    <div class="inputcontent"> 
					<?php 
						if($sexo==1){
							echo Masculino;
						}else{
							echo Femenino;
						}
					?> 
					</div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Fecha de Necimiento: </div>
                    <div class="inputcontent"> <?php echo $naci ?> </div>
                </div>
            
                <div class="buttons">
                    <a href="cerrar.php">CERRAR SESION</a>
                </div>
            </div>
        </div>
                
        <footer class="formtitle1">
            Ivan Lozada Mendez
        </footer>

</body>
</html>