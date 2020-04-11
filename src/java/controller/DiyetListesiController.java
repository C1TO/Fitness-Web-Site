package controller;

import dao.DiyetListesiDAO;
import entity.DiyetListesi;
import java.io.Serializable;
import java.util.List;
import javax.enterprise.context.SessionScoped;
import javax.inject.Inject;
import javax.inject.Named;

@Named
@SessionScoped
public class DiyetListesiController implements Serializable {

    private List<DiyetListesi> diyet_list;
    private DiyetListesiDAO diyet_dao;
    private DiyetListesi diyetListesi;
    
    
    @Inject
    private EgitimController egitimController;

    public void updateForm(DiyetListesi diyetListesi) {
        this.diyetListesi = diyetListesi;
    }

    public void clearForm() {
        this.diyetListesi = new DiyetListesi();
    }

    public void create() {
        this.getDiyet_dao().insert(this.diyetListesi);
        this.clearForm();
    }

    public void delete() {
        this.getDiyet_dao().delete(this.diyetListesi);
        this.clearForm();
    }

    public void update() {
        this.getDiyet_dao().update(this.diyetListesi);
        this.clearForm();
    }

    public List<DiyetListesi> getDiyet_list() {
        this.diyet_list = this.getDiyet_dao().findAll();
        return diyet_list;
    }

    public void setDiyet_list(List<DiyetListesi> diyet_list) {
        this.diyet_list = diyet_list;
    }

    public DiyetListesiDAO getDiyet_dao() {
        if (this.diyet_dao == null) {
            this.diyet_dao = new DiyetListesiDAO();
            
        }
        return diyet_dao;
    }

    public void setDiyet_dao(DiyetListesiDAO diyet_dao) {
        this.diyet_dao = diyet_dao;
    }

    public DiyetListesi getDiyetListesi() {
        if (this.diyetListesi == null) {
            this.diyetListesi = new DiyetListesi();
            
        }
        return diyetListesi;
    }

    public void setDiyetListesi(DiyetListesi diyetListesi) {
        this.diyetListesi = diyetListesi;
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
}
