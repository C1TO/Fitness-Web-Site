package controller;

import dao.BilgiIslemDAO;
import entity.BilgiIslem;
import java.io.Serializable;
import java.util.List;
import javax.enterprise.context.SessionScoped;
import javax.faces.bean.ManagedBean;
import javax.inject.Inject;
import javax.inject.Named;

@ManagedBean(name = "date")
@Named
@SessionScoped
public class BilgiIslemController implements Serializable {

    private List<BilgiIslem> bilgiıslem_list;
    private BilgiIslemDAO bilgiıslem_dao;
    private BilgiIslem bilgiıslem;

    @Inject
    private UyeController uyeController;
    @Inject
    private EgitimController egitimController;
    @Inject
    private AlinanEgitimController alinanController;

    private int page = 1;
    private int pageSize = 6;
    private int pageCount;

    public void ileri(){
        if (this.page ==this.getPageCount()) 
            this.page=1;
        else
        this.page++;
    }
    public void geri(){
        if (this.page==1) 
            this.page=this.getPageCount();
        else
        this.page--;
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
        this.pageCount = (int) Math.ceil(this.getBilgiıslem_dao().count() / (double) pageSize);
        return pageCount;
    }

    public void setPageCount(int pageCount) {
        this.pageCount = pageCount;
    }

    public void updateForm(BilgiIslem bilgiıslem) {
        this.bilgiıslem = bilgiıslem;
    }

    public void clearForm() {
        this.bilgiıslem = new BilgiIslem();
    }

    public void create() {
        this.getBilgiıslem_dao().insert(this.bilgiıslem);
        this.clearForm();
    }

    public void delete() {
        this.getBilgiıslem_dao().delete(this.bilgiıslem);
        this.clearForm();
    }

    public void update() {
        this.getBilgiıslem_dao().update(this.bilgiıslem);
        this.clearForm();
    }

    public List<BilgiIslem> getBilgiıslem_list() {
        this.bilgiıslem_list = this.getBilgiıslem_dao().findAll(page, pageSize);
        return bilgiıslem_list;
    }

    public void setBilgiıslem_list(List<BilgiIslem> bilgiıslem_list) {
        this.bilgiıslem_list = bilgiıslem_list;
    }

    public BilgiIslemDAO getBilgiıslem_dao() {
        if (this.bilgiıslem_dao == null) {
            this.bilgiıslem_dao = new BilgiIslemDAO();

        }
        return bilgiıslem_dao;
    }

    public void setBilgiıslem_dao(BilgiIslemDAO bilgiıslem_dao) {
        this.bilgiıslem_dao = bilgiıslem_dao;
    }

    public BilgiIslem getBilgiıslem() {
        if (bilgiıslem == null) {
            this.bilgiıslem = new BilgiIslem();

        }
        return bilgiıslem;
    }

    public void setBilgiıslem(BilgiIslem bilgiıslem) {
        this.bilgiıslem = bilgiıslem;
    }

    public UyeController getUyeController() {
        if (this.uyeController == null) {
            this.uyeController = new UyeController();

        }
        return uyeController;
    }

    public void setUyeController(UyeController uyeController) {
        this.uyeController = uyeController;
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

    public AlinanEgitimController getAlinanController() {
        if (this.alinanController == null) {
            this.alinanController = new AlinanEgitimController();
        }
        return alinanController;
    }

    public void setAlinanController(AlinanEgitimController alinanController) {
        this.alinanController = alinanController;
    }

}
