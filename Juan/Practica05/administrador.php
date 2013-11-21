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

$consulta1= "SELECT * FROM usuarios"; 
$resultado1= mysql_query($consulta1,$conex) or die (mysql_error());
$todos=mysql_fetch_array($resultado1);

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
		<?php
		if($todos=mysql_fetch_array($resultado1)){
		echo "<div class='form3'>";
                echo "<div class='formtitle'>Usuarios</div>";
                echo "<table border=\'1\'>";
                    echo "<tr>";
                        echo "<td>Id</td>";
                        echo "<td>Nombre</td>";
                        echo "<td>Apellido Paterno</td>";
                        echo "<td>Apellido Materno</td>";
                        echo "<td>Usuario</td>";
                        echo "<td>Correo</td>";
                        echo "<td>Admin</td>";
                        echo "<td>Fecha de Nac</td>";
                        echo "<td>Sexo</td>";
                    echo "</tr>";
					
					
						
                
			do{
				echo "<tr> ";
					echo "<td>".$todos["id"]."</td> ";
					echo "<td>".$todos["nombre"]."</td> ";
					echo "<td>".$todos["a_paterno"]."</td> ";
					echo "<td>".$todos["a_materno"]."</td> ";
					echo "<td>".$todos["username"]."</td> ";
					echo "<td>".$todos["email"]."</td> ";
					if($todos["admin"]==1){
						echo "<td>SI</td>";
					}else{
						echo "<td>NO</td>";
					}
					echo "<td>".$todos["f_nacimiento"]."</td> ";
					if($todos["sexo"]==1){
						echo "<td>Masculino</td> ";
					}else{
						echo "<td>Femenino</td> ";
					}
					echo "<td><a href=modificar.php?id=".$todos["id"]."&nombre=".$todos[nombre]."&paterno=".$todos[a_paterno].
					"&materno=".$todos[a_materno]."&usuario=".$todos[username]."&mail=".$todos[email].
					"&admin=".$todos[admin]."&nac=".$todos[f_nacimiento]."&sexo=".$todos[sexo].">Editar</a></td>";
					
				echo "</tr> ";
			}while ($todos = mysql_fetch_array($resultado1));
				echo "</table>";
				echo "</table> ";
				echo "</table>";
            echo "</div>";
		} else {
			echo "'Aún no hay datos que mostrar'";
		}

		
			?>
        <footer class="formtitle1">
            Ivan Lozada Mendez
        </footer>

</body>
</html>