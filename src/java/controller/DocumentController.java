package controller;

import dao.DocumentDAO;
import entity.Document;
import java.io.File;
import java.io.IOException;
import java.io.InputStream;
import java.io.Serializable;
import java.nio.file.Files;
import java.util.List;
import javax.enterprise.context.SessionScoped;
import javax.inject.Named;
import javax.servlet.http.Part;

@Named
@SessionScoped
public class DocumentController implements Serializable {

    private Document document;
    private List<Document> documentList;
    private DocumentDAO documentDAO;
    private String bul = "";
    private Part doc;

    private final String uploadTo = "/Users/sebat/OneDrive/Belgeler/Projeler/FitnessSalon/web/upload/";

    public String getFileName(Part part) {
        for (String cd : part.getHeader("content-disposition").split(":")) {
            if (cd.trim().startsWith("filename")) {
                String filename = cd.substring(cd.indexOf('=') + 1).trim().replace("\"", "");
                return filename;
            }
        }
        return "";
    }

    private int page = 1;
    private int pageSize = 6;
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
        this.pageCount = (int) Math.ceil(this.getDocumentDAO().count() / (double) pageSize);
        return pageCount;
    }

    public void setPageCount(int pageCount) {
        this.pageCount = pageCount;
    }

    public void upload() {
        try {
            InputStream input = doc.getInputStream();
            File f = new File(uploadTo+getFileName(doc));
            Files.copy(input, f.toPath());

            document = this.getDocument();
            document.setFilePath(f.getParent());
            document.setFileName(f.getName());
            document.setFileType(doc.getContentType());

            this.getDocumentDAO().insert(document);

        } catch (IOException e) {
            System.out.println(e.getMessage());
        }
    }

    public void updateForm(Document document) {
        this.document = document;
    }

    public String getUploadTo() {
        return uploadTo;
    }

    public void delete() {
        this.getDocumentDAO().delete(this.document);
        this.document = new Document();

    }

    public String getBul() {
        return bul;
    }

    public void setBul(String bul) {
        this.bul = bul;
    }

    public DocumentController() {
    }

    public Document getDocument() {
        if (this.document == null) {
            this.document = new Document();
        }
        return document;
    }

    public void setDocument(Document document) {
        this.document = document;
    }

    public List<Document> getDocumentList() {
        this.documentList = this.getDocumentDAO().findAll(this.bul, page, pageSize);
        return documentList;
    }

    public void setDocumentList(List<Document> documentList) {
        this.documentList = documentList;
    }

    public DocumentDAO getDocumentDAO() {
        if (this.documentDAO == null) {
            this.documentDAO = new DocumentDAO();

        }
        return documentDAO;
    }

    public void setDocumentDAO(DocumentDAO documentDAO) {
        this.documentDAO = documentDAO;
    }

    public Part getDoc() {
        return doc;
    }

    public void setDoc(Part doc) {
        this.doc = doc;
    }
}
