<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="public/css/estilos.css" />
		<title>Pagina de inicio</title>
	</head>
<body>
	<?php
		$id=$_GET['id'];
		$nombre=$_GET['nombre'];
		$paterno=$_GET['paterno'];
		$materno=$_GET['materno'];
		$usuario=$_GET['usuario'];
		$mail=$_GET['mail'];
		$admin=$_GET['admin'];
		$sexo=$_GET['sexo'];
		$naci=$_GET['nac'];
		
	?>
	<div class="wrapper">

        <form method="post" action="actualizaAd.php" onsubmit="return validaTodo(this)" class="form2">
                <div class="formtitle">Registro</div>
                
                <div class="input" style="display: none">
                    <div class="inputtext">id: </div>
                    <div class="inputcontent">
                        <input type="text" name="id" id="nombre" value=" <?php echo $id ?>"/>
                    </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Nombre: </div>
                    <div class="inputcontent">
                        <input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>" />
                    </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Apellido Paterno: </div>
                    <div class="inputcontent">
                        <input type="text" name="paterno" id="paterno" value="<?php echo $paterno ?>"/>
                    </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Apellido Materno: </div>
                    <div class="inputcontent">
                        <input type="text" name="materno" id="materno" value="<?php echo $materno ?>"/>
                    </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Usuario: </div>
                    <div class="inputcontent">
                        <input type="text" name="usuario" id="usuario" value="<?php echo $usuario ?>"/>
                    </div>
                </div>
                
                <div class="input">
                    <div class="inputtext">Correo Electronico: </div>
                    <div class="inputcontent">
                        <input type="text" name="mail" id="mail" value="<?php echo $mail ?>"/>
                    </div>
                </div>
            
                
                
                <div class="input">
                    <div class="inputtext">Sexo: </div> 
                    <div class="inputcontent">
                        <?php
							if($sexo==1){
								echo "<input type='radio' name='sexo' value='1' checked> M ";
								echo "<input type='radio' name='sexo' value='0'> F ";
							}else{
								echo "<input type='radio' name='sexo' value='1'> M ";
								echo "<input type='radio' name='sexo' value='0' checked> F ";
							}
						?>
                            
                        
                    </div>
                </div>
				
				<div class="input">
                    <div class="inputtext">Administrador: </div> 
                    <div class="inputcontent">
                        <?php
							if($sexo==1){
								echo "<input type='radio' name='admin' value='1' checked> SI ";
								echo "<input type='radio' name='admin' value='0'> NO ";
							}else{
								echo "<input type='radio' name='admin' value='1'> SI ";
								echo "<input type='radio' name='admin' value='0' checked> NO ";
							}
						?>
                            
                        
                    </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Fecha de Nacimiento: </div> 
                    <div class="inputcontent">
                        <input type="date" name="nac" id="nac" value="<?php echo $naci ?>">
                    </div>
                </div>
            
                <div class="buttons">
                    <input type="submit" value="Actualizar" class="orangebutton"/>
                </div>
            </form>
        </div>
                
        <footer class="formtitle1">
            Ivan Lozada Mendez
        </footer>


</html>
