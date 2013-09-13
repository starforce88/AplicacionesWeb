<%-- 
    Document   : administrador
    Created on : 12/09/2013, 01:07:05 AM
    Author     : Starforce
--%>

<%@page import="java.sql.Connection"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Statement"%>
<%@page import="basedatos.Conexion"%>
<%@page import="basedatos.Sql"%>
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
   
   Conexion db = new Conexion();//Llamamos a nuestra Clase Conexion
   Connection cn = db.getConnection();
   Statement st = cn.createStatement();
   ResultSet rs = st.executeQuery("SELECT * FROM usuarios");

%>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="public/css/estilos.css" />
        <title>administrador.jsp</title>
    </head>
    <body>
        <div class="wrapper">
            <div class="form1">
                <div class="formtitle">Datos de Mi pagina</div>
            
                <div class="input">
                    <div class="inputtext">id: </div>
                    <div class="inputcontent"> <%=id%> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Usuario: </div>
                    <div class="inputcontent"> <%=usuar%> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Contraseña: </div>
                    <div class="inputcontent"> <%=pass%> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Administrador: </div>
                    <div class="inputcontent"> <%=ad%> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Correo Electronico: </div>
                    <div class="inputcontent"> <%=email%> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Nombre: </div>
                    <div class="inputcontent"> <%=nombre%> </div>
                </div>
                
                <div class="input">
                    <div class="inputtext">Apellido Paterno: </div>
                    <div class="inputcontent"> <%=paterno%> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Apellido Materno: </div>
                    <div class="inputcontent"> <%=materno%> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Sexo: </div>
                    <div class="inputcontent"> <%=s%> </div>
                </div>
            
                <div class="input">
                    <div class="inputtext">Fecha de Necimiento: </div>
                    <div class="inputcontent"> <%=fecha%> </div>
                </div>
            
                <div class="buttons">
                    <a href="cerrar.jsp">CERRAR SESION</a>
                </div>
            </div>
            <%while(rs.next()){%>
                <form method="post" action="Edita" class="form2">    
                    <div class="formtitle">Editar Registro de <%=rs.getString("username")%></div>
                        <div class="input">
                            <div class="inputcontent">
                                <input type="checkbox" name="idUs" value="<%=rs.getInt("id")%>"> <%=rs.getInt("id")%>
                                
                                <input type="radio" name="modifica" value="Elimina"> Elimina
                                <%if(rs.getInt("admin")==0){%>
                                    <input type="radio" name="modifica" value="Administra"> Administrador
                                <%}else{%>
                                    <input type="radio" name="modifica" value="No"> Quitar admin
                                <%}%>
                            </div>
                            <div class="buttons">
                                <input type="submit" value="Actualizar" class="orangebutton"/>
                            </div>
                        </div>
                
                </form>
            <%}%>
        </div>
    </body>
</html>
