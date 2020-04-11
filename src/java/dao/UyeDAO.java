/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package dao;

import entity.Uye;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author C1TO
 */
public class UyeDAO extends SuperDAO {

    PreparedStatement pst = null;
    ResultSet rs = null;

    public void insert(Uye uye) {
        try {
            pst = this.getConnection().prepareStatement("insert into uyeler (kullanici_ad,kullanici_soyad,kullanici_cinsiyet,kullanici_tel,kullanici_yas,kullanici_mail,uye_sifre,uye_kartno) values (?,?,?,?,?,?,?,?)");
            pst.setString(1, uye.getAd());
            pst.setString(2, uye.getSoyad());
            pst.setString(3, uye.getCinsiyet());
            pst.setString(4, uye.getCep_telefonu());
            pst.setInt(5, uye.getYas());
            pst.setString(6, uye.getEmail());
            pst.setString(7, uye.getSifre());
            pst.setString(8, uye.getKart_no());

            pst.executeUpdate();
            pst.close();

        } catch (SQLException ex) {
            System.out.println("UyeDAO HATA(Create) : " + ex.getMessage());
        }

    }

    public void delete(Uye uye) {
        try {
            pst = this.getConnection().prepareStatement("delete from uyeler where uye_id=?");
            pst.setInt(1, uye.getUye_id());
            pst.executeUpdate();
            pst.close();
        } catch (SQLException ex) {
            System.out.println(" UyeDAO HATA(Delete): " + ex.getMessage());
        }
    }

    public List<Uye> findAll() {
        List<Uye> ulist = new ArrayList();
        try {
            pst = this.getConnection().prepareStatement("SELECT * FROM uyeler ");
            rs = pst.executeQuery();
            while (rs.next()) {
                Uye temp = new Uye();
                temp.setKullanici_id(rs.getInt("kullanici_id"));
                temp.setAd(rs.getString("kullanici_ad"));
                temp.setSoyad(rs.getString("kullanici_soyad"));
                temp.setCinsiyet(rs.getString("kullanici_cinsiyet"));
                temp.setYas(rs.getInt("kullanici_yas"));
                temp.setCep_telefonu(rs.getString("kullanici_tel"));
                temp.setEmail(rs.getString("kullanici_mail"));
                temp.setUye_id(rs.getInt("uye_id"));
                temp.setSifre(rs.getString("uye_sifre"));
                temp.setKart_no(rs.getString("uye_kartno"));

                ulist.add(temp);
                
            }
            return ulist;
        } catch (SQLException ex) {
            System.out.println("CountryDAO HATA(READ):" + ex.getMessage());
            return null;
        }

    }

    public Uye find(int id) {
        Uye uye = null;

        try {
            pst = this.getConnection().prepareStatement("select * from uyeler where uye_id=?");
            pst.setInt(1, id);
            rs = pst.executeQuery();

            rs.next();
            uye = new Uye();

            uye.setKullanici_id(rs.getInt("kullanici_id"));
            uye.setAd(rs.getString("kullanici_ad"));
            uye.setSoyad(rs.getString("kullanici_soyad"));
            uye.setCinsiyet(rs.getString("kullanici_cinsiyet"));
            uye.setCep_telefonu(rs.getString("kullanici_tel"));
            uye.setYas(rs.getInt("kullanici_yas"));
            uye.setEmail(rs.getString("kullanici_mail"));
            uye.setUye_id(rs.getInt("uye_id"));
            uye.setSifre(rs.getString("uye_sifre"));
            uye.setKart_no(rs.getString("uye_kartno"));

        } catch (SQLException ex) {
            System.out.println(" UyeDAO HATA(Find): " + ex.getMessage());
        }

        return uye;
    }

    public void update(Uye uye) {
        try {
            pst = this.getConnection().prepareStatement("update uyeler set kullanici_ad=? , kullanici_soyad=? , kullanici_cinsiyet=?,kullanici_tel=?, kullanici_yas=? , kullanici_mail=? , uye_sifre=? where uye_id=?");

            pst.setString(1, uye.getAd());
            pst.setString(2, uye.getSoyad());
            pst.setString(3, uye.getCinsiyet());
            pst.setString(4, uye.getCep_telefonu());
            pst.setInt(5, uye.getYas());
            pst.setString(6, uye.getEmail());
            pst.setString(7, uye.getSifre());

            pst.setInt(8, uye.getUye_id());
            pst.executeUpdate();
            pst.close();
        } catch (SQLException ex) {
            System.out.println(" UyeDAO HATA(Update): " + ex.getMessage());
        }
    }

}
