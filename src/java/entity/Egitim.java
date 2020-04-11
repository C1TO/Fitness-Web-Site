package entity;

public class Egitim {

    private int egitim_id;
    private String egitim_icerik;
    private String egitim_adi;
    private String egitim_ucret;

    //Egitmen sınıfı eklenecek
    private Egitmen egitmen;

    public Egitim() {
    }

    public Egitim(int egitim_id, String egitim_icerik, String egitim_adi, String egitim_ucret) {
        this.egitim_id = egitim_id;
        this.egitim_icerik = egitim_icerik;
        this.egitim_adi = egitim_adi;
        this.egitim_ucret = egitim_ucret;
    }

    public int getEgitim_id() {
        return egitim_id;
    }

    public void setEgitim_id(int egitim_id) {
        this.egitim_id = egitim_id;
    }

    public String getEgitim_icerik() {
        return egitim_icerik;
    }

    public void setEgitim_icerik(String egitim_icerik) {
        this.egitim_icerik = egitim_icerik;
    }

    public String getEgitim_adi() {
        return egitim_adi;
    }

    public void setEgitim_adi(String egitim_adi) {
        this.egitim_adi = egitim_adi;
    }

    public String getEgitim_ucret() {
        return egitim_ucret;
    }

    public void setEgitim_ucret(String egitim_ucret) {
        this.egitim_ucret = egitim_ucret;
    }

    public Egitmen getEgitmen() {
        if(egitmen == null)
        {
            egitmen = new Egitmen();
        }
        return egitmen;
    }

    public void setEgitmen(Egitmen egitmen) {
        this.egitmen = egitmen;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 59 * hash + this.egitim_id;
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
        final Egitim other = (Egitim) obj;
        if (this.egitim_id != other.egitim_id) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "Egitim{" + "egitim_id=" + egitim_id + ", egitim_icerik=" + egitim_icerik + ", egitim_adi=" + egitim_adi + ", egitim_ucret=" + egitim_ucret + ", egitmen=" + egitmen + '}';
    }

}
