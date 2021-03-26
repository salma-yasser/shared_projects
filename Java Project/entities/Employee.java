/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.entities;

import java.io.Serializable;
import java.util.Date;
import java.util.List;
import javax.persistence.Cacheable;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.JoinTable;
import javax.persistence.ManyToMany;
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
@Table(name = "Employee")
@Cacheable(false)
@NamedQueries({
    @NamedQuery(name = "Employee.searchEmployee",
            query = " select e "
            + " from Employee e "
            + " where (:P_USER_NAME = '-1' or upper(e.empUserName) = upper(:P_USER_NAME)) "
            + " and (:P_USER_EMAIL = '-1' or upper(e.empEmail) = upper(:P_USER_EMAIL)) "
            + " and (:P_USER_PASSWORD = '-1' or e.empPassWord = :P_USER_PASSWORD) "
            + " order by e.empID")
})
public class Employee implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "Emp_ID")
    private Long empID;
    @Column(name = "Emp_Name")
    private String empName;
    @Column(name = "Emp_UserName")
    private String empUserName;
    @Column(name = "Emp_PassWord")
    private String empPassWord;
    @Column(name = "Emp_Phone")
    private Integer empPhone;
    @Column(name = "Emp_Email")
    private String empEmail;
    @Column(name = "Emp_Qualificatio")
    private String empQualificatio;
    @Column(name = "Emp_Date_of_Birth")
    @Temporal(TemporalType.TIMESTAMP)
    private Date empDateofBirth;
    @Column(name = "Emp_Credit_Id")
    private Integer empCreditId;
    @Column(name = "Emp_Financial_Degree")
    private String empFinancialDegree;
    @Column(name = "Emp_Job")
    private String empJob;
    @Column(name = "Emp_Degree_Last_Secret_report1")
    private Integer empDegreeLastSecretreport1;
    @Column(name = "Emp_Degree_Last_Secret_report2")
    private Integer empDegreeLastSecretreport2;
    @Column(name = "Emp_Comment")
    private String empComment;
    @JoinTable(name = "Employee_Role", joinColumns = {
        @JoinColumn(name = "Emp_ID", referencedColumnName = "Emp_ID")}, inverseJoinColumns = {
        @JoinColumn(name = "Role_ID", referencedColumnName = "id")})
    @ManyToMany(fetch = FetchType.LAZY)
    private List<Role> roleList;
    @JoinTable(name = "Employee_Faculty", joinColumns = {
        @JoinColumn(name = "Emp_ID", referencedColumnName = "Emp_ID")}, inverseJoinColumns = {
        @JoinColumn(name = "Fac_ID", referencedColumnName = "Fac_ID")})
    @ManyToMany(fetch = FetchType.LAZY)
    private List<Faculty> facultyList;
    @Transient
    private Role currentRole;

    public Employee() {
    }

    public Employee(Long empID) {
        this.empID = empID;
    }

    public Employee(Long empID, String empName, String empUserName, String empPassWord) {
        this.empID = empID;
        this.empName = empName;
        this.empUserName = empUserName;
        this.empPassWord = empPassWord;
    }

    public Long getEmpID() {
        return empID;
    }

    public void setEmpID(Long empID) {
        this.empID = empID;
    }

    public String getEmpName() {
        return empName;
    }

    public void setEmpName(String empName) {
        this.empName = empName;
    }

    public String getEmpEmail() {
        return empEmail;
    }

    public void setEmpEmail(String empEmail) {
        this.empEmail = empEmail;
    }

    public String getEmpQualificatio() {
        return empQualificatio;
    }

    public void setEmpQualificatio(String empQualificatio) {
        this.empQualificatio = empQualificatio;
    }

    public Date getEmpDateofBirth() {
        return empDateofBirth;
    }

    public void setEmpDateofBirth(Date empDateofBirth) {
        this.empDateofBirth = empDateofBirth;
    }

    public String getEmpFinancialDegree() {
        return empFinancialDegree;
    }

    public void setEmpFinancialDegree(String empFinancialDegree) {
        this.empFinancialDegree = empFinancialDegree;
    }

    public String getEmpJob() {
        return empJob;
    }

    public void setEmpJob(String empJob) {
        this.empJob = empJob;
    }

    public String getEmpUserName() {
        return empUserName;
    }

    public void setEmpUserName(String empUserName) {
        this.empUserName = empUserName;
    }

    public String getEmpPassWord() {
        return empPassWord;
    }

    public void setEmpPassWord(String empPassWord) {
        this.empPassWord = empPassWord;
    }

    public List<Faculty> getFacultyList() {
        return facultyList;
    }

    public void setFacultyList(List<Faculty> facultyList) {
        this.facultyList = facultyList;
    }

    public Integer getEmpPhone() {
        return empPhone;
    }

    public void setEmpPhone(Integer empPhone) {
        this.empPhone = empPhone;
    }

    public Integer getEmpCreditId() {
        return empCreditId;
    }

    public void setEmpCreditId(Integer empCreditId) {
        this.empCreditId = empCreditId;
    }

    public Integer getEmpDegreeLastSecretreport1() {
        return empDegreeLastSecretreport1;
    }

    public void setEmpDegreeLastSecretreport1(Integer empDegreeLastSecretreport1) {
        this.empDegreeLastSecretreport1 = empDegreeLastSecretreport1;
    }

    public Integer getEmpDegreeLastSecretreport2() {
        return empDegreeLastSecretreport2;
    }

    public void setEmpDegreeLastSecretreport2(Integer empDegreeLastSecretreport2) {
        this.empDegreeLastSecretreport2 = empDegreeLastSecretreport2;
    }

    public String getEmpComment() {
        return empComment;
    }

    public void setEmpComment(String empComment) {
        this.empComment = empComment;
    }

    public List<Role> getRoleList() {
        return roleList;
    }

    public void setRoleList(List<Role> roleList) {
        this.roleList = roleList;
    }

    public Role getCurrentRole() {
        return currentRole;
    }

    public void setCurrentRole(Role currentRole) {
        this.currentRole = currentRole;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (empID != null ? empID.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Employee)) {
            return false;
        }
        Employee other = (Employee) object;
        if ((this.empID == null && other.empID != null) || (this.empID != null && !this.empID.equals(other.empID))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "eg.edu.tanta.entities.Employee[ empID=" + empID + " ]";
    }

}
