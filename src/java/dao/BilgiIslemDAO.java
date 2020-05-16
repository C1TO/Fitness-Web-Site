package dao;

import entity.BilgiIslem;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

public class BilgiIslemDAO extends SuperDAO {

    PreparedStatement pst = null;
    ResultSet rs = null;

    EgitimDAO egitimdao;
    UyeDAO uyedao;

    public void insert(BilgiIslem bilgiIslem) {
        try {
            pst = this.getConnection().prepareStatement("insert into bilgi_islem (egitim_id,uye_id,baslangic_tarih,bitis_tarih) values(?,?,?,?) ");

            pst.setInt(1, bilgiIslem.getEgitim().getEgitim_id());
            pst.setInt(2, bilgiIslem.getUye().getUye_id());
            pst.setString(3, bilgiIslem.getBaslangic_tarihi());
            pst.setString(4, bilgiIslem.getBitis_tarihi());

            pst.executeUpdate();
            pst.close();

        } catch (SQLException ex) {
            System.out.println("BilgiIslemDAO HATA(Create) : " + ex.getMessage());
        }
    }

    public void delete(BilgiIslem bilgiIslem) {

        try {
            pst = this.getConnection().prepareStatement("delete from bilgi_islem where bilgi_id=?");
            pst.setInt(1, bilgiIslem.getBilgiıslem_id());
            pst.executeUpdate();
            pst.close();
        } catch (SQLException ex) {
            System.out.println(" BilgiIslemDAO HATA(Delete): " + ex.getMessage());
        }
    }

    public List<BilgiIslem> findAll(int page, int pageSize) {
        List<BilgiIslem> bilgiIslemlist = new ArrayList();
        int start = (page - 1) * pageSize;
        try {
            pst = this.getConnection().prepareStatement("select * from bilgi_islem order by bilgi_id asc limit " + start + " , " + pageSize);
            

            rs = pst.executeQuery();
            while (rs.next()) {
                BilgiIslem temp = new BilgiIslem();

                temp.setBilgiıslem_id(rs.getInt("bilgi_id"));
                temp.setEgitim(this.getEgitimdao().find(rs.getInt("egitim_id")));
                temp.setUye(this.getUyedao().find(rs.getInt("uye_id")));
                temp.setBaslangic_tarihi(rs.getString("baslangic_tarih"));
                temp.setBitis_tarihi(rs.getString("bitis_tarih"));

                bilgiIslemlist.add(temp);
            }

            return bilgiIslemlist;
        } catch (SQLException ex) {
            System.out.println("BilgiIslemDAO HATA(FindAll):" + ex.getMessage());
            return null;
        }
    }

    public BilgiIslem find(int id) {
        BilgiIslem bilgiIslem = null;
        try {
            pst = this.getConnection().prepareStatement("select * from bilgi_islem where bilgi_id = ?");
            pst.setInt(1, id);
            rs = pst.executeQuery();
            rs.next();

            bilgiIslem = new BilgiIslem();

            bilgiIslem.setBilgiıslem_id(rs.getInt("bilgi_id"));
            bilgiIslem.setEgitim(this.getEgitimdao().find(rs.getInt("egitim_id")));
            bilgiIslem.setUye(this.getUyedao().find(rs.getInt("uye_id")));
            bilgiIslem.setBaslangic_tarihi(rs.getString("baslangic_tarih"));
            bilgiIslem.setBitis_tarihi(rs.getString("bitis_tarih"));

        } catch (SQLException ex) {

            System.out.println("BilgiIslemDAO HATA(Find):" + ex.getMessage());
        }

        return bilgiIslem;
    }

    public void update(BilgiIslem bilgiIslem) {
        try {
            pst = this.getConnection().prepareStatement("update bilgi_islem set  egitim_id=?,uye_id=?,baslangic_tarih=?,bitis_tarih=? where bilgi_id=?");

            pst.setInt(1, bilgiIslem.getEgitim().getEgitim_id());
            pst.setInt(2, bilgiIslem.getUye().getUye_id());
            pst.setString(3, bilgiIslem.getBaslangic_tarihi());
            pst.setString(4, bilgiIslem.getBitis_tarihi());

            pst.setInt(5, bilgiIslem.getBilgiıslem_id());
            pst.executeUpdate();
            pst.close();
        } catch (SQLException ex) {
            System.out.println("BilgiIslemDAO HATA(Update):" + ex.getMessage());
        }
    }

    public EgitimDAO getEgitimdao() {
        if (this.egitimdao == null) {
            this.egitimdao = new EgitimDAO();

        }
        return egitimdao;
    }

    public void setEgitimdao(EgitimDAO egitimdao) {
        this.egitimdao = egitimdao;
    }

    public UyeDAO getUyedao() {
        if (this.uyedao == null) {
            this.uyedao = new UyeDAO();

        }
        return uyedao;
    }

    public void setUyedao(UyeDAO uyedao) {
        this.uyedao = uyedao;
    }

    public int count() {
        int count = 0;

        try {
            PreparedStatement pst = this.getConnection().prepareStatement("select count(bilgi_id) as bilgi_count from bilgi_islem");
            ResultSet rs = pst.executeQuery();
            rs.next();
            count = rs.getInt("bilgi_count");

        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return count;
    }

}
