package controller;

import dao.UyeDAO;
import entity.Uye;
import java.io.Serializable;
import java.util.List;
import javax.enterprise.context.SessionScoped;
import javax.inject.Named;

@Named
@SessionScoped
public class UyeController implements Serializable {

    private List<Uye> uyelist;
    private UyeDAO uyedao;
    private Uye uye;

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

    public void delete() {
        this.getUyedao().delete(this.uye);
        this.clearForm();
    }

    public void update() {
        this.getUyedao().update(this.uye);
        this.clearForm();
    }

    public List<Uye> getUyelist() {
        this.uyelist = this.getUyedao().findAll();
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

}
