/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package servlets;

import basedatos.*;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.Vector;
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
            Usuarios user = new Usuarios("com.mysql.jdbc.Driver",
                    "jdbc:mysql://localhost:3306/aplicaciones_web", "admin", "admin");
            boolean valida = user.revisa(usuario, contra);
            System.out.println(valida);
            
            if(valida == true){
                
                String[] info = user.datos(usuario);
                for(int i = 0; i<info.length; i++){
                    System.out.println(info[i]);
                }
                String id = info[0];
                String usuar = info[1];
                String pass = info[2];
                String admin = info[3];
                String mail = info[4];
                String nombre = info[5];
                String paterno = info[6];
                String materno = info[7];
                String sexo = info[8];
                String fecha = info[9];
                
                if(admin.equals("0")){
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
                    response.sendRedirect("principal.jsp");
                }else{
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
            }else{
                response.sendRedirect("error.jsp");
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
