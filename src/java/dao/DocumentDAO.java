/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package dao;

import entity.Document;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

public class DocumentDAO extends SuperDAO {

    PreparedStatement pst = null;
    ResultSet rs = null;

    public void insert(Document d) {
        try {
            pst = this.getConnection().prepareStatement("insert into document(filepath,filename,filetype) values(?,?,?)");
            pst.setString(1, d.getFilePath());
            pst.setString(2, d.getFileName());
            pst.setString(3, d.getFileType());
            pst.executeUpdate();

        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }

    public void delete(Document document) {
        String query = "delete from document where document_id=?";

        try {
            pst = getConnection().prepareStatement(query);
            pst.setInt(1, document.getDocument_id());
            pst.executeUpdate();

        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }

    public List<Document> findAll(String deger, int page, int pageSize) {
        List<Document> dList = new ArrayList<>();
        int start = (page - 1) * pageSize;
        try {
            pst = this.getConnection().prepareStatement("select*from document where filename like ? or filetype like ? order by document_id asc limit " + start + " , " + pageSize);
            pst.setString(1, "%" + deger + "%");
            pst.setString(2, "%" + deger + "%");
            rs = pst.executeQuery();
            while (rs.next()) {
                Document d = new Document();
                d.setDocument_id(rs.getInt("document_id"));
                d.setFilePath(rs.getString("filepath"));
                d.setFileName(rs.getString("filename"));
                d.setFileType(rs.getString("filetype"));
                dList.add(d);
            }
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return dList;
    }

    public Document find(int id) {
        Document y = null;
        String query = ("select * from document where document_id=" + id);
        try {
            pst = getConnection().prepareStatement(query);
            rs = pst.executeQuery();
            rs.next();

            y = new Document();
            y.setDocument_id(rs.getInt("document_id"));
            y.setFilePath(rs.getString("filepath"));
            y.setFileName(rs.getString("filename"));
            y.setFileType(rs.getString("filetype"));
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return y;

    }

    public int count() {
        int count = 0;

        try {
            pst = this.getConnection().prepareStatement("select count(document_id) as document_count from document");
            rs = pst.executeQuery();
            rs.next();
            count = rs.getInt("document_count");

        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return count;
    }

}
