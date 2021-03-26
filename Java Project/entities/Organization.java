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
@Table(name = "Organization")
@Cacheable(false)
@NamedQueries({
    @NamedQuery(name = "Organization.searchOrganization",
            query = "SELECT o FROM Organization o "
                    + "order by o.orgID")})
public class Organization implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "Org_ID")
    private Long orgID;
    @Column(name = "Org_Name")
    private String orgName;
    @Column(name = "Org_Address")
    private String orgAddress;
    @Column(name = "Org_Phone")
    private String orgPhone;
    @OneToMany(mappedBy = "orgID", fetch = FetchType.LAZY)
    private List<Report> reportList;

    public Organization() {
    }

    public Organization(Long orgID) {
        this.orgID = orgID;
    }

    public Organization(Long orgID, String orgName) {
        this.orgID = orgID;
        this.orgName = orgName;
    }

    public Long getOrgID() {
        return orgID;
    }

    public void setOrgID(Long orgID) {
        this.orgID = orgID;
    }

    public String getOrgName() {
        return orgName;
    }

    public void setOrgName(String orgName) {
        this.orgName = orgName;
    }

    public String getOrgAddress() {
        return orgAddress;
    }

    public void setOrgAddress(String orgAddress) {
        this.orgAddress = orgAddress;
    }

    public String getOrgPhone() {
        return orgPhone;
    }

    public void setOrgPhone(String orgPhone) {
        this.orgPhone = orgPhone;
    }

    public List<Report> getReportList() {
        return reportList;
    }

    public void setReportList(List<Report> reportList) {
        this.reportList = reportList;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (orgID != null ? orgID.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Organization)) {
            return false;
        }
        Organization other = (Organization) object;
        if ((this.orgID == null && other.orgID != null) || (this.orgID != null && !this.orgID.equals(other.orgID))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "eg.edu.tanta.entities.Organization[ orgID=" + orgID + " ]";
    }
    
}
