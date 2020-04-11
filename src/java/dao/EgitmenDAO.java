package dao;

import entity.Egitmen;
import entity.Kullanici;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

public class EgitmenDAO extends SuperDAO {

    PreparedStatement pst = null;
    ResultSet rs = null;
 

    public void insert(Egitmen egitmen) {
        try {
            pst = this.getConnection().prepareStatement("insert into egitmenler (kullanici_ad,kullanici_soyad,kullanici_cinsiyet,kullanici_tel,kullanici_yas,kullanici_mail,egitmen_tecrube,uz_alan) values (?,?,?,?,?,?,?,?)");
            pst.setString(1, egitmen.getAd());
            pst.setString(2, egitmen.getSoyad());
            pst.setString(3, egitmen.getCinsiyet());
            pst.setString(4, egitmen.getCep_telefonu());
            pst.setInt(5, egitmen.getYas());
            pst.setString(6, egitmen.getEmail());
            pst.setString(7, egitmen.getTecrube());
            pst.setString(8, egitmen.getUz_alan());
            pst.executeUpdate();
            pst.close();
        } catch (SQLException ex) {
            System.out.println(" EgitmenDAO HATA(Create): " + ex.getMessage());
        }
    }

    public void delete(Egitmen egitmen) {
        try {
            pst = this.getConnection().prepareStatement("delete from egitmenler where egitmen_id=?");
            pst.setInt(1, egitmen.getEgitmen_id());
            pst.executeUpdate();
            pst.close();
        } catch (SQLException ex) {
            System.out.println(" EgitmenDAO HATA(Delete): " + ex.getMessage());
        }
    }

    public List<Egitmen> findAll() {
        List<Egitmen> elist = new ArrayList();

        try {
            pst = this.getConnection().prepareStatement("SELECT * FROM egitmenler");
            rs = pst.executeQuery();

            while (rs.next()) {
                Egitmen temp = new Egitmen();
                temp.setEgitmen_id(rs.getInt("egitmen_id"));
                temp.setUz_alan(rs.getString("uz_alan"));
                temp.setTecrube(rs.getString("egitmen_tecrube"));
                temp.setKullanici_id(rs.getInt("kullanici_id"));
                temp.setAd(rs.getString("kullanici_ad"));
                temp.setSoyad(rs.getString("kullanici_soyad"));
                temp.setCinsiyet(rs.getString("kullanici_cinsiyet"));
                temp.setYas(rs.getInt("kullanici_yas"));
                temp.setCep_telefonu(rs.getString("kullanici_tel"));
                temp.setEmail(rs.getString("kullanici_mail"));

                elist.add(temp);

            }
            return elist;
        } catch (SQLException ex) {
            System.out.println("EgitmenDAO HATA(FindAll):" + ex.getMessage());
            return null;
        }

    }

    public Egitmen find(int id) {
        Egitmen egitmen = null;

        try {
            pst = this.getConnection().prepareStatement("select * from egitmenler where egitmen_id=?");
            pst.setInt(1, id);
            rs = pst.executeQuery();

            rs.next();

            egitmen = new Egitmen();

            egitmen.setKullanici_id(rs.getInt("kullanici_id"));
            egitmen.setAd(rs.getString("kullanici_ad"));
            egitmen.setSoyad(rs.getString("kullanici_soyad"));
            egitmen.setCinsiyet(rs.getString("kullanici_cinsiyet"));
            egitmen.setCep_telefonu(rs.getString("kullanici_tel"));
            egitmen.setYas(rs.getInt("kullanici_yas"));
            egitmen.setEmail(rs.getString("kullanici_mail"));
            egitmen.setEgitmen_id(rs.getInt("egitmen_id"));
            egitmen.setTecrube(rs.getString("egitmen_tecrube"));
            egitmen.setUz_alan(rs.getString("uz_alan"));

        } catch (SQLException ex) {
            System.out.println(" EgitmenDAO HATA(Find): " + ex.getMessage());
        }

        return egitmen;
    }

    public void update(Egitmen egitmen) {
        try {
            pst = this.getConnection().prepareStatement("update egitmenler set kullanici_ad=? , kullanici_soyad=? , kullanici_cinsiyet=?,kullanici_tel=?, kullanici_yas=? , kullanici_mail=? , egitmen_tecrube=?,uz_alan=? where egitmen_id=?");

            pst.setString(1, egitmen.getAd());
            pst.setString(2, egitmen.getSoyad());
            pst.setString(3, egitmen.getCinsiyet());
            pst.setString(4, egitmen.getCep_telefonu());
            pst.setInt(5, egitmen.getYas());
            pst.setString(6, egitmen.getEmail());
            pst.setString(7, egitmen.getTecrube());
            pst.setString(8, egitmen.getUz_alan());

            pst.setInt(9, egitmen.getEgitmen_id());
            pst.executeUpdate();
            pst.close();
        } catch (SQLException ex) {
            System.out.println(" EgitmenDAO HATA(Update): " + ex.getMessage());
        }
    }

  
    
}
