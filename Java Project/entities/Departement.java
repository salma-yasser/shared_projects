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
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.OneToMany;
import javax.persistence.Table;

/**
 *
 * @author Salma
 */
@Entity
@Table(name = "Departement")
@Cacheable(false)
@NamedQueries({
    @NamedQuery(name = "Departement.findAll", query = "SELECT d FROM Departement d")})
public class Departement implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "Dept_ID")
    private Long deptID;
    @Column(name = "Dept_Name")
    private String deptName;
    @OneToMany(mappedBy = "deptID", fetch = FetchType.LAZY)
    private List<Report> reportList;
    @OneToMany(mappedBy = "deptID", fetch = FetchType.LAZY)
    private List<Complain> complainList;
    @OneToMany(mappedBy = "dep", fetch = FetchType.LAZY)
    private List<Role> roleList;

    public Departement() {
    }

    public Departement(Long deptID) {
        this.deptID = deptID;
    }

    public Departement(Long deptID, String deptName) {
        this.deptID = deptID;
        this.deptName = deptName;
    }

    public Long getDeptID() {
        return deptID;
    }

    public void setDeptID(Long deptID) {
        this.deptID = deptID;
    }

    public String getDeptName() {
        return deptName;
    }

    public void setDeptName(String deptName) {
        this.deptName = deptName;
    }

    public List<Report> getReportList() {
        return reportList;
    }

    public void setReportList(List<Report> reportList) {
        this.reportList = reportList;
    }

    public List<Complain> getComplainList() {
        return complainList;
    }

    public void setComplainList(List<Complain> complainList) {
        this.complainList = complainList;
    }

    public List<Role> getRoleList() {
        return roleList;
    }

    public void setRoleList(List<Role> roleList) {
        this.roleList = roleList;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (deptID != null ? deptID.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Departement)) {
            return false;
        }
        Departement other = (Departement) object;
        if ((this.deptID == null && other.deptID != null) || (this.deptID != null && !this.deptID.equals(other.deptID))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "eg.edu.tanta.entities.Departement[ deptID=" + deptID + " ]";
    }

}
