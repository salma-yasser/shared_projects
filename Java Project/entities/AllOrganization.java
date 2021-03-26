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
@Table(name = "All_Organization")
@Cacheable(false)
@NamedQueries({
    @NamedQuery(name = "AllOrganization.searchOrganization",
            query = "SELECT a "
            + "FROM AllOrganization a "
            + "ORDER BY a.id")})
public class AllOrganization implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @Column(name = "ID")
    private String id;
    @Column(name = "Category")
    private String category;
    @Column(name = "Name")
    private String name;
    @OneToMany(mappedBy = "oUTTo", fetch = FetchType.LAZY)
    private List<OutBox> outBoxList;
    @OneToMany(mappedBy = "iNTo", fetch = FetchType.LAZY)
    private List<InBox> inBoxList;

    public AllOrganization() {
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getCategory() {
        return category;
    }

    public void setCategory(String category) {
        this.category = category;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
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

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (id != null ? id.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof AllOrganization)) {
            return false;
        }
        AllOrganization other = (AllOrganization) object;
        if ((this.id == null && other.id != null) || (this.id != null && !this.id.equals(other.id))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return name;
    }

}
