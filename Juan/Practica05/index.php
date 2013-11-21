<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="public/css/estilos.css" />
		<title>Pagina de inicio</title>
	</head>
<body>
	<div class="wrapper">
            <form method="post" action="acceso.php" class="form1">
                <div class="formtitle">Autenticacion</div>
                <div class="input">
                    <div class="inputtext">Usuario: </div>
                    <div class="inputcontent">
                        <input type="text" name="usuario" placeholder="Usuario"/>
                    </div>
                </div>
                
                <div class="input nobottomborder">
                    <div class="inputtext">Contraseña: </div>
                    <div class="inputcontent">
                        <input type="password" placeholder="Contraseña" name="contrasena"/>
                    </div>
                </div>
                <div class="buttons">
                    <input type="submit" value="Ingresar" class="orangebutton"/>    
                </div>    
                    
            </form>
            
            <form method="post" action="guardar.php" onsubmit="return validaTodo(this)" class="form2">
                <div class="formtitle">Registro</div>
            
                <div class="input">
                    <div class="inputtext">Nombre: </div>
                    <div class="inputcontent">
                        <input type="text" name="nombre" id="nombre"/>
                    </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Apellido Paterno: </div>
                    <div class="inputcontent">
                        <input type="text" name="paterno" id="paterno"/>
                    </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Apellido Materno: </div>
                    <div class="inputcontent">
                        <input type="text" name="materno" id="materno"/>
                    </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Usuario: </div>
                    <div class="inputcontent">
                        <input type="text" name="usuario" id="usuario"/>
                    </div>
                </div>
                
                <div class="input">
                    <div class="inputtext">Correo Electronico: </div>
                    <div class="inputcontent">
                        <input type="text" name="mail" id="mail"/>
                    </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Contraseña: </div>
                    <div class="inputcontent">
                        <input type="password" name="pass" id="password"/>
                    </div>
                </div>
                
                <div class="input">
                    <div class="inputtext">Sexo: </div> 
                    <div class="inputcontent">
                        <input type="radio" name="sexo" value="1"> M 
                        <input type="radio" name="sexo" value="0"> F 
                    </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Fecha de Nacimiento: </div> 
                    <div class="inputcontent">
                        <input type="date" name="nac" id="nac">
                    </div>
                </div>
            
                <div class="buttons">
                    <input type="submit" value="Registrar" class="orangebutton"/>
                </div>
            </form>
	</div>
</body>


</html>
