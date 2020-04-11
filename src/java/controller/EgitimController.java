package controller;

import dao.EgitimDAO;
import entity.Egitim;
import java.io.Serializable;
import java.util.List;
import javax.enterprise.context.SessionScoped;
import javax.inject.Inject;
import javax.inject.Named;

@Named
@SessionScoped
public class EgitimController implements Serializable {

    private List<Egitim> egitim_list;
    private EgitimDAO egitim_dao;
    private Egitim egitim;

    
    //Egitmen controller sınıfı eklenecek
    
    @Inject
    private EgitmenController egitmenController;

    public EgitmenController getEgitmenController() {
        return egitmenController;
    }

    public void setEgitmenController(EgitmenController egitmenController) {
        this.egitmenController = egitmenController;
    }

    public void updateForm(Egitim egitim) {
        this.egitim = egitim;
    }

    public void clearForm() {
        this.egitim = new Egitim();
    }

    public void create() {
        this.getEgitim_dao().insert(this.egitim);
        this.clearForm();
    }

    public void delete() {
        this.getEgitim_dao().delete(this.egitim);
        this.clearForm();
    }

    public void update() {
        this.getEgitim_dao().update(this.egitim);
        this.clearForm();
    }

    public List<Egitim> getEgitim_list() {
        this.egitim_list = this.getEgitim_dao().findAll();
        return egitim_list;
    }

    public void setEgitim_list(List<Egitim> egitim_list) {
        this.egitim_list = egitim_list;
    }

    public EgitimDAO getEgitim_dao() {
        if (this.egitim_dao == null) {
            this.egitim_dao = new EgitimDAO();
        }
        return egitim_dao;
    }

    public void setEgitim_dao(EgitimDAO egitim_dao) {
        this.egitim_dao = egitim_dao;
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
