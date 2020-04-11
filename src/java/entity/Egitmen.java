package entity;

public class Egitmen extends Kullanici {

    private int egitmen_id;
    private String uz_alan;
    private String tecrube;

    public Egitmen() {
    }

    public Egitmen(int egitmen_id, String uz_alan, String tecrube, int kullanici_id, String ad, String soyad, String cinsiyet, int yas, String cep_telefonu, String email) {
        super(kullanici_id, ad, soyad, cinsiyet, yas, cep_telefonu, email);
        this.egitmen_id = egitmen_id;
        this.uz_alan = uz_alan;
        this.tecrube = tecrube;
    }

    public int getEgitmen_id() {
        return egitmen_id;
    }

    public void setEgitmen_id(int egitmen_id) {
        this.egitmen_id = egitmen_id;
    }

    public String getUz_alan() {
        return uz_alan;
    }

    public void setUz_alan(String uz_alan) {
        this.uz_alan = uz_alan;
    }

    public String getTecrube() {
        return tecrube;
    }

    public void setTecrube(String tecrube) {
        this.tecrube = tecrube;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 59 * hash + this.egitmen_id;
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
        final Egitmen other = (Egitmen) obj;
        if (this.egitmen_id != other.egitmen_id) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "Egitmen{" + "egitmen_id=" + egitmen_id + ", uz_alan=" + uz_alan + ", tecrube=" + tecrube + '}';
    }
    
    

}
