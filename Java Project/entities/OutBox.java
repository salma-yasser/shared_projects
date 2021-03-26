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
@Table(name = "OutBox")
@Cacheable(false)
@NamedQueries({
    @NamedQuery(name = "OutBox.findAll", query = "SELECT o FROM OutBox o")})
public class OutBox implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "OUT_ID")
    private Long outId;
    @Column(name = "OUT_Num")
    private Long oUTNum;
    @Column(name = "OUT_Date")
    @Temporal(TemporalType.DATE)
    private Date oUTDate;
    @Column(name = "OUT_Subject")
    private String oUTSubject;
    @JoinColumn(name = "OUT_To", referencedColumnName = "ID")
    @ManyToOne(fetch = FetchType.LAZY)
    private AllOrganization oUTTo;
    @Column(name = "OUT_Num_Attach")
    private int oUTNumAttach;
    @JoinColumn(name = "Rep_ID", referencedColumnName = "Rep_ID")
    @ManyToOne(fetch = FetchType.LAZY)
    private Report repID;
    @JoinColumn(name = "Type_ID", referencedColumnName = "Type_ID")
    @ManyToOne(fetch = FetchType.LAZY)
    private Type typeID;
    @Transient
    private boolean newObj;

    public OutBox() {
    }

    public OutBox(Long outId) {
        this.outId = outId;
    }

    public Long getOutId() {
        return outId;
    }

    public void setOutId(Long outId) {
        this.outId = outId;
    }

    public Long getOUTNum() {
        return oUTNum;
    }

    public void setOUTNum(Long oUTNum) {
        this.oUTNum = oUTNum;
    }

    public Date getOUTDate() {
        return oUTDate;
    }

    public void setOUTDate(Date oUTDate) {
        this.oUTDate = oUTDate;
    }

    public String getOUTSubject() {
        return oUTSubject;
    }

    public void setOUTSubject(String oUTSubject) {
        this.oUTSubject = oUTSubject;
    }

    public AllOrganization getOUTTo() {
        return oUTTo;
    }

    public void setOUTTo(AllOrganization oUTTo) {
        this.oUTTo = oUTTo;
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

    public int getOUTNumAttach() {
        return oUTNumAttach;
    }

    public void setOUTNumAttach(int oUTNumAttach) {
        this.oUTNumAttach = oUTNumAttach;
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
        hash += (outId != null ? outId.hashCode() : 0);
        return hash;
    }
  
    @Override
    public String toString() {
        return "eg.edu.tanta.entities.OutBox[ outId=" + outId + " ]";
    }
    
}
