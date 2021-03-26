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
@Table(name = "Type")
@Cacheable(false)
@NamedQueries({
    @NamedQuery(name = "Type.searchType",
            query = "SELECT t FROM Type t "
            + "order by t.typeID")})
public class Type implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "Type_ID")
    private Long typeID;
    @Column(name = "Type_Name")
    private String typeName;
    @OneToMany(mappedBy = "typeID", fetch = FetchType.LAZY)
    private List<OutBox> outBoxList;
    @OneToMany(mappedBy = "typeID", fetch = FetchType.LAZY)
    private List<InBox> inBoxList;

    public Type() {
    }

    public Type(Long typeID) {
        this.typeID = typeID;
    }

    public Long getTypeID() {
        return typeID;
    }

    public void setTypeID(Long typeID) {
        this.typeID = typeID;
    }

    public String getTypeName() {
        return typeName;
    }

    public void setTypeName(String typeName) {
        this.typeName = typeName;
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
        hash += (typeID != null ? typeID.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Type)) {
            return false;
        }
        Type other = (Type) object;
        if ((this.typeID == null && other.typeID != null) || (this.typeID != null && !this.typeID.equals(other.typeID))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "eg.edu.tanta.entities.Type[ typeID=" + typeID + " ]";
    }

}
