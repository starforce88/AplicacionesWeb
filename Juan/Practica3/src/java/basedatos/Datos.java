/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package basedatos;

/**
 *
 * @author Starforce
 */
import java.sql.*;

public class Datos {

    private String driver;
    private String cadenacon;
    private String username;
    private String password;
    public Datos() {
    }

    public Datos(String driver, String cadenacon, String username, String password) {
        this.driver = driver;
        this.cadenacon = cadenacon;
        this.username = username;
        this.password = password;
    }

    public Connection getConexion() throws ClassNotFoundException {
        Connection cn;
        try {
            Class.forName(driver);
            cn = DriverManager.getConnection(cadenacon, username, password);
            return cn;
        } catch (SQLException ex) {
            System.out.println("eerrr: " + ex);
            return null;
        }
    }

    public void cierraConexion(Connection cn) {
        try {
            if (cn != null && !cn.isClosed()) {
                cn.close();
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}
