/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package basedatos;
import java.util.*;
import java.sql.*;
/**
 *
 * @author Starforce
 */
public class Usuarios {
    
    Datos dt;
    
    public Usuarios(String driver, String cadenaCon, String username, String password){
        dt = new Datos( driver, cadenaCon, username, password );
    }
    
    public String ejecuta(String sql) {
        String mensaje= null;

        try	{
            
            Connection	cn = dt.getConexion();

            if (cn == null) {
            	mensaje = "No hay conexión a la base de datos...!";
            } else {
            	Statement st = cn.createStatement();//Obtiene procedimiento o consulta
            	st.execute(sql);//Ejecuta Consulta
            	st.close();
            	cn.close();
            }
        } catch(SQLException e)	{
            mensaje= e.getMessage();
        } catch(Exception e) {
            mensaje= e.getMessage();
        }

        return mensaje;
    }
    
    public ArrayList<Integer> getTodosIds() {
       String query = "SELECT * FROM usuarios";
       
       return getIds(query);
    }
    
    private ArrayList<Integer> getIds(String sql) {
        ArrayList<Integer> ids = new ArrayList<Integer>();
        try {
         Connection cn = dt.getConexion();
         Statement st = cn.createStatement();
         ResultSet rs = st.executeQuery(sql);
         int id = 0;
         while(rs.next()) {
             id = rs.getInt("id");
             ids.add(id);
         }
         dt.cierraConexion( cn );
        }
        catch( Exception e ) {
            e.printStackTrace();
        }
        finally {
            return ids;
        }    
    }
    
    public boolean revisa(String usuario, String pass){
        boolean revisa = false;
        try {
            
            String sql = "SELECT * FROM usuarios WHERE username='"+usuario+"' AND pass='"+pass+"'";
            Connection cn = dt.getConexion();
            Statement st = cn.createStatement();
            ResultSet rs = st.executeQuery(sql);
            
            if(!rs.next()) {
                return revisa;
            }
            dt.cierraConexion( cn );
            revisa = true;
            
        }
        catch( Exception e ) {
            e.printStackTrace();
        }finally {
            return revisa;
        }    
        
    }
    
    public String[] datos (String usuario){
        String[] dato = new String[10];
        try {
            String sql = "SELECT * FROM usuarios WHERE username = '" + usuario + "'";
            Connection cn = dt.getConexion();
            Statement st = cn.createStatement();
            ResultSet rs = st.executeQuery(sql);
            
            while(rs.next()) {
                dato[0] = Integer.toString(rs.getInt("id"));
                dato[1] = rs.getString("username");
                dato[2] = rs.getString("pass");
                dato[3] = Integer.toString(rs.getInt("admin"));
                dato[4] = rs.getString("email");
                dato[5] = rs.getString("nombre");
                dato[6] = rs.getString("a_paterno");
                dato[7] = rs.getString("a_materno");
                dato[8] = Integer.toString(rs.getInt("sexo"));
                dato[9] = rs.getString("f_nacimiento");
            }
            dt.cierraConexion( cn );
        }catch( Exception e ) {
            e.printStackTrace();
        }finally {
            return dato;
        }    
    }
    
    public String[] datosOtro (int id){
        String[] dato = new String[10];
        try {
            String sql = "SELECT * FROM usuarios WHERE id = " + id;
            Connection cn = dt.getConexion();
            Statement st = cn.createStatement();
            ResultSet rs = st.executeQuery(sql);
            
            while(rs.next()) {
                dato[0] = Integer.toString(rs.getInt("id"));
                dato[1] = rs.getString("username");
                dato[2] = rs.getString("pass");
                if(rs.getInt("admin")==0){
                    dato[3] = "NO";
                }else{
                    dato[3] = "SI";
                }
                
                dato[4] = rs.getString("email");
                dato[5] = rs.getString("nombre");
                dato[6] = rs.getString("a_paterno");
                dato[7] = rs.getString("a_materno");
                if(rs.getInt("sexo")==1){
                    dato[8] = "Masculino";
                }else{
                    dato[8] = "Femenino";
                }
                
                dato[9] = rs.getString("f_nacimiento");
            }
            dt.cierraConexion( cn );
        }catch( Exception e ) {
            e.printStackTrace();
        }finally {
            return dato;
        }    
    }
    
}
