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
@Table(name = "InBox")
@Cacheable(false)
@NamedQueries({
    @NamedQuery(name = "InBox.findAll", query = "SELECT i FROM InBox i")})
public class InBox implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "IN_ID")
    private Long inId;
    @Column(name = "IN_Num")
    private Long iNNum;
    @Column(name = "IN_Date")
    @Temporal(TemporalType.DATE)
    private Date iNDate;
    @Column(name = "IN_Subject")
    private String iNSubject;
    @JoinColumn(name = "IN_To", referencedColumnName = "ID")
    @ManyToOne(fetch = FetchType.LAZY)
    private AllOrganization iNTo;
    @Column(name = "IN_Num_Attach")
    private int iNNumAttach;
    @JoinColumn(name = "Rep_ID", referencedColumnName = "Rep_ID")
    @ManyToOne(fetch = FetchType.LAZY)
    private Report repID;
    @JoinColumn(name = "Type_ID", referencedColumnName = "Type_ID")
    @ManyToOne(fetch = FetchType.LAZY)
    private Type typeID;
    @Transient
    private boolean newObj;

    public InBox() {
    }

    public InBox(Long inId) {
        this.inId = inId;
    }

    public Long getInId() {
        return inId;
    }

    public void setInId(Long inId) {
        this.inId = inId;
    }

    public Long getINNum() {
        return iNNum;
    }

    public void setINNum(Long iNNum) {
        this.iNNum = iNNum;
    }

    public Date getINDate() {
        return iNDate;
    }

    public void setINDate(Date iNDate) {
        this.iNDate = iNDate;
    }

    public String getINSubject() {
        return iNSubject;
    }

    public void setINSubject(String iNSubject) {
        this.iNSubject = iNSubject;
    }

    public AllOrganization getINTo() {
        return iNTo;
    }

    public void setINTo(AllOrganization iNTo) {
        this.iNTo = iNTo;
    }

    public Report getRepID() {
        return repID;
    }

    public void setRepID(Report repID) {
        this.repID = repID;
    }

    public Type getTypeID() {
        return typeID;
    }

    public void setTypeID(Type typeID) {
        this.typeID = typeID;
    }

    public int getINNumAttach() {
        return iNNumAttach;
    }

    public void setINNumAttach(int iNNumAttach) {
        this.iNNumAttach = iNNumAttach;
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
        hash += (inId != null ? inId.hashCode() : 0);
        return hash;
    }

    @Override
    public String toString() {
        return "eg.edu.tanta.entities.InBox[ inId=" + inId + " ]";
    }

}
