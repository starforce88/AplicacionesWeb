<%-- 
    Document   : administrador
    Created on : 12/09/2013, 01:07:05 AM
    Author     : Starforce
--%>

<%@page import="java.sql.Connection"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Statement"%>
<%@page import="basedatos.*"%>
<%@page import="java.util.*"%>
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
   int busca = Integer.parseInt(id);
   Datos dt = new Datos("com.mysql.jdbc.Driver",
                    "jdbc:mysql://localhost:3306/aplicaciones_web", "root", "onepiece");
   Usuarios user = new Usuarios("com.mysql.jdbc.Driver",
           "jdbc:mysql://localhost:3306/aplicaciones_web", "root", "onepiece");
   Connection cn = dt.getConexion();
   Statement st = cn.createStatement();
   ResultSet rs = st.executeQuery("SELECT * FROM usuarios");
   String[] datos = user.datosOtro(busca);
   
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
            <div class="form3">
                <div class="formtitle">Usuarios</div>
                <table border=\"1\">
                    <tr>
                        <td>Id</td>
                        <td>Nombre</td>
                        <td>Apellido Paterno</td>
                        <td>Apellido Materno</td>
                        <td>Usuario</td>
                        <td>Correo</td>
                        <td>Admin</td>
                        <td>Fecha de Nac</td>
                        <td>Sexo</td>
                    </tr>
                <%while(rs.next()){%>
                    <tr>
                        <%session.setAttribute("id"+rs.getInt("id"), rs.getInt("id"));%>
                        
                        <td><%=rs.getInt("id")%> </td>
                        <td><%=rs.getString("nombre")%></td>
                        <td><%=rs.getString("a_paterno")%></td>
                        <td><%=rs.getString("a_materno")%> </td>
                        <td><%=rs.getString("username")%></td>
                        <td><%=rs.getString("pass")%></td>
                        <td><%=rs.getString("email")%></td>
                        
                        <%if(rs.getInt("admin")==1){%>
                            <td>Si</td>
                        <%}else{%>
                            <td>No</td>
                        <%}%>
                        <td><%=rs.getString("f_nacimiento")%></td>
                        
                        <%if(rs.getInt("sexo")==1){%>
                            <td>M</td>
                        <%}else{%>
                            <td>F</td>
                        <%}%>
                        <td>
                            <form method="post" action="Editar">
                                <input type="text" name="id" value="<%=rs.getInt("id")%>" style="display: none"/>
                                <input type="text" name="nombre" value="<%=rs.getString("nombre")%>" style="display: none"/>
                                <input type="text" name="paterno" value="<%=rs.getString("a_paterno")%>" style="display: none"/>
                                <input type="text" name="materno" value="<%=rs.getString("a_materno")%>" style="display: none"/>
                                <input type="text" name="usuario" value="<%=rs.getString("username")%>" style="display: none"/>
                                <input type="text" name="mail" value="<%=rs.getString("email")%>" style="display: none"/>
                                <input type="password" name="pass" value="<%=rs.getString("pass")%>" style="display: none"/>
                                <%if(rs.getInt("admin")==1){%>
                                    <input type="radio" name="admin" value="1" checked style="display: none">
                                    <input type="radio" name="admin" value="0" style="display: none">
                                <%}else{%>
                                    <input type="radio" name="admin" value="1" style="display: none">
                                    <input type="radio" name="admin" value="0" checked style="display: none"> 
                                <%}%>
                                    
                                <%if(rs.getInt("sexo")==1){%>
                                    <input type="radio" name="sexo" value="1" checked style="display: none">
                                    <input type="radio" name="sexo" value="0" style="display: none">
                                <%}else{%>
                                    <input type="radio" name="sexo" value="1" style="display: none">
                                    <input type="radio" name="sexo" value="0" checked style="display: none"> 
                                <%}%>
                                
                                <input type="date" name="nac" value="<%=rs.getString("f_nacimiento")%>" style="display: none">
                                <input type="submit" value="Editar" class="orangebutton"/>
                            </form>
                        </td>
                    </tr>
                <%}%>
                </table>
            </div>
        </div>
    </body>
</html>
