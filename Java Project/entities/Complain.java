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
@Table(name = "Complain")
@Cacheable(false)
@NamedQueries({
    @NamedQuery(name = "Complain.searchComplain", 
            query = "SELECT c FROM Complain c "
            + "where (:P_COMP_ID = -1 or c.compID = :P_COMP_ID) "
            + "and (:P_COMP_NUMBER = -1 or c.compNumber = :P_COMP_NUMBER) "
            + "and (:P_DEP_ID = -1 or c.deptID.deptID = :P_DEP_ID) "
            + "and (:P_COMP_DATEFROM = null "
            + "or  (:P_COMP_DATETO = null and c.compDate >= :P_COMP_DATEFROM ) "
            + "or  (c.compDate between :P_COMP_DATEFROM and :P_COMP_DATETO)) "
            + "and (:P_FACULTY_ID = -1 or c.facID.facID = :P_FACULTY_ID) "
            + "and (:P_STATUS = -1 or c.compstatus = :P_STATUS) "
            + "and (:P_COMPLAINER_NAME = '-1' or c.compComplainername like :P_COMPLAINER_NAME ) "
            + "and (:P_COMP_SUBJECT = '-1' or c.compSubject like :P_COMP_SUBJECT ) " 
            + "and (:P_COMP_TYPE = '-1' or c.compType = :P_COMP_TYPE) "
            + "order by c.compDate desc")})
public class Complain implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "Comp_ID")
    private Long compID;
    @Column(name = "Comp_Number")
    private Long compNumber;
    @Column(name = "Comp_status")
    private int compstatus;
    @Column(name = "Comp_Subject")
    private String compSubject;
    @Column(name = "Comp_Date")
    @Temporal(TemporalType.TIMESTAMP)
    private Date compDate;
    @Column(name = "Comp_Complainer_name")
    private String compComplainername;
    @Column(name = "Comp_Comment")
    private String compComment;
    @Column(name = "Comp_Type")
    private String compType;
    @JoinColumn(name = "Fac_ID", referencedColumnName = "Fac_ID")
    @ManyToOne(fetch = FetchType.LAZY)
    private Faculty facID;
    @JoinColumn(name = "Dept_ID", referencedColumnName = "Dept_ID")
    @ManyToOne(fetch = FetchType.LAZY)
    private Departement deptID;
    @OneToMany(mappedBy = "compID", fetch = FetchType.LAZY ,cascade = CascadeType.ALL, orphanRemoval=true)
    private List<ComplainAction> complainActionList;
    @Transient
    private boolean newObj;
    public Complain() {
    }

    public Complain(Long compID) {
        this.compID = compID;
    }

    public boolean isNewObj() {
        return newObj;
    }

    public void setNewObj(boolean newObj) {
        this.newObj = newObj;
    }
    
    public Long getCompID() {
        return compID;
    }

    public void setCompID(Long compID) {
        this.compID = compID;
    }

    public Long getCompNumber() {
        return compNumber;
    }

    public void setCompNumber(Long compNumber) {
        this.compNumber = compNumber;
    }

    public String getCompSubject() {
        return compSubject;
    }

    public void setCompSubject(String compSubject) {
        this.compSubject = compSubject;
    }

    public Date getCompDate() {
        return compDate;
    }

    public void setCompDate(Date compDate) {
        this.compDate = compDate;
    }

    public String getCompComplainername() {
        return compComplainername;
    }

    public void setCompComplainername(String compComplainername) {
        this.compComplainername = compComplainername;
    }

    public String getCompComment() {
        return compComment;
    }

    public void setCompComment(String compComment) {
        this.compComment = compComment;
    }

    public String getCompType() {
        return compType ;    
        
    }

    public void setCompType(String compType) {
           this.compType = compType ;
    }

    public Faculty getFacID() {
        return facID;
    }

    public void setFacID(Faculty facID) {
        this.facID = facID;
    }

    public Departement getDeptID() {
        return deptID;
    }

    public void setDeptID(Departement deptID) {
        this.deptID = deptID;
    }

    public List<ComplainAction> getComplainActionList() {
        return complainActionList;
    }

    public void setComplainActionList(List<ComplainAction> complainActionList) {
        this.complainActionList = complainActionList;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (compID != null ? compID.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Complain)) {
            return false;
        }
        Complain other = (Complain) object;
        if ((this.compID == null && other.compID != null) || (this.compID != null && !this.compID.equals(other.compID))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "eg.edu.tanta.entities.Complain[ compID=" + compID + " ]";
    }

    public boolean getCompstatus() {
        return compstatus== FlagsEnum.ON.getCode();    
    }

    public void setCompstatus(boolean compstatus) {
        this.compstatus = compstatus ? FlagsEnum.ON.getCode() : FlagsEnum.OFF.getCode();
    }
}
