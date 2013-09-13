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

/**
 *
 * @author Starforce
 */
public class Registra extends HttpServlet {

    /**
     * Processes requests for both HTTP
     * <code>GET</code> and
     * <code>POST</code> methods.
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
            int s;
            String nombre = request.getParameter("nombre");
            String paterno = request.getParameter("paterno");
            String materno = request.getParameter("materno");
            String usuario = request.getParameter("usuario");
            String mail = request.getParameter("mail");
            String sexo = request.getParameter("sexo");
            String fecha = request.getParameter("nac");
            String pass = request.getParameter("pass");
            if(sexo.equals("masculino")){
                s = 1;
            }else{
                s = 0;
            }
            System.out.println(nombre);
            System.out.println(paterno);
            System.out.println(materno);
            System.out.println(usuario);
            System.out.println(mail);
            System.out.println(sexo);
            System.out.println(fecha);
            System.out.println(s);
            
            String sql = "INSERT INTO usuarios (username, pass, admin, email, nombre, a_paterno, a_materno, "
                    + "sexo, f_nacimiento) VALUES ('" + usuario +"','" + pass + "','0','" + mail 
                    + "','" + nombre + "','" + paterno + "','" + materno + "','" + s + "','" + fecha + "')";
            
            Sql.ejecuta(sql);
            response.sendRedirect("registra.jsp");
            String registra = "Registrado";
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet Registra</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Registrado</h1>");
            out.println("Ingrese a su cuenta <a href=\"index.jsp\">Aqui</a>");
            out.println("</body>");
            out.println("</html>");
            
        } finally {            
            out.close();
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP
     * <code>GET</code> method.
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
     * Handles the HTTP
     * <code>POST</code> method.
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
