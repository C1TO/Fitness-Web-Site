package entity;

import java.util.Objects;

public class BilgiIslem {

    private int bilgiıslem_id;
    private String baslangic_tarihi;
    private String bitis_tarihi;

    private Uye uye;
    private Egitim egitim;

    public BilgiIslem() {
    }

    public BilgiIslem(int bilgiıslem_id, String baslangic_tarihi, String bitis_tarihi) {
        this.bilgiıslem_id = bilgiıslem_id;
        this.baslangic_tarihi = baslangic_tarihi;
        this.bitis_tarihi = bitis_tarihi;
    }

    public int getBilgiıslem_id() {
        return bilgiıslem_id;
    }

    public void setBilgiıslem_id(int bilgiıslem_id) {
        this.bilgiıslem_id = bilgiıslem_id;
    }

    public String getBaslangic_tarihi() {
        return baslangic_tarihi;
    }

    public void setBaslangic_tarihi(String baslangic_tarihi) {
        this.baslangic_tarihi = baslangic_tarihi;
    }

    public String getBitis_tarihi() {
        return bitis_tarihi;
    }

    public void setBitis_tarihi(String bitis_tarihi) {
        this.bitis_tarihi = bitis_tarihi;
    }

    public Uye getUye() {
        if (this.uye == null) {
            this.uye = new Uye();

        }
        return uye;
    }

    public void setUye(Uye uye) {
        this.uye = uye;
    }

    public Egitim getEgitim() {
        if (this.egitim == null) {
            this.egitim = new Egitim();

        }
        return egitim;
    }

    public void setEgitim(Egitim egitim) {
        this.egitim = egitim;
    }

    @Override
    public int hashCode() {
        int hash = 3;
        hash = 29 * hash + this.bilgiıslem_id;
        hash = 29 * hash + Objects.hashCode(this.baslangic_tarihi);
        hash = 29 * hash + Objects.hashCode(this.bitis_tarihi);
        hash = 29 * hash + Objects.hashCode(this.uye);
        hash = 29 * hash + Objects.hashCode(this.egitim);
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
        final BilgiIslem other = (BilgiIslem) obj;
        if (this.bilgiıslem_id != other.bilgiıslem_id) {
            return false;
        }
        if (!Objects.equals(this.baslangic_tarihi, other.baslangic_tarihi)) {
            return false;
        }
        if (!Objects.equals(this.bitis_tarihi, other.bitis_tarihi)) {
            return false;
        }
        if (!Objects.equals(this.uye, other.uye)) {
            return false;
        }
        if (!Objects.equals(this.egitim, other.egitim)) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "BilgiIslem{" + "bilgi\u0131slem_id=" + bilgiıslem_id + ", baslangic_tarihi=" + baslangic_tarihi + ", bitis_tarihi=" + bitis_tarihi + ", uye=" + uye + ", egitim=" + egitim + '}';
    }

}
