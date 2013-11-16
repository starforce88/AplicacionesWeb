<%-- 
    Document   : editar
    Created on : 14/09/2013, 12:11:40 AM
    Author     : Starforce
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<%

   String id = (String) session.getAttribute("id");
   String usuar = (String) session.getAttribute("usuario");
   String pass = (String) session.getAttribute("pass");
   String admin = (String) session.getAttribute("admin");
   String email = (String) session.getAttribute("mail");
   String nombre = (String) session.getAttribute("nombre");
   String paterno = (String) session.getAttribute("paterno");
   String materno = (String) session.getAttribute("materno");
   String sexo = (String) session.getAttribute("sexo");
   String fecha = (String) session.getAttribute("fecha");
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
        <title>editar.jsp</title>
    </head>
    <body>
        
        <div class="wrapper">
        <form method="post" action="Actualizar" onsubmit="return validaTodo(this)" class="form2">
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
                            <input type="radio" name="sexo" value="masculino" checked=""> M 
                            <input type="radio" name="sexo" value="femenino"> F 
                        <%}else{%>
                            <input type="radio" name="sexo" value="masculino"> M 
                            <input type="radio" name="sexo" value="femenino" checked=""> F 
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
