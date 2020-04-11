package dao;

import entity.Egitim;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

public class EgitimDAO extends SuperDAO {

    PreparedStatement pst = null;
    ResultSet rs = null;

    //Egitmen dao sınıfını düzlenenecek 
    EgitmenDAO egitmendao;

    public void insert(Egitim egitim) {
        try {
            pst = this.getConnection().prepareStatement("insert into egitimler (egitim_icerik,egitim_adi,egitim_ucret,"
                    + "egitmen_id) values(?,?,?,?) ");

            pst.setString(1, egitim.getEgitim_icerik());
            pst.setString(2, egitim.getEgitim_adi());
            pst.setString(3, egitim.getEgitim_ucret());
            pst.setInt(4, egitim.getEgitmen().getEgitmen_id());
            pst.executeUpdate();
            pst.close();

        } catch (SQLException ex) {
            System.out.println("EgitimDAO HATA(Create) : " + ex.getMessage());
        }
    }

    public void delete(Egitim egitim) {

        try {
            pst = this.getConnection().prepareStatement("delete from egitimler where egitim_id=?");
            pst.setInt(1, egitim.getEgitim_id());
            pst.executeUpdate();
            pst.close();
        } catch (SQLException ex) {
            System.out.println(" EgitimDAO HATA(Delete): " + ex.getMessage());
        }
    }

    public List<Egitim> findAll() {
        List<Egitim> egitimlist = new ArrayList();

        try {
            pst = this.getConnection().prepareStatement("select * from egitimler");

            rs = pst.executeQuery();
            while (rs.next()) {
                Egitim temp = new Egitim();
                temp.setEgitim_id(rs.getInt("egitim_id"));
                temp.setEgitim_icerik(rs.getString("egitim_icerik"));
                temp.setEgitim_adi(rs.getString("egitim_adi"));
                temp.setEgitim_ucret(rs.getString("egitim_ucret"));
                temp.setEgitmen(this.getEgitmendao().find(rs.getInt("egitmen_id")));

                egitimlist.add(temp);
            }

            return egitimlist;
        } catch (SQLException ex) {
            System.out.println("EgitimDAO HATA(FindAll):" + ex.getMessage());
            return null;
        }

    }

    public Egitim find(int id) {
        Egitim egitim = null;
        try {
            pst = this.getConnection().prepareStatement("select * from egitimler where egitim_id = ?");
            pst.setInt(1, id);
            rs = pst.executeQuery();
            rs.next();

            egitim = new Egitim();
            egitim.setEgitim_id(rs.getInt("egitim_id"));
            egitim.setEgitim_icerik(rs.getString("egitim_icerik"));
            egitim.setEgitim_adi(rs.getString("egitim_adi"));
            egitim.setEgitim_ucret(rs.getString("egitim_ucret"));
            egitim.setEgitmen(this.getEgitmendao().find(rs.getInt("egitmen_id")));
        } catch (SQLException ex) {

            System.out.println("EgitimDAO HATA(Find):" + ex.getMessage());;
        }

        return egitim;
    }

    public void update(Egitim egitim) {
        try {
            pst = this.getConnection().prepareStatement("update egitimler set egitim_icerik=? , egitim_adi=? , egitim_ucret=? , egitmen_id=? where egitim_id=?");

            pst.setString(1, egitim.getEgitim_icerik());
            pst.setString(2, egitim.getEgitim_adi());
            pst.setString(3, egitim.getEgitim_ucret());
            pst.setInt(4, egitim.getEgitmen().getEgitmen_id());

            pst.setInt(5, egitim.getEgitim_id());
            pst.executeUpdate();
            pst.close();
        } catch (SQLException ex) {
            System.out.println("EgitimDAO HATA(Update):" + ex.getMessage());;
        }
    }

    public EgitmenDAO getEgitmendao() {
        if (this.egitmendao == null) {
            this.egitmendao = new EgitmenDAO();
        }
        return egitmendao;
    }

    public void setEgitmendao(EgitmenDAO egitmendao) {
        this.egitmendao = egitmendao;
    }

}
