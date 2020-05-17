package controller;

import dao.UyeDAO;
import entity.Egitim;
import entity.Uye;
import java.io.Serializable;
import java.util.List;
import javax.enterprise.context.SessionScoped;
import javax.inject.Inject;
import javax.inject.Named;

@Named
@SessionScoped
public class UyeController implements Serializable {

    private List<Uye> uyelist;
    private UyeDAO uyedao;
    private Uye uye;
    private List<Egitim> listEgitim;
    private String bul = "";
    @Inject
    private EgitimController egitimController;

    private int page = 1;
    private int pageSize = 4;
    private int pageCount;

    public void ileri() {
        if (this.page == this.getPageCount()) {
            this.page = 1;
        } else {
            this.page++;
        }
    }

    public void geri() {
        if (this.page == 1) {
            this.page = this.getPageCount();
        } else {
            this.page--;
        }
    }

    public int getPage() {
        return page;
    }

    public void setPage(int page) {
        this.page = page;
    }

    public int getPageSize() {
        return pageSize;
    }

    public void setPageSize(int pageSize) {
        this.pageSize = pageSize;
    }

    public int getPageCount() {
        this.pageCount = (int) Math.ceil(this.getUyedao().count() / (double) pageSize);
        return pageCount;
    }

    public void setPageCount(int pageCount) {
        this.pageCount = pageCount;
    }

    public void updateForm(Uye uye) {
        this.uye = uye;
    }

    public void clearForm() {
        this.uye = new Uye();
    }

    public void create() {
        this.getUyedao().insert(this.uye);
        this.clearForm();
    }

    public void kayitol() {
        this.getUyedao().Kayitol(this.uye);
        this.clearForm();
    }

  

    public void delete() {
        this.getUyedao().delete(this.uye);
        this.clearForm();
    }

    public void update() {
        this.getUyedao().update(this.uye);
        this.clearForm();
    }

    public List<Uye> getUyelist() {
        this.uyelist = this.getUyedao().findAll(this.bul, page, pageSize);
        return uyelist;
    }

    public void setUyelist(List<Uye> uyelist) {
        this.uyelist = uyelist;
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

    public Uye getUye() {
        if (this.uye == null) {
            this.uye = new Uye();

        }
        return uye;
    }

    public void setUye(Uye uye) {
        this.uye = uye;
    }

    public EgitimController getEgitimController() {
        if (this.egitimController == null) {
            this.egitimController = new EgitimController();
        }
        return egitimController;
    }

    public void setEgitimController(EgitimController egitimController) {
        this.egitimController = egitimController;
    }

    public List<Egitim> getListEgitim() {
        return listEgitim;
    }

    public void setListEgitim(List<Egitim> listEgitim) {
        this.listEgitim = listEgitim;
    }

    public String getBul() {
        return bul;
    }

    public void setBul(String bul) {
        this.bul = bul;
    }

}
