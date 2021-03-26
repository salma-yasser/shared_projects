/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.entities;

import eg.edu.tanta.enums.FlagsEnum;
import java.io.Serializable;
import java.util.List;
import javax.persistence.Cacheable;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.JoinTable;
import javax.persistence.ManyToMany;
import javax.persistence.ManyToOne;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;

/**
 *
 * @author Salma
 */
@Entity
@Table(name = "Role")
@Cacheable(false)
@NamedQueries({
    @NamedQuery(name = "Role.findAll", query = "SELECT r FROM Role r")})
public class Role implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @Column(name = "id")
    private Long id;
    @Column(name = "name")
    private String name;
    @Column(name = "editable")
    private int editable;
    @JoinTable(name = "Role_Screen", joinColumns = {
        @JoinColumn(name = "Role_ID", referencedColumnName = "id")}, inverseJoinColumns = {
        @JoinColumn(name = "Screen_ID", referencedColumnName = "id")})
    @ManyToMany(fetch = FetchType.LAZY)
    private List<Screen> screenList;
    @ManyToMany(mappedBy = "roleList", fetch = FetchType.LAZY)
    private List<Employee> employeeList;
    @JoinColumn(name = "dep", referencedColumnName = "Dept_ID")
    @ManyToOne(fetch = FetchType.LAZY)
    private Departement dep;

    public Role() {
    }

    public Role(Long id) {
        this.id = id;
    }

    public Role(Long id, String name) {
        this.id = id;
        this.name = name;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public List<Screen> getScreenList() {
        return screenList;
    }

    public void setScreenList(List<Screen> screenList) {
        this.screenList = screenList;
    }

    public List<Employee> getEmployeeList() {
        return employeeList;
    }

    public void setEmployeeList(List<Employee> employeeList) {
        this.employeeList = employeeList;
    }

    public Departement getDep() {
        return dep;
    }

    public void setDep(Departement dep) {
        this.dep = dep;
    }

    public boolean getEditable() {
        return editable==FlagsEnum.ON.getCode();
    }

    public void setEditable(boolean editable) {
        this.editable = editable?FlagsEnum.ON.getCode():FlagsEnum.OFF.getCode();
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
        if (!(object instanceof Role)) {
            return false;
        }
        Role other = (Role) object;
        if ((this.id == null && other.id != null) || (this.id != null && !this.id.equals(other.id))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "eg.edu.tanta.entities.Role[ id=" + id + " ]";
    }

}
