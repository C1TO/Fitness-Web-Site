package controller;

import dao.EgitmenDAO;
import entity.Egitmen;
import entity.Kullanici;
import java.io.Serializable;
import java.util.List;
import javax.enterprise.context.SessionScoped;
import javax.inject.Named;

@Named
@SessionScoped
public class EgitmenController implements Serializable {

    private List<Egitmen> egitmenlist;

    private EgitmenDAO egitmendao;

    private Egitmen egitmen;
    private Kullanici kullanici;
    

    public void updateForm(Egitmen egitmen) {
        this.egitmen = egitmen;
    }

    public void clearForm() {
        this.egitmen = new Egitmen();
    }

    public void create() {
        this.getEgitmendao().insert(this.egitmen);
        this.clearForm();
    }

    public void delete() {
        this.getEgitmendao().delete(this.egitmen);
        this.clearForm();
    }

    public void update() {
        this.getEgitmendao().update(this.egitmen);
        this.clearForm();
    }

    public List<Egitmen> getEgitmenlist() {
        this.egitmenlist = this.getEgitmendao().findAll();
        return egitmenlist;
    }

    public void setEgitmenlist(List<Egitmen> egitmenlist) {
        this.egitmenlist = egitmenlist;
    }

    public EgitmenDAO getEgitmendao() {
        if (this.egitmendao == null) {
            this.egitmendao = new EgitmenDAO();
        }
        return egitmendao;
    }

    public void setEgitmendao(EgitmenDAO egitmendao) {
        this.egitmendao = egitmendao;
    }

    public Egitmen getEgitmen() {
        if (this.egitmen == null) {
            this.egitmen = new Egitmen();
        }
        return egitmen;
    }

    public void setEgitmen(Egitmen egitmen) {
        this.egitmen = egitmen;
    }

    public Kullanici getKullanici() {
        if(this.kullanici == null)
        {
            this.kullanici = new Kullanici();
        }
        return kullanici;
    }

    public void setKullanici(Kullanici kullanici) {
        this.kullanici = kullanici;
    }

    
    @Override
    public String toString() {
        return "EgitmenController{" + "egitmenlist=" + egitmenlist + ", egitmendao=" + egitmendao + ", egitmen=" + egitmen + '}';
    }

    
    
}
