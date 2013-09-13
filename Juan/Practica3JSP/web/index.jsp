<%-- 
    Document   : index
    Created on : 11/09/2013, 06:13:41 PM
    Author     : Starforce
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
        <link rel="stylesheet" href="public/css/estilos.css" />
        <script language="javascript" type="text/javascript">
            function validaTodo(formulario){
                var s="no";
                if(formulario.nombre.value == ''){
                    alert("Debe escribir su nombre")
                    return false
                }else if(formulario.paterno.value == ''){
                    alert("Debe escribir su Apellido Paterno")
                    return false
                }else if(formulario.materno.value == ''){
                    alert("Debe escribir su Apellido Materno")
                    return false
                }else if(formulario.usuario.value == ''){
                    alert("Debe escribir un Nombre de Usuario")
                    return false
                }else if(formulario.mail.value == '' || formulario.mail.value.indexOf("@")<0) {
                    alert("Debe escribir un Correo Electronico valido")
                    return false
                }else if(formulario.nac.value == ''){
                    alert("Debe introducir su fecha de nacimiento")
                    return false
                }else if(formulario.pass.value == ''){
                    alert("Debe ingresar contraseña")
                    return false
                }
            }
        </script>
    </head>
    <body>
        <div class="wrapper">
            <form method="post" action="ingreso" class="form1">
                <div class="formtitle">Autenticacion</div>
                <div class="input">
                    <div class="inputtext">Usuario: </div>
                    <div class="inputcontent">
                        <input type="text" name="usu" placeholder="Usuario"/>
                    </div>
                </div>
                
                <div class="input nobottomborder">
                    <div class="inputtext">Contraseña: </div>
                    <div class="inputcontent">
                        <input type="password" placeholder="Contraseña" name="pass"/>
                    </div>
                </div>
                <div class="buttons">
                    <input type="submit" value="Ingresar" class="orangebutton"/>    
                </div>    
                    
            </form>
        </div>
        
        
        
        
        <form method="post" action="Registra" onsubmit="return validaTodo(this)" class="form2">
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
                    <input type="radio" name="sexo" value="masculino"> M 
                    <input type="radio" name="sexo" value="femenino"> F 
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
        
    </body>
</html>
