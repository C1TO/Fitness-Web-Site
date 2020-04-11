/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package entity;

/**
 *
 * @author C1TO
 */
public class Uye extends Kullanici {

    private int uye_id;
    private String kart_no;
    private String sifre;

  

    public Uye() {
    }

    public Uye(int uye_id, String kart_no, String sifre, int kullanici_id, String ad, String soyad, String cinsiyet, int yas, String cep_telefonu, String email) {
        super(kullanici_id, ad, soyad, cinsiyet, yas, cep_telefonu, email);
        this.uye_id = uye_id;
        this.kart_no = kart_no;
        this.sifre = sifre;
    }

    

    public int getUye_id() {
        return uye_id;
    }

    public void setUye_id(int uye_id) {
        this.uye_id = uye_id;
    }

    public String getKart_no() {
        return kart_no;
    }

    public void setKart_no(String kart_no) {
        this.kart_no = kart_no;
    }

    public String getSifre() {
        return sifre;
    }

    public void setSifre(String sifre) {
        this.sifre = sifre;
    }

   
    @Override
    public int hashCode() {
        int hash = 3;
        hash = 67 * hash + this.uye_id;
        return hash;
    }

    @Override
    public boolean equals(Object obj) {
        if (this == obj) {
            return true;
        }
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Uye other = (Uye) obj;
        if (this.uye_id != other.uye_id) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "Uye{" + "uye_id=" + uye_id + ", kart_no=" + kart_no + ", sifre=" + sifre + '}';
    }

    

}
