/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.entities;

import eg.edu.tanta.enums.FlagsEnum;
import java.io.Serializable;
import javax.persistence.Cacheable;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.persistence.Transient;

/**
 *
 * @author Salma
 */
@Entity
@Table(name = "Note")
@Cacheable(false)
@NamedQueries({
    @NamedQuery(name = "Note.findAll", query = "SELECT n FROM Note n")})
public class Note implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "Note_ID")
    private Long noteID;
    @Column(name = "Note_Subject")
    private String noteSubject;
    @Column(name = "Note_Details")
    private String noteDetails;
    @Column(name = "Note_Law")
    private String noteLaw;
    @Column(name = "Note_Status")
    private int noteStatus;
    @Column(name = "Note_Person_Name")
    private String notePersonName;
    @JoinColumn(name = "Rep_ID", referencedColumnName = "Rep_ID")
    @ManyToOne(fetch = FetchType.LAZY)
    private Report repID;
    @JoinColumn(name = "Cat_ID", referencedColumnName = "Cat_ID")
    @ManyToOne(fetch = FetchType.LAZY)
    private Category catID;
    @Transient
    private boolean newObj;

    public Note() {
    }

    public Note(Long noteID) {
        this.noteID = noteID;
    }

    public Long getNoteID() {
        return noteID;
    }

    public void setNoteID(Long noteID) {
        this.noteID = noteID;
    }

    public String getNoteSubject() {
        return noteSubject;
    }

    public void setNoteSubject(String noteSubject) {
        this.noteSubject = noteSubject;
    }

    public String getNoteDetails() {
        return noteDetails;
    }

    public void setNoteDetails(String noteDetails) {
        this.noteDetails = noteDetails;
    }

    public String getNoteLaw() {
        return noteLaw;
    }

    public void setNoteLaw(String noteLaw) {
        this.noteLaw = noteLaw;
    }

    public Category getCatID() {
        return catID;
    }

    public void setCatID(Category catID) {
        this.catID = catID;
    }

    public boolean getNoteStatus() {
        return noteStatus == FlagsEnum.ON.getCode();
    }

    public void setNoteStatus(boolean noteStatus) {
        this.noteStatus = noteStatus ? FlagsEnum.ON.getCode() : FlagsEnum.OFF.getCode();
    }

    public String getNotePersonName() {
        return notePersonName;
    }

    public void setNotePersonName(String notePersonName) {
        this.notePersonName = notePersonName;
    }

    public Report getRepID() {
        return repID;
    }

    public void setRepID(Report repID) {
        this.repID = repID;
    }

    public boolean isNewObj() {
        return newObj;
    }

    public void setNewObj(boolean newObj) {
        this.newObj = newObj;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (noteID != null ? noteID.hashCode() : 0);
        return hash;
    }

    @Override
    public String toString() {
        return "eg.edu.tanta.entities.Note[ noteID=" + noteID + " ]";
    }

}
