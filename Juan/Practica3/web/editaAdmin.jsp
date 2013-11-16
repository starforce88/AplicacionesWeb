<%-- 
    Document   : newjsp
    Created on : 26/09/2013, 03:41:08 AM
    Author     : Starforce
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<%

   String id = (String) request.getAttribute("id");
   String usuar = (String) request.getAttribute("usuario");
   String pass = (String) request.getAttribute("pass");
   String admin = (String) request.getAttribute("admin");
   String email = (String) request.getAttribute("mail");
   String nombre = (String) request.getAttribute("nombre");
   String paterno = (String) request.getAttribute("paterno");
   String materno = (String) request.getAttribute("materno");
   String sexo = (String) request.getAttribute("sexo");
   String fecha = (String) request.getAttribute("fecha");
   String ad;
   String s;
   if(admin.equals("1")){
       ad = "Si";
   }else{
       ad = "No";
   }
   
   if(sexo.equals("1")){
       s = "Masculino";
   }else{
       s = "Femenino";
   }
   request.setAttribute("id", id);
   
%>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="public/css/estilos.css" />
        <title>editaAdmin</title>
    </head>
    <div class="wrapper">
        <form method="post" action="ActualizarAdmin" onsubmit="return validaTodo(this)" class="form2">
                <div class="formtitle">Registro</div>
                
                <div class="input" style="display: none">
                    <div class="inputtext">id: </div>
                    <div class="inputcontent">
                        <input type="text" name="id" id="nombre" value="<%=id %>"/>
                    </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Nombre: </div>
                    <div class="inputcontent">
                        <input type="text" name="nombre" id="nombre" value="<%=nombre %>"/>
                    </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Apellido Paterno: </div>
                    <div class="inputcontent">
                        <input type="text" name="paterno" id="paterno" value="<%=paterno %>"/>
                    </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Apellido Materno: </div>
                    <div class="inputcontent">
                        <input type="text" name="materno" id="materno" value="<%=materno %>"/>
                    </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Usuario: </div>
                    <div class="inputcontent">
                        <input type="text" name="usuario" id="usuario" value="<%=usuar %>"/>
                    </div>
                </div>
                
                <div class="input">
                    <div class="inputtext">Correo Electronico: </div>
                    <div class="inputcontent">
                        <input type="text" name="mail" id="mail" value="<%=email %>"/>
                    </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Contraseña: </div>
                    <div class="inputcontent">
                        <input type="password" name="pass" id="password" value="<%=pass %>"/>
                    </div>
                </div>
                
                <div class="input">
                    <div class="inputtext">Sexo: </div> 
                    <div class="inputcontent">
                        <%if(s.equals("Masculino")){%>
                            <input type="radio" name="sexo" value="1" checked=""> M 
                            <input type="radio" name="sexo" value="0"> F 
                        <%}else{%>
                            <input type="radio" name="sexo" value="1"> M 
                            <input type="radio" name="sexo" value="0" checked=""> F 
                        <%}%>
                        
                    </div>
                </div>
                        
                <div class="input">
                    <div class="inputtext">Administrador: </div> 
                    <div class="inputcontent">
                        <%if(admin.equals("1")){%>
                            <input type="radio" name="admin" value="1" checked=""> Si 
                            <input type="radio" name="admin" value="0"> No
                        <%}else{%>
                            <input type="radio" name="admin" value="1"> Si
                            <input type="radio" name="admin" value="0" checked=""> No
                        <%}%>
                        
                    </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Fecha de Nacimiento: </div> 
                    <div class="inputcontent">
                        <input type="date" name="nac" id="nac" value="<%=fecha %>">
                    </div>
                </div>
            
                <div class="buttons">
                    <input type="submit" value="Actualizar" class="orangebutton"/>
                </div>
            </form>
        </div>
        
    </body>
</html>
