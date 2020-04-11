/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package entity;

/**
 *
 * @author Acer
 */
public class Kullanici {

    private int kullanici_id;
    private String ad;
    private String soyad;
    private String cinsiyet;
    private int yas;
    private String cep_telefonu;
    private String email;

    public Kullanici() {
    }

    public Kullanici(int kullanici_id, String ad, String soyad, String cinsiyet, int yas, String cep_telefonu, String email) {
        this.kullanici_id = kullanici_id;
        this.ad = ad;
        this.soyad = soyad;
        this.cinsiyet = cinsiyet;
        this.yas = yas;
        this.cep_telefonu = cep_telefonu;
        this.email = email;
    }

    public int getKullanici_id() {
        return kullanici_id;
    }

    public void setKullanici_id(int kullanici_id) {
        this.kullanici_id = kullanici_id;
    }

    public String getAd() {
        return ad;
    }

    public void setAd(String ad) {
        this.ad = ad;
    }

    public String getSoyad() {
        return soyad;
    }

    public void setSoyad(String soyad) {
        this.soyad = soyad;
    }

    public String getCinsiyet() {
        return cinsiyet;
    }

    public void setCinsiyet(String cinsiyet) {
        this.cinsiyet = cinsiyet;
    }

    public int getYas() {
        return yas;
    }

    public void setYas(int yas) {
        this.yas = yas;
    }

    public String getCep_telefonu() {
        return cep_telefonu;
    }

    public void setCep_telefonu(String cep_telefonu) {
        this.cep_telefonu = cep_telefonu;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 37 * hash + this.kullanici_id;
        return hash;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Kullanici other = (Kullanici) obj;
        if (this.kullanici_id != other.kullanici_id) {
            return false;
        }
        return true;
    }
    
    
    
    

}
