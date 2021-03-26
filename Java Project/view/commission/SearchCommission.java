/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.view.commission;

import eg.edu.tanta.dao.CommissionFacade;
import eg.edu.tanta.dao.FacultyFacade;
import eg.edu.tanta.entities.Commission;
import eg.edu.tanta.entities.Faculty;
import eg.edu.tanta.enums.FlagsEnum;
import eg.edu.tanta.enums.RequestParameterEnum;
import eg.edu.tanta.exceptions.BusinessException;
import eg.edu.tanta.utils.DateService;
import eg.edu.tanta.view.base.BaseView;
import java.io.Serializable;
import java.util.Date;
import java.util.List;
import javax.annotation.PostConstruct;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.inject.Inject;
import org.primefaces.context.RequestContext;
import org.slf4j.LoggerFactory;

/**
 *
 * @author HEBA
 */
@ManagedBean(name = "searchCommission")
@ViewScoped
public class SearchCommission extends BaseView implements Serializable {
    static final org.slf4j.Logger LOGGER = LoggerFactory.getLogger(SearchCommission.class);

    @Inject
    private CommissionFacade commissionFacade;
    @Inject
    private FacultyFacade facultyFacade;

    private List<Faculty> facultyList;
    private List<Commission> commissionList;
    private Date selectedCommDateFrom;
    private Date selectedCommDateTo;
    private Long selectedCommNumber;
    private long selectedFaculty;
    private int selectedCommissionStatus;
    private String selectedCommMembName;
    private String selectedCommSubject;

    @PostConstruct
    public void init() {
        try {
            super.init();
            facultyList = facultyFacade.getFacultysList();
            selectedCommissionStatus = FlagsEnum.ALL.getCode();
        } catch (BusinessException ex) {
            setFacesMessage(getBundle(ex.getMessage()));
        }
    }

    public void searchCommission() {
        try {
            commissionList = commissionFacade.getCommissionList(selectedCommNumber, selectedCommDateFrom, selectedCommDateTo, selectedFaculty,null, selectedCommissionStatus, selectedCommMembName, selectedCommSubject);
        } catch (BusinessException ex) {
             setFacesMessage(getBundle(ex.getMessage()));
        }

    }

    public String formatDate(Date date) {
        return DateService.getDateString(date);
    }

    public void deleteCommission(Commission commission) {
        commissionFacade.remove(commission);
        commissionList.remove(commission);
        setFacesMessage(getBundle("notify_successOperation"));
    }

    public void viewCommission(Commission commission) {
        RequestContext.getCurrentInstance().execute("window.open('" + getRequest().getContextPath() + "/commission/new.xhtml?" + RequestParameterEnum.COMMISSION_ID.getCode() + "=" + commission.getCommID() + "')");
    }

    public CommissionFacade getCommissionFacade() {
        return commissionFacade;
    }

    public void setCommissionFacade(CommissionFacade commissionFacade) {
        this.commissionFacade = commissionFacade;
    }

    public FacultyFacade getFacultyFacade() {
        return facultyFacade;
    }

    public void setFacultyFacade(FacultyFacade facultyFacade) {
        this.facultyFacade = facultyFacade;
    }

    public List<Faculty> getFacultyList() {
        return facultyList;
    }

    public void setFacultyList(List<Faculty> facultyList) {
        this.facultyList = facultyList;
    }

    public List<Commission> getCommissionList() {
        return commissionList;
    }

    public void setCommissionList(List<Commission> commissionList) {
        this.commissionList = commissionList;
    }

    public Date getSelectedCommDateFrom() {
        return selectedCommDateFrom;
    }

    public void setSelectedCommDateFrom(Date selectedCommDateFrom) {
        this.selectedCommDateFrom = selectedCommDateFrom;
    }

    public Date getSelectedCommDateTo() {
        return selectedCommDateTo;
    }

    public void setSelectedCommDateTo(Date selectedCommDateTo) {
        this.selectedCommDateTo = selectedCommDateTo;
    }

    public Long getSelectedCommNumber() {
        return selectedCommNumber;
    }

    public void setSelectedCommNumber(Long selectedCommNumber) {
        this.selectedCommNumber = selectedCommNumber;
    }

    public long getSelectedFaculty() {
        return selectedFaculty;
    }

    public void setSelectedFaculty(long selectedFaculty) {
        this.selectedFaculty = selectedFaculty;
    }

    public int getSelectedCommissionStatus() {
        return selectedCommissionStatus;
    }

    public void setSelectedCommissionStatus(int selectedCommissionStatus) {
        this.selectedCommissionStatus = selectedCommissionStatus;
    }

    public String getSelectedCommMembName() {
        return selectedCommMembName;
    }

    public void setSelectedCommMembName(String selectedCommMembName) {
        this.selectedCommMembName = selectedCommMembName;
    }

    public String getSelectedCommSubject() {
        return selectedCommSubject;
    }

    public void setSelectedCommSubject(String selectedCommSubject) {
        this.selectedCommSubject = selectedCommSubject;
    }

}
