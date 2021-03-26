/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.entities;

import eg.edu.tanta.enums.FlagsEnum;
import java.io.ByteArrayInputStream;
import java.io.InputStream;
import java.io.Serializable;
import java.util.Date;
import java.util.List;
import javax.persistence.Cacheable;
import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.Lob;
import javax.persistence.ManyToOne;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.OneToMany;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.persistence.Transient;
import org.primefaces.model.DefaultStreamedContent;
import org.primefaces.model.StreamedContent;

/**
 *
 * @author Salma
 */
@Entity
@Table(name = "Commission")
@Cacheable(false)
@NamedQueries({
    @NamedQuery(name = "Commission.searchCommission",
            query = "SELECT DISTINCT c "
            + "FROM Commission c LEFT OUTER JOIN c.commissionMemberList m "
            + "where (:P_COMM_ID = -1 or c.commID = :P_COMM_ID) "
            + "and(:P_COMM_NUMBER = -1 or c.commNumber = :P_COMM_NUMBER) "
            + "and (:P_COMM_DATEFROM = null "
            + "or  (:P_COMM_DATETO = null and c.commDate >= :P_COMM_DATEFROM ) "
            + "or  (c.commDate between :P_COMM_DATEFROM and :P_COMM_DATETO)) "
            + "and (:P_FACULTY_ID = -1 or c.facID.facID = :P_FACULTY_ID) "
            + "and (:P_STATUS = -1 or c.commstatus = :P_STATUS) "
            + "and (:P_MEMB_NAME = '-1' or  m.commMembName like :P_MEMB_NAME or  c.commChefName like :P_MEMB_NAME ) "
            + "and (:P_COMM_SUBJECT = '-1' or c.commSubject like :P_COMM_SUBJECT) "
            + "and (:P_DEC_FROM = '-1' or c.commDecFrom like :P_DEC_FROM) "
            + "order by c.commDate desc")})

