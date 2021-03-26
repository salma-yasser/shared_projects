/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.view.reports;

import eg.edu.tanta.dao.CategoryFacade;
import eg.edu.tanta.dao.FacultyFacade;
import eg.edu.tanta.dao.OrganizationFacade;
import eg.edu.tanta.dao.ReportFacade;
import eg.edu.tanta.entities.Category;
import eg.edu.tanta.entities.Faculty;
import eg.edu.tanta.entities.Organization;
import eg.edu.tanta.entities.Report;
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
 * @author Salma
 */
@ManagedBean(name = "searchReport")
@ViewScoped
public class SearchReport extends BaseView implements Serializable {

    static final org.slf4j.Logger LOGGER = LoggerFactory.getLogger(SearchReport.class);

    @Inject
    private ReportFacade reportFacade;
    @Inject
    private OrganizationFacade organizationFacade;
    @Inject
    private CategoryFacade categoryFacade;
    @Inject
    private FacultyFacade facultyFacade;

    private List<Faculty> facultyList;
    private List<Organization> organizationList;
    private List<Category> categoryList;
    private List<Report> reportList;
    private long selectedOrganization;
    private long selectedFaculty;
    private Long selectedReportNumber;
    private Date selectedFromDate;
    private Date selectedToDate;
    private int selectedNoteCategory;
    private int selectedReportStatus;
    private Long selectedInboxNumber;

    /**
     * Creates a new instance of NewReport
     */
    public SearchReport() {

    }

    @PostConstruct
    public void init() {
        try {
            super.init();
            facultyList = facultyFacade.getFacultysList();
            organizationList = organizationFacade.getOrganizationList();
            categoryList = categoryFacade.getCategoryList();
            selectedReportStatus = FlagsEnum.ALL.getCode();
        } catch (BusinessException ex) {
            setFacesMessage(getBundle(ex.getMessage()));
        }
    }

    public void searchReport() {
        try {
            reportList = reportFacade.getReportList(selectedReportNumber, getUserManager().getCurrentUser().getCurrentRole().getDep().getDeptID(), selectedFromDate, selectedToDate, selectedOrganization, selectedFaculty, selectedReportStatus, selectedNoteCategory, selectedInboxNumber);
        } catch (BusinessException ex) {
            setFacesMessage(getBundle(ex.getMessage()));
        }

    }

    public boolean isEditAuthorized(Faculty faculty) {
        return getUserManager().getCurrentUser().getFacultyList().contains(faculty);
    }

    public void viewReport(Report report) {
        RequestContext.getCurrentInstance().execute("window.open('" + getRequest().getContextPath() + "/reports/new.xhtml?" + RequestParameterEnum.REPORT_ID.getCode() + "=" + report.getRepID() + "')");
    }

    public void deleteReport(Report report) {
        reportFacade.remove(report);
        reportList.remove(report);
        setFacesMessage(getBundle("notify_successOperation"));
    }

    public String formatDate(Date date) {
        return DateService.getDateString(date);
    }

    public List<Faculty> getFacultyList() {
        return facultyList;
    }

    public void setFacultyList(List<Faculty> facultyList) {
        this.facultyList = facultyList;
    }

    public List<Organization> getOrganizationList() {
        return organizationList;
    }

    public void setOrganizationList(List<Organization> organizationList) {
        this.organizationList = organizationList;
    }

    public List<Category> getCategoryList() {
        return categoryList;
    }

    public void setCategoryList(List<Category> categoryList) {
        this.categoryList = categoryList;
    }

    public long getSelectedOrganization() {
        return selectedOrganization;
    }

    public void setSelectedOrganization(long selectedOrganization) {
        this.selectedOrganization = selectedOrganization;
    }

    public long getSelectedFaculty() {
        return selectedFaculty;
    }

    public void setSelectedFaculty(long selectedFaculty) {
        this.selectedFaculty = selectedFaculty;
    }

    public Long getSelectedReportNumber() {
        return selectedReportNumber;
    }

    public void setSelectedReportNumber(Long selectedReportNumber) {
        this.selectedReportNumber = selectedReportNumber;
    }

    public Date getSelectedFromDate() {
        return selectedFromDate;
    }

    public void setSelectedFromDate(Date selectedFromDate) {
        this.selectedFromDate = selectedFromDate;
    }

    public Date getSelectedToDate() {
        return selectedToDate;
    }

    public void setSelectedToDate(Date selectedToDate) {
        this.selectedToDate = selectedToDate;
    }

    public int getSelectedNoteCategory() {
        return selectedNoteCategory;
    }

    public void setSelectedNoteCategory(int selectedNoteCategory) {
        this.selectedNoteCategory = selectedNoteCategory;
    }

    public List<Report> getReportList() {
        return reportList;
    }

    public void setReportList(List<Report> reportList) {
        this.reportList = reportList;
    }

    public int getSelectedReportStatus() {
        return selectedReportStatus;
    }

    public void setSelectedReportStatus(int selectedReportStatus) {
        this.selectedReportStatus = selectedReportStatus;
    }

    public Long getSelectedInboxNumber() {
        return selectedInboxNumber;
    }

    public void setSelectedInboxNumber(Long selectedInboxNumber) {
        this.selectedInboxNumber = selectedInboxNumber;
    }

}
