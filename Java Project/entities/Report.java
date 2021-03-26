/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.entities;

import eg.edu.tanta.enums.FlagsEnum;
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
import javax.persistence.ManyToOne;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.OneToMany;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.persistence.Transient;

/**
 *
 * @author Salma
 */
@Entity
@Table(name = "Report")
@Cacheable(false)
@NamedQueries({
    @NamedQuery(name = "Report.searchReport",
            query = "SELECT DISTINCT r "
            + "FROM Report r LEFT OUTER JOIN r.noteList n LEFT OUTER JOIN r.inBoxList i "
            + "where (:P_REPORT_ID = -1 or r.repID = :P_REPORT_ID) "
            + "and (:P_REPORT_NUMBER = -1 or r.repNumber = :P_REPORT_NUMBER) "
            + "and (:P_DEP_ID = -1 or r.deptID.deptID = :P_DEP_ID) "
            + "and (:P_FROM_DATE = null "
            + "or  (:P_TO_DATE = null and r.repDate >= :P_FROM_DATE ) "
            + "or  (r.repDate between :P_FROM_DATE and :P_TO_DATE)) "
            + "and (:P_ORGANIZATION_ID = -1 or r.orgID.orgID = :P_ORGANIZATION_ID) "
            + "and (:P_FACULTY_ID = -1 or r.facID.facID = :P_FACULTY_ID) "
            + "and (:P_STATUS = -1 or r.repStatus = :P_STATUS) "
            + "and (:P_NOTE_CAT = -1 or n.catID.catID = :P_NOTE_CAT) "
            + "and (:P_INBOX_NUMBER = -1 or i.iNNum = :P_INBOX_NUMBER) "
            + "order by r.repDate desc")})
public class Report implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "Rep_ID")
    private Long repID;
    @Column(name = "Rep_Number")
    private Long repNumber;
    @Column(name = "Rep_Subject")
    private String repSubject;
    @Column(name = "Rep_Date")
    @Temporal(TemporalType.DATE)
    private Date repDate;
    @Column(name = "Rep_Status")
    private int repStatus;
    @Column(name = "Rep_No_of_Note")
    private short repNoofNote;
    @Column(name = "Rep_Comment")
    private String repComment;
    @JoinColumn(name = "Fac_ID", referencedColumnName = "Fac_ID")
    @ManyToOne(fetch = FetchType.LAZY)
    private Faculty facID;
    @JoinColumn(name = "Dept_ID", referencedColumnName = "Dept_ID")
    @ManyToOne(fetch = FetchType.LAZY)
    private Departement deptID;
    @JoinColumn(name = "Org_ID", referencedColumnName = "Org_ID")
    @ManyToOne(fetch = FetchType.LAZY)
    private Organization orgID;
    @OneToMany(mappedBy = "repID", fetch = FetchType.LAZY, cascade = CascadeType.ALL, orphanRemoval=true)
    private List<Note> noteList;
    @OneToMany(mappedBy = "repID", fetch = FetchType.LAZY, cascade = CascadeType.ALL, orphanRemoval=true)
    private List<OutBox> outBoxList;
    @OneToMany(mappedBy = "repID", fetch = FetchType.LAZY, cascade = CascadeType.ALL, orphanRemoval=true)
    private List<InBox> inBoxList;
    @Transient
    private boolean newObj;

    public Report() {
    }

    public Report(Long repID) {
        this.repID = repID;
    }

    public Long getRepID() {
        return repID;
    }

    public void setRepID(Long repID) {
        this.repID = repID;
    }

    public Long getRepNumber() {
        return repNumber;
    }

    public void setRepNumber(Long repNumber) {
        this.repNumber = repNumber;
    }

    public String getRepSubject() {
        return repSubject;
    }

    public void setRepSubject(String repSubject) {
        this.repSubject = repSubject;
    }

    public Date getRepDate() {
        return repDate;
    }

    public void setRepDate(Date repDate) {
        this.repDate = repDate;
    }

    public boolean getRepStatus() {
        return repStatus == FlagsEnum.ON.getCode();
    }

    public void setRepStatus(boolean repStatus) {
        this.repStatus = repStatus ? FlagsEnum.ON.getCode() : FlagsEnum.OFF.getCode();
    }

    public Short getRepNoofNote() {
        return repNoofNote;
    }

    public void setRepNoofNote(Short repNoofNote) {
        this.repNoofNote = repNoofNote;
    }

    public Faculty getFacID() {
        return facID;
    }

    public void setFacID(Faculty facID) {
        this.facID = facID;
    }

    public Organization getOrgID() {
        return orgID;
    }

    public void setOrgID(Organization orgID) {
        this.orgID = orgID;
    }

    public String getRepComment() {
        return repComment;
    }

    public void setRepComment(String repComment) {
        this.repComment = repComment;
    }

    public Departement getDeptID() {
        return deptID;
    }

    public void setDeptID(Departement deptID) {
        this.deptID = deptID;
    }

    public List<Note> getNoteList() {
        return noteList;
    }

    public void setNoteList(List<Note> noteList) {
        this.noteList = noteList;
    }

    public List<OutBox> getOutBoxList() {
        return outBoxList;
    }

    public void setOutBoxList(List<OutBox> outBoxList) {
        this.outBoxList = outBoxList;
    }

    public List<InBox> getInBoxList() {
        return inBoxList;
    }

    public void setInBoxList(List<InBox> inBoxList) {
        this.inBoxList = inBoxList;
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
        hash += (repID != null ? repID.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Report)) {
            return false;
        }
        Report other = (Report) object;
        if ((this.repID == null && other.repID != null) || (this.repID != null && !this.repID.equals(other.repID))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "eg.edu.tanta.entities.Report[ repID=" + repID + " ]";
    }

}
