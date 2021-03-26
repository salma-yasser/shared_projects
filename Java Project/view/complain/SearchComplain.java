/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.view.complain;

import eg.edu.tanta.dao.ComplainFacade;
import eg.edu.tanta.dao.FacultyFacade;
import eg.edu.tanta.entities.Complain;
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
 * @author Asmaa
 */
@ManagedBean(name = "searchComplain")
@ViewScoped
public class SearchComplain extends BaseView implements Serializable {

    static final org.slf4j.Logger LOGGER = LoggerFactory.getLogger(SearchComplain.class);

    @Inject
    private ComplainFacade complainFacade;
    @Inject
    private FacultyFacade facultyFacade;
    private List<Faculty> facultyList;
    private List<Complain> complainList;
    private Date selectedCompDateFrom;
    private Date selectedCompDateTo;
    private Long selectedCompNumber;
    private long selectedFaculty;
    private int selectedComplainStatus;
    private String selectedComplainerName;
    private String selectedCompSubject;
    private String selectedCompType;

    @PostConstruct
    public void init() {
        try {
            super.init();
            facultyList = facultyFacade.getFacultysList();
            selectedComplainStatus = FlagsEnum.ALL.getCode();
        } catch (BusinessException ex) {
            setFacesMessage(getBundle(ex.getMessage()));
        }
    }

    public void searchComplain() {
        try {
            complainList = complainFacade.getComplainList(selectedCompNumber, getUserManager().getCurrentUser().getCurrentRole().getDep().getDeptID(), selectedCompDateFrom, selectedCompDateTo, selectedFaculty, selectedComplainStatus, selectedComplainerName, selectedCompSubject, selectedCompType);
        } catch (BusinessException ex) {
            setFacesMessage(getBundle(ex.getMessage()));
        }
    }

    public boolean isEditAuthorized(Faculty faculty) {
        return getUserManager().getCurrentUser().getFacultyList().contains(faculty);
    }

    public String formatDate(Date date) {
        return DateService.getDateString(date);
    }

    public void deleteComplain(Complain complain) {
        complainFacade.remove(complain);
        complainList.remove(complain);
        setFacesMessage(getBundle("notify_successOperation"));
    }

    public void viewComplain(Complain complain) {
        RequestContext.getCurrentInstance().execute("window.open('" + getRequest().getContextPath() + "/complains/new.xhtml?" + RequestParameterEnum.COMPLAIN_ID.getCode() + "=" + complain.getCompID() + "')");
    }

    public ComplainFacade getComplainFacade() {
        return complainFacade;
    }

    public void setComplainFacade(ComplainFacade complainFacade) {
        this.complainFacade = complainFacade;
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

    public List<Complain> getComplainList() {
        return complainList;
    }

    public void setComplainList(List<Complain> complainList) {
        this.complainList = complainList;
    }

    public Date getSelectedCompDateFrom() {
        return selectedCompDateFrom;
    }

    public void setSelectedCompDateFrom(Date selectedCompDateFrom) {
        this.selectedCompDateFrom = selectedCompDateFrom;
    }

    public Date getSelectedCompDateTo() {
        return selectedCompDateTo;
    }

    public void setSelectedCompDateTo(Date selectedCompDateTo) {
        this.selectedCompDateTo = selectedCompDateTo;
    }

    public Long getSelectedCompNumber() {
        return selectedCompNumber;
    }

    public void setSelectedCompNumber(Long selectedCompNumber) {
        this.selectedCompNumber = selectedCompNumber;
    }

    public long getSelectedFaculty() {
        return selectedFaculty;
    }

    public void setSelectedFaculty(long selectedFaculty) {
        this.selectedFaculty = selectedFaculty;
    }

    public int getSelectedComplainStatus() {
        return selectedComplainStatus;
    }

    public void setSelectedComplainStatus(int selectedComplainStatus) {
        this.selectedComplainStatus = selectedComplainStatus;
    }

    public String getSelectedCompSubject() {
        return selectedCompSubject;
    }

    public void setSelectedCompSubject(String selectedCompSubject) {
        this.selectedCompSubject = selectedCompSubject;
    }

    public String getSelectedComplainerName() {
        return selectedComplainerName;
    }

    public void setSelectedComplainerName(String selectedComplainerName) {
        this.selectedComplainerName = selectedComplainerName;
    }

    public String getSelectedCompType() {
        return selectedCompType;
    }

    public void setSelectedCompType(String selectedCompType) {
        this.selectedCompType = selectedCompType;
    }

}
