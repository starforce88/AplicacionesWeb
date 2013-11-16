<%-- 
    Document   : principal
    Created on : 11/09/2013, 06:14:41 PM
    Author     : Starforce
--%>

<%@page import="java.sql.Statement"%>
<%@page import="java.sql.Connection"%>
<%@page import="basedatos.Usuarios"%>
<%@page import="basedatos.Datos"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

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
   int busca = Integer.parseInt(id);
   Datos dt = new Datos("com.mysql.jdbc.Driver",
                    "jdbc:mysql://localhost:3306/aplicaciones_web", "admin", "admin");
   Usuarios user = new Usuarios("com.mysql.jdbc.Driver",
           "jdbc:mysql://localhost:3306/aplicaciones_web", "admin", "admin");
   Connection cn = dt.getConexion();
   Statement st = cn.createStatement();
   String[] datos = user.datosOtro(busca);

%>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="public/css/estilos.css" />
        <title>pricipal.jsp</title>
    </head>
    <body>
        <header class="formtitle1">
            <a href="editar.jsp">EDITAR INFORMACION</a>
        </header>
        <div class="wrapper">
            <div class="form1">
                <div class="formtitle">Datos de Mi pagina</div>
            
                <div class="input">
                    <div class="inputtext">id: </div>
                    <div class="inputcontent"> <%=datos[0] %> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Usuario: </div>
                    <div class="inputcontent"> <%=datos[1] %> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Contraseña: </div>
                    <div class="inputcontent"> <%=datos[2] %> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Administrador: </div>
                    <div class="inputcontent"> <%=datos[3] %> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Correo Electronico: </div>
                    <div class="inputcontent"> <%=datos[4] %> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Nombre: </div>
                    <div class="inputcontent"> <%=datos[5] %> </div>
                </div>
                
                <div class="input">
                    <div class="inputtext">Apellido Paterno: </div>
                    <div class="inputcontent"> <%=datos[6] %> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Apellido Materno: </div>
                    <div class="inputcontent"> <%=datos[7] %> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Sexo: </div>
                    <div class="inputcontent"> <%=datos[8] %> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Fecha de Necimiento: </div>
                    <div class="inputcontent"> <%=datos[9] %> </div>
                </div>
            
                <div class="buttons">
                    <a href="cerrar.jsp">CERRAR SESION</a>
                </div>
            </div>
        </div>
                
        <footer class="formtitle1">
            Ivan Lozada Mendez
        </footer>
    </body>
</html>
