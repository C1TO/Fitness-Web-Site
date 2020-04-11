package controller;

import dao.ProgramListesiDAO;
import entity.ProgramListesi;
import java.io.Serializable;
import java.util.List;
import javax.enterprise.context.SessionScoped;
import javax.inject.Inject;
import javax.inject.Named;

@Named
@SessionScoped
public class ProgramListesiController implements Serializable {

    private List<ProgramListesi> plist;
    private ProgramListesiDAO pdao;
    private ProgramListesi programListesi;
    
     @Inject
    private EgitimController egitimController;

    public void updateForm(ProgramListesi programListesi) {
        this.programListesi = programListesi;
    }

    public void clearForm() {
        this.programListesi = new ProgramListesi();
    }

    public void create() {
        this.getPdao().insert(this.programListesi);
        this.clearForm();
    }

    public void delete() {
        this.getPdao().delete(this.programListesi);
        this.clearForm();
    }

    public void update() {
        this.getPdao().update(this.programListesi);
        this.clearForm();
    }

    public List<ProgramListesi> getPlist() {
        this.plist=this.getPdao().findAll();
        return plist;
    }

    public void setPlist(List<ProgramListesi> plist) {
        this.plist = plist;
    }

    public ProgramListesiDAO getPdao() {
        if(this.pdao == null)
        {
            this.pdao = new ProgramListesiDAO();
        }
        return pdao;
    }

    public void setPdao(ProgramListesiDAO pdao) {
        this.pdao = pdao;
    }

    public ProgramListesi getProgramListesi() {
        if(this.programListesi == null)
        {
            this.programListesi = new ProgramListesi();
        }
        return programListesi;
    }

    public void setProgramListesi(ProgramListesi programListesi) {
        this.programListesi = programListesi;
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
