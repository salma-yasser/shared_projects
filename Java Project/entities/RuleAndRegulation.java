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
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

/**
 *
 * @author Salma
 */
@Entity
@Table(name = "Rule_And_Regulation")
@Cacheable(false)
@NamedQueries({
    @NamedQuery(name = "RuleAndRegulation.findAll", query = "SELECT r FROM RuleAndRegulation r")})
public class RuleAndRegulation implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "Rule_ID")
    private Long ruleID;
    @Column(name = "Rule_Number")
    private Long ruleNumber;
    @Column(name = "Rule_Date")
    @Temporal(TemporalType.TIMESTAMP)
    private Date ruleDate;
    @Column(name = "Rule_Subject")
    private String ruleSubject;
    @Column(name = "Rule_Attach")
    private String ruleAttach;

    public RuleAndRegulation() {
    }

    public RuleAndRegulation(Long ruleID) {
        this.ruleID = ruleID;
    }

    public Long getRuleID() {
        return ruleID;
    }

    public void setRuleID(Long ruleID) {
        this.ruleID = ruleID;
    }

    public Long getRuleNumber() {
        return ruleNumber;
    }

    public void setRuleNumber(Long ruleNumber) {
        this.ruleNumber = ruleNumber;
    }

    public Date getRuleDate() {
        return ruleDate;
    }

    public void setRuleDate(Date ruleDate) {
        this.ruleDate = ruleDate;
    }

    public String getRuleSubject() {
        return ruleSubject;
    }

    public void setRuleSubject(String ruleSubject) {
        this.ruleSubject = ruleSubject;
    }

    public String getRuleAttach() {
        return ruleAttach;
    }

    public void setRuleAttach(String ruleAttach) {
        this.ruleAttach = ruleAttach;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (ruleID != null ? ruleID.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof RuleAndRegulation)) {
            return false;
        }
        RuleAndRegulation other = (RuleAndRegulation) object;
        if ((this.ruleID == null && other.ruleID != null) || (this.ruleID != null && !this.ruleID.equals(other.ruleID))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "eg.edu.tanta.entities.RuleAndRegulation[ ruleID=" + ruleID + " ]";
    }
    
}