public class Commission implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "Comm_ID")
    private Long commID;
    @Column(name = "Comm_Number")
    private Long commNumber;
    @Column(name = "Comm_Dec_From")
    private String commDecFrom;
    @Column(name = "Comm_status")
    private int commstatus;
    @Column(name = "Comm_Comment")
    private String commComment;
    @Column(name = "Comm_Subject")
    private String commSubject;
    @Column(name = "Comm_Date")
    @Temporal(TemporalType.TIMESTAMP)
    private Date commDate;
    @Lob
    @Column(name = "Comm_Rep_Photo")
    private byte[] commRepPhoto;
    @Column(name = "Comm_Rep_Name")
    private String commRepName;
    @Column(name = "Comm_Rep_Type")
    private String commRepType;
    @Lob
    @Column(name = "Comm_Decision_Photo")
    private byte[] commDecisionPhoto;
    @Column(name = "Comm_Decision_Name")
    private String commDecisionName;
    @Column(name = "Comm_Decision_Type")
    private String commDecisionType;
    @Column(name = "Comm_Conclusion")
    private String commConclusion;
    @Column(name = "Comm_Chef_Name")
    private String commChefName;
    @Column(name = "Comm_Cehf_Manag")
    private String commChefManag;
    @OneToMany(mappedBy = "commID", fetch = FetchType.LAZY, cascade = CascadeType.ALL, orphanRemoval = true)
    private List<CommissionAction> commissionActionList;
    @OneToMany(mappedBy = "commID", fetch = FetchType.LAZY, cascade = CascadeType.ALL, orphanRemoval = true)
    private List<CommissionMember> commissionMemberList;
    @JoinColumn(name = "Fac_ID", referencedColumnName = "Fac_ID")
    @ManyToOne(fetch = FetchType.LAZY)
    private Faculty facID;
    @Transient
    private boolean newObj;

    public Commission() {
    }

    public Commission(Long commID) {
        this.commID = commID;
    }

    public boolean isNewObj() {
        return newObj;
    }

    public void setNewObj(boolean newObj) {
        this.newObj = newObj;
    }

    public Long getCommID() {
        return commID;
    }

    public void setCommID(Long commID) {
        this.commID = commID;
    }

    public Long getCommNumber() {
        return commNumber;
    }

    public void setCommNumber(Long commNumber) {
        this.commNumber = commNumber;
    }

    public Date getCommDate() {
        return commDate;
    }

    public void setCommDate(Date commDate) {
        this.commDate = commDate;
    }

    public StreamedContent getCommRepPhoto() {
        if (commRepPhoto != null) {
            InputStream is = new ByteArrayInputStream(commRepPhoto);
            return new DefaultStreamedContent(is, commRepType, commRepName);
        }
        return null;
    }

    public void setCommRepPhoto(byte[] commRepPhoto) {
        this.commRepPhoto = commRepPhoto;
    }

    public StreamedContent getCommDecisionPhoto() {
        if (commDecisionPhoto != null) {
            InputStream is = new ByteArrayInputStream(commDecisionPhoto);
            return new DefaultStreamedContent(is, commDecisionType, commDecisionName);
        }
        return null;
    }

    public void setCommDecisionPhoto(byte[] commDecisionPhoto) {
        this.commDecisionPhoto = commDecisionPhoto;
    }

    public String getCommConclusion() {
        return commConclusion;
    }

    public void setCommConclusion(String commConclusion) {
        this.commConclusion = commConclusion;
    }

    public String getCommDecFrom() {
        return commDecFrom;
    }

    public void setCommDecFrom(String commDecFrom) {
        this.commDecFrom = commDecFrom;
    }

    public boolean getCommstatus() {
        return commstatus == FlagsEnum.ON.getCode();
    }

    public void setCommstatus(boolean commstatus) {
        this.commstatus = commstatus ? FlagsEnum.ON.getCode() : FlagsEnum.OFF.getCode();
    }

    public String getCommComment() {
        return commComment;
    }

    public void setCommComment(String commComment) {
        this.commComment = commComment;
    }

    public String getCommSubject() {
        return commSubject;
    }

    public void setCommSubject(String commSubject) {
        this.commSubject = commSubject;
    }

    public List<CommissionAction> getCommissionActionList() {
        return commissionActionList;
    }

    public void setCommissionActionList(List<CommissionAction> commissionActionList) {
        this.commissionActionList = commissionActionList;
    }

    public List<CommissionMember> getCommissionMemberList() {
        return commissionMemberList;
    }

    public void setCommissionMemberList(List<CommissionMember> commissionMemberList) {
        this.commissionMemberList = commissionMemberList;
    }

    public Faculty getFacID() {
        return facID;
    }

    public void setFacID(Faculty facID) {
        this.facID = facID;
    }

    public String getCommChefName() {
        return commChefName;
    }

    public void setCommChefName(String commChefName) {
        this.commChefName = commChefName;
    }

    public String getCommChefManag() {
        return commChefManag;
    }

    public void setCommChefManag(String commChefManag) {
        this.commChefManag = commChefManag;
    }

    public String getCommRepName() {
        return commRepName;
    }

    public void setCommRepName(String commRepName) {
        this.commRepName = commRepName;
    }

    public String getCommRepType() {
        return commRepType;
    }

    public void setCommRepType(String commRepType) {
        this.commRepType = commRepType;
    }

    public String getCommDecisionName() {
        return commDecisionName;
    }

    public void setCommDecisionName(String commDecisionName) {
        this.commDecisionName = commDecisionName;
    }

    public String getCommDecisionType() {
        return commDecisionType;
    }

    public void setCommDecisionType(String commDecisionType) {
        this.commDecisionType = commDecisionType;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (commID != null ? commID.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Commission)) {
            return false;
        }
        Commission other = (Commission) object;
        if ((this.commID == null && other.commID != null) || (this.commID != null && !this.commID.equals(other.commID))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "eg.edu.tanta.entities.Commission[ commID=" + commID + " ]";
    }

}
