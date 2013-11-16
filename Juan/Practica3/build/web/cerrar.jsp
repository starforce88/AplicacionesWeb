<%-- 
    Document   : cerrar
    Created on : 11/09/2013, 06:16:41 PM
    Author     : Starforce
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<%

  session.invalidate();//destruye la session
%>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="public/css/estilos.css" />
        <title>cerrer.jsp</title>
    </head>
    <body>
        <div class="wrapper">
            <div class="form1">
                <div class="formtitle">Cierre de Sesion</div>
                
                <div class="input">
                    <div class="inputcontent"> ABANDONO LA SESSION, PARA INGRESAR PRESIONE EL ENLACE DE ABAJO </div>
                </div>
                
                <div class="buttons">
                    <a href="index.jsp">INICIAR SESION</a>
                </div>
            </div>
        </div>
        
    </body>
</html>
