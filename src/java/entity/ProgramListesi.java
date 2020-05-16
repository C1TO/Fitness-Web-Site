package entity;

public class ProgramListesi {

    private int program_id;
    private String hareket_adi;
    private String tekrar_sayisi;
    private String hareket_bolgesi;

    private Egitim egitim;

    public ProgramListesi() {
    }

    public ProgramListesi(int program_id, String hareket_adi, String tekrar_sayisi, String hareket_bolgesi) {
        this.program_id = program_id;
        this.hareket_adi = hareket_adi;
        this.tekrar_sayisi = tekrar_sayisi;
        this.hareket_bolgesi = hareket_bolgesi;

    }

    public int getProgram_id() {
        return program_id;
    }

    public void setProgram_id(int program_id) {
        this.program_id = program_id;
    }

    public String getHareket_adi() {
        return hareket_adi;
    }

    public void setHareket_adi(String hareket_adi) {
        this.hareket_adi = hareket_adi;
    }

    public String getTekrar_sayisi() {
        return tekrar_sayisi;
    }

    public void setTekrar_sayisi(String tekrar_sayisi) {
        this.tekrar_sayisi = tekrar_sayisi;
    }

    public String getHareket_bolgesi() {
        return hareket_bolgesi;
    }

    public void setHareket_bolgesi(String hareket_bolgesi) {
        this.hareket_bolgesi = hareket_bolgesi;
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

}
