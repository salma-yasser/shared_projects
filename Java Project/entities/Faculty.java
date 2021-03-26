/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.entities;

import java.io.Serializable;
import java.util.List;
import javax.persistence.Cacheable;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.ManyToMany;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.OneToMany;
import javax.persistence.Table;

/**
 *
 * @author Salma
 */
@Entity
@Table(name = "Faculty")
@Cacheable(false)
@NamedQueries({
    @NamedQuery(name = "Faculty.searchFaculty",
            query = "SELECT f "
            + "FROM Faculty f "
            + "order by f.facID ")})
public class Faculty implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "Fac_ID")
    private Long facID;
    @Column(name = "Fac_Name")
    private String facName;
    @ManyToMany(mappedBy = "facultyList", fetch = FetchType.LAZY)
    private List<Employee> employeeList;
    @OneToMany(mappedBy = "facID", fetch = FetchType.LAZY)
    private List<Report> reportList;
    @OneToMany(mappedBy = "facID", fetch = FetchType.LAZY)
    private List<Commission> commissionList;
    @OneToMany(mappedBy = "facID", fetch = FetchType.LAZY)
    private List<Complain> complainList;

    public Faculty() {
    }

    public Faculty(Long facID) {
        this.facID = facID;
    }

    public Faculty(Long facID, String facName) {
        this.facID = facID;
        this.facName = facName;
    }

    public Long getFacID() {
        return facID;
    }

    public void setFacID(Long facID) {
        this.facID = facID;
    }

    public String getFacName() {
        return facName;
    }

    public void setFacName(String facName) {
        this.facName = facName;
    }

    public List<Employee> getEmployeeList() {
        return employeeList;
    }

    public void setEmployeeList(List<Employee> employeeList) {
        this.employeeList = employeeList;
    }

    public List<Report> getReportList() {
        return reportList;
    }

    public void setReportList(List<Report> reportList) {
        this.reportList = reportList;
    }

    public List<Commission> getCommissionList() {
        return commissionList;
    }

    public void setCommissionList(List<Commission> commissionList) {
        this.commissionList = commissionList;
    }

    public List<Complain> getComplainList() {
        return complainList;
    }

    public void setComplainList(List<Complain> complainList) {
        this.complainList = complainList;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (facID != null ? facID.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Faculty)) {
            return false;
        }
        Faculty other = (Faculty) object;
        if ((this.facID == null && other.facID != null) || (this.facID != null && !this.facID.equals(other.facID))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "eg.edu.tanta.entities.Faculty[ facID=" + facID + " ]";
    }

}
