/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package servlets;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author Starforce
 */
@WebServlet(name = "Editar", urlPatterns = {"/Editar"})
public class Editar extends HttpServlet {

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
            String d = request.getParameter("id");
            String d1 = request.getParameter("admin");
            String nombre = request.getParameter("nombre");
            String paterno = request.getParameter("paterno");
            String materno = request.getParameter("materno");
            String usuario = request.getParameter("usuario");
            String mail = request.getParameter("mail");
            String sexo = request.getParameter("sexo");
            String fecha = request.getParameter("nac");
            String pass = request.getParameter("pass");
            RequestDispatcher rd = null;
            request.setAttribute("id", d);
            request.setAttribute("admin", d1);
            request.setAttribute("nombre", nombre);
            request.setAttribute("paterno", paterno);
            request.setAttribute("materno", materno);
            request.setAttribute("usuario", usuario);
            request.setAttribute("mail", mail);
            request.setAttribute("sexo", sexo);
            request.setAttribute("fecha", fecha);
            request.setAttribute("pass", pass);
            rd=request.getRequestDispatcher("/editaAdmin.jsp");
            rd.forward(request,response);
            System.out.println(nombre);
            System.out.println(paterno);
            System.out.println(materno);
            System.out.println(usuario);
            System.out.println(mail);
            System.out.println(sexo);
            System.out.println(fecha);
            System.out.println(d);
            System.out.println(d1);
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
