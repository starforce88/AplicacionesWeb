/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package servlets;

import basedatos.Usuarios;
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author Starforce
 */
@WebServlet(name = "ActualizarAdmin", urlPatterns = {"/ActualizarAdmin"})
public class ActualizarAdmin extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
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
            /* TODO output your page here. You may use following sample code. */
            Usuarios user = new Usuarios("com.mysql.jdbc.Driver",
                    "jdbc:mysql://localhost:3306/aplicaciones_web", "admin", "admin");
            /* TODO output your page here. You may use following sample code. */
            String d = request.getParameter("id");
            int id = Integer.parseInt(d);
            String nombre = request.getParameter("nombre");
            String paterno = request.getParameter("paterno");
            String materno = request.getParameter("materno");
            String usuario = request.getParameter("usuario");
            String mail = request.getParameter("mail");
            String s = request.getParameter("sexo");
            int sexo = Integer.parseInt(s);
            String a = request.getParameter("admin");
            int admin = Integer.parseInt(a);
            String fecha = request.getParameter("nac");
            String pass = request.getParameter("pass");
            String sql = "UPDATE usuarios SET username = '"+usuario+"', pass = '"+pass+
                    "', email = '"+mail+"', nombre = '"+nombre+"', a_paterno = '"+paterno+
                    "', a_materno ='"+materno+"', sexo ="+sexo+", f_nacimiento = '"+fecha+"'"
                    + ", admin = "+admin+" WHERE id="+id;
            System.out.println(sql);
            String g = user.ejecuta(sql);
            System.out.println(g);
            response.sendRedirect("administrador.jsp");
        } finally {
            out.close();
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
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
     *
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
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
