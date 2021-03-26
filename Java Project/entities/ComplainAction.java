/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.entities;

import java.io.Serializable;
import java.util.Date;
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
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.persistence.Transient;

/**
 *
 * @author Salma
 */
@Entity
@Table(name = "Complain_Action")
@Cacheable(false)
@NamedQueries({
    @NamedQuery(name = "ComplainAction.findAll", query = "SELECT c FROM ComplainAction c")})
public class ComplainAction implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "Comp_Action_ID")
    private Long compActionID;
    @Column(name = "Comp_Action_Date")
    @Temporal(TemporalType.TIMESTAMP)
    private Date compActionDate;
    @Column(name = "Comp_Action_Comment")
    private String compActionComment;
    @JoinColumn(name = "Comp_ID", referencedColumnName = "Comp_ID")
    @ManyToOne(fetch = FetchType.LAZY)
    private Complain compID;
    @Transient
    private boolean newObj;

    public ComplainAction() {
    }

    public ComplainAction(Long compActionID) {
        this.compActionID = compActionID;
    }

    public Long getCompActionID() {
        return compActionID;
    }

    public void setCompActionID(Long compActionID) {
        this.compActionID = compActionID;
    }

    public Date getCompActionDate() {
        return compActionDate;
    }

    public void setCompActionDate(Date compActionDate) {
        this.compActionDate = compActionDate;
    }

    public String getCompActionComment() {
        return compActionComment;
    }

    public void setCompActionComment(String compActionComment) {
        this.compActionComment = compActionComment;
    }

    public Complain getCompID() {
        return compID;
    }

    public void setCompID(Complain compID) {
        this.compID = compID;
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
        hash += (compActionID != null ? compActionID.hashCode() : 0);
        return hash;
    }

    @Override
    public String toString() {
        return "eg.edu.tanta.entities.ComplainAction[ compActionID=" + compActionID + " ]";
    }

}
