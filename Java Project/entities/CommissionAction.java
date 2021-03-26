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
@Table(name = "Commission_Action")
@Cacheable(false)
@NamedQueries({
    @NamedQuery(name = "CommissionAction.findAll", query = "SELECT c FROM CommissionAction c")})
public class CommissionAction implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "Comm_Action_ID")
    private Long commActionID;
    @Column(name = "Comm_Action_Date")
    @Temporal(TemporalType.TIMESTAMP)
    private Date commActionDate;
    @Column(name = "Comm_Action_Comment")
    private String commActionComment;
    @JoinColumn(name = "Comm_ID", referencedColumnName = "Comm_ID")
    @ManyToOne(fetch = FetchType.LAZY)
    private Commission commID;
    @Transient
    private boolean newObj;

    public CommissionAction() {
    }

    public CommissionAction(Long commActionID) {
        this.commActionID = commActionID;
    }

    public boolean isNewObj() {
        return newObj;
    }

    public void setNewObj(boolean newObj) {
        this.newObj = newObj;
    }

    public Long getCommActionID() {
        return commActionID;
    }

    public void setCommActionID(Long commActionID) {
        this.commActionID = commActionID;
    }

    public Date getCommActionDate() {
        return commActionDate;
    }

    public void setCommActionDate(Date commActionDate) {
        this.commActionDate = commActionDate;
    }

    public String getCommActionComment() {
        return commActionComment;
    }

    public void setCommActionComment(String commActionComment) {
        this.commActionComment = commActionComment;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (commActionID != null ? commActionID.hashCode() : 0);
        return hash;
    }

    @Override
    public String toString() {
        return "eg.edu.tanta.entities.CommissionAction[ commActionID=" + commActionID + " ]";
    }

    public Commission getCommID() {
        return commID;
    }

    public void setCommID(Commission commID) {
        this.commID = commID;
    }

}
