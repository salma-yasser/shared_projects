/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.entities;

import java.io.Serializable;
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
import javax.persistence.Transient;

/**
 *
 * @author Salma
 */
@Entity
@Table(name = "Commission_Member")
@Cacheable(false)
@NamedQueries({
    @NamedQuery(name = "CommissionMember.findAll", query = "SELECT c FROM CommissionMember c")})
public class CommissionMember implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "Comm_Memb_ID")
    private Long commMembID;
    @Column(name = "Comm_Memb_Name")
    private String commMembName;
    @Column(name = "Comm_Memb_role")
    private String commMembrole;
    @Column(name = "Comm_Memb_Manag")
    private String commMembManag;
    @JoinColumn(name = "Comm_ID", referencedColumnName = "Comm_ID")
    @ManyToOne(fetch = FetchType.LAZY)
    private Commission commID;
    @Transient
    private boolean newObj;

    public CommissionMember() {
    }

    public CommissionMember(Long commMembID) {
        this.commMembID = commMembID;
    }

    public Long getCommMembID() {
        return commMembID;
    }

    public void setCommMembID(Long commMembID) {
        this.commMembID = commMembID;
    }

    public String getCommMembName() {
        return commMembName;
    }

    public void setCommMembName(String commMembName) {
        this.commMembName = commMembName;
    }

    public String getCommMembrole() {
        return commMembrole;
    }

    public void setCommMembrole(String commMembrole) {
        this.commMembrole = commMembrole;
    }

    public String getCommMembManag() {
        return commMembManag;
    }

    public void setCommMembManag(String commMembManag) {
        this.commMembManag = commMembManag;
    }

    public Commission getCommID() {
        return commID;
    }

    public void setCommID(Commission commID) {
        this.commID = commID;
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
        hash += (commMembID != null ? commMembID.hashCode() : 0);
        return hash;
    }

    @Override
    public String toString() {
        return "eg.edu.tanta.entities.CommissionMember[ commMembID=" + commMembID + " ]";
    }

}
