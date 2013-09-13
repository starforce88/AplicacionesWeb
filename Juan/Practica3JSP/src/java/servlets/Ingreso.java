/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package servlets;

import basedatos.Sql;
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 *
 * @author Starforce
 */
public class Ingreso extends HttpServlet {
   
    /** 
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code> methods.
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
    throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        PrintWriter out = response.getWriter();
        try {
           //Recogemos variables que son enviadas desde Index.jsp
            String usuario = request.getParameter("usu");
            String contra = request.getParameter("pass");

            //Realizamos acceso a base de Datos
            String [] datos=Sql.getFila("SELECT * FROM usuarios WHERE username='"+usuario+"' AND pass='"+contra+"'");

            if(datos==null){

                response.sendRedirect("error.jsp");

            }else if(datos[3].equals("0")){

                //Capturamos las variables a mostrar
                String id=datos[0];
                String usuar=datos[1];
                String pass=datos[2];
                String admin=datos[3];
                String mail=datos[4];
                String nombre=datos[5];
                String paterno=datos[6];
                String materno=datos[7];
                String sexo=datos[8];
                String fecha=datos[9];

                //creamos nuestra sesion
                HttpSession session = request.getSession(true);

                //Obtenemos los obejtos a guardar en session
                session.setAttribute("id", id);
                session.setAttribute("usuario", usuar);
                session.setAttribute("pass", pass);
                session.setAttribute("admin", admin);
                session.setAttribute("mail", mail);
                session.setAttribute("nombre", nombre);
                session.setAttribute("paterno", paterno);
                session.setAttribute("materno", materno);
                session.setAttribute("sexo", sexo);
                session.setAttribute("fecha", fecha);
                //pagina a donde se enviara si se encuentra el usuario autenticado
                response.sendRedirect("principal.jsp");

            }else{
                String id=datos[0];
                String usuar=datos[1];
                String pass=datos[2];
                String admin=datos[3];
                String mail=datos[4];
                String nombre=datos[5];
                String paterno=datos[6];
                String materno=datos[7];
                String sexo=datos[8];
                String fecha=datos[9];
                
                HttpSession session = request.getSession(true);
                
                session.setAttribute("id", id);
                session.setAttribute("usuario", usuar);
                session.setAttribute("pass", pass);
                session.setAttribute("admin", admin);
                session.setAttribute("mail", mail);
                session.setAttribute("nombre", nombre);
                session.setAttribute("paterno", paterno);
                session.setAttribute("materno", materno);
                session.setAttribute("sexo", sexo);
                session.setAttribute("fecha", fecha);
                
                response.sendRedirect("administrador.jsp");
            }
            
        } finally { 
            out.close();
        }
    } 

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /** 
     * Handles the HTTP <code>GET</code> method.
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
    throws ServletException, IOException {
        processRequest(request, response);
    } 

    /** 
     * Handles the HTTP <code>POST</code> method.
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
    throws ServletException, IOException {
        processRequest(request, response);
    }

    /** 
     * Returns a short description of the servlet.
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
