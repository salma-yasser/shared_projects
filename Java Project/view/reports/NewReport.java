/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.view.reports;

import eg.edu.tanta.dao.AllOrganizationFacade;
import eg.edu.tanta.dao.CategoryFacade;
import eg.edu.tanta.dao.OrganizationFacade;
import eg.edu.tanta.dao.ReportFacade;
import eg.edu.tanta.dao.TypeFacade;
import eg.edu.tanta.entities.AllOrganization;
import eg.edu.tanta.entities.Category;
import eg.edu.tanta.entities.Faculty;
import eg.edu.tanta.entities.InBox;
import eg.edu.tanta.entities.Note;
import eg.edu.tanta.entities.Organization;
import eg.edu.tanta.entities.OutBox;
import eg.edu.tanta.entities.Report;
import eg.edu.tanta.entities.Type;
import eg.edu.tanta.enums.RequestParameterEnum;
import eg.edu.tanta.exceptions.BusinessException;
import eg.edu.tanta.utils.DateService;
import eg.edu.tanta.view.base.BaseView;
import java.io.IOException;
import java.io.Serializable;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import javax.annotation.PostConstruct;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.faces.context.FacesContext;
import javax.faces.model.SelectItem;
import javax.faces.model.SelectItemGroup;
import javax.inject.Inject;
import org.slf4j.LoggerFactory;

/**
 *
 * @author Salma
 */
@ManagedBean(name = "newReport")
@ViewScoped
public class NewReport extends BaseView implements Serializable {

    static final org.slf4j.Logger LOGGER = LoggerFactory.getLogger(NewReport.class);

    @Inject
    private ReportFacade reportFacade;
    @Inject
    private OrganizationFacade organizationFacade;
    @Inject
    private CategoryFacade categoryFacade;
    @Inject
    private TypeFacade typeFacade;
    @Inject
    private AllOrganizationFacade allOrganizationFacade;

    private boolean onlyView;
    private List<Faculty> facultyList;
    private List<Organization> organizationList;
    private List<Category> categoryList;
    private List<Type> typeList;
    private List<SelectItem> allOrganizationList;
    private Report report;
    private Note selectedNote;
    private InBox selectedInbox;
    private OutBox selectedOutbox;

    @PostConstruct
    public void init() {
        try {
            super.init();
            facultyList = getUserManager().getCurrentUser().getFacultyList();
            organizationList = organizationFacade.getOrganizationList();
            allOrganizationList = getAllOrganization(allOrganizationFacade.getAllOrganizationList());
            categoryList = categoryFacade.getCategoryList();
            typeList = typeFacade.getTypeList();
            if (getRequest().getParameterMap().isEmpty()) {
                report = new Report();
                report.setNewObj(true);
                report.setDeptID(getUserManager().getCurrentUser().getCurrentRole().getDep());
            } else {
                int reportId = Integer.parseInt(getRequest().getParameter(RequestParameterEnum.REPORT_ID.getCode()));
                report = reportFacade.getReport(reportId, getUserManager().getCurrentUser().getCurrentRole().getDep().getDeptID());
                if (report == null) {
                    goToAccessDenied();
                } else {
                    if (!isEditable() || !facultyList.contains(report.getFacID())) {
                        onlyView = true;
                    }
                }
            }
        } catch (BusinessException ex) {
            LOGGER.error("Error In Loading Page Report", ex);
            setFacesMessage(getBundle(ex.getMessage()));
        } catch (Exception e) {
            LOGGER.error("Error In Loading Page Report", e);
            setFacesMessage(getBundle(e.getMessage()));
        }
    }

    public void prepareNoteDG() {
        selectedNote = new Note();
        selectedNote.setNewObj(true);
        selectedNote.setRepID(report);
    }

    public void saveNote() {
        if (selectedNote != null && selectedNote.isNewObj()) {
            if (report.getNoteList() == null) {
                report.setNoteList(new ArrayList<Note>());
            }
            report.getNoteList().add(selectedNote);
            if (report.getNoteList().size() > report.getRepNoofNote()) {
                report.setRepNoofNote((short) (report.getRepNoofNote() + 1));
            }
            selectedNote.setNewObj(false);
        }
    }

    public void deleteNote(Note note) {
        report.getNoteList().remove(note);
        report.setRepNoofNote((short) (report.getRepNoofNote() - 1));
    }

    public void prepareInboxDG() {
        selectedInbox = new InBox();
        selectedInbox.setNewObj(true);
        selectedInbox.setRepID(report);
    }

    public void saveInbox() {
        if (selectedInbox != null && selectedInbox.isNewObj()) {
            if (report.getInBoxList() == null) {
                report.setInBoxList(new ArrayList<InBox>());
            }
            report.getInBoxList().add(selectedInbox);
            selectedInbox.setNewObj(false);
        }
        setFacesMessage(getBundle("notify_successOperation"));
    }

    public void deleteInbox(InBox inbox) {
        report.getInBoxList().remove(inbox);
        setFacesMessage(getBundle("notify_successOperation"));
    }

    public void prepareOutboxDG() {
        selectedOutbox = new OutBox();
        selectedOutbox.setRepID(report);
        selectedOutbox.setNewObj(true);
//        selectedOutbox.setOUTNum(getUserManager().getCurrentUser().getCurrentRole().getDep().getDeptID());
    }

    public void saveOutbox() {
        if (selectedOutbox != null && selectedOutbox.isNewObj()) {
            if (report.getOutBoxList() == null) {
                report.setOutBoxList(new ArrayList<OutBox>());
            }
            report.getOutBoxList().add(selectedOutbox);
            selectedOutbox.setNewObj(false);
        }
        setFacesMessage(getBundle("notify_successOperation"));
    }

    public void deleteOutbox(OutBox outbox) {
        report.getOutBoxList().remove(outbox);
        setFacesMessage(getBundle("notify_successOperation"));
    }

    public void saveReport() {
        try {
            if (report.isNewObj()) {
                reportFacade.saveNew(report);
                report.setNewObj(false);
                report = reportFacade.getReport(report.getRepID());
            } else {
                reportFacade.update(report);
            }
            setFacesMessage(getBundle("notify_successOperation"));
        } catch (BusinessException ex) {
            setFacesMessage(getBundle(ex.getMessage()));
        }
    }

    public void deleteReport() {
        try {
            reportFacade.remove(report);
            FacesContext.getCurrentInstance().getExternalContext().redirect(getRequest().getContextPath() + "/reports/search.xhtml");
        } catch (IOException ex) {
            LOGGER.error("Error In Delete Report", ex);
            setFacesMessage(getBundle("error_general"));
        }
    }

    public String formatDate(Date date) {
        return DateService.getDateString(date);
    }

    private List<SelectItem> getAllOrganization(List<AllOrganization> allOrganizationList) {
        List<SelectItem> tempList1 = new ArrayList<SelectItem>();
        List<SelectItem> tempList2 = new ArrayList<SelectItem>();
        for (AllOrganization org : allOrganizationList) {
            if (org.getCategory().equals("1")) {
                tempList1.add(new SelectItem((AllOrganization) org));
            } else {
                tempList2.add(new SelectItem((AllOrganization) org));
            }
        }
        SelectItemGroup g1 = new SelectItemGroup("الجهات الداخلية");
        g1.setSelectItems(tempList1.toArray(new SelectItem[tempList1.size()]));
        SelectItemGroup g2 = new SelectItemGroup("الجهات الخارجية");
        g2.setSelectItems(tempList2.toArray(new SelectItem[tempList2.size()]));
        List<SelectItem> allList = new ArrayList<SelectItem>();
        allList.add(g1);
        allList.add(g2);
        return allList;
    }

    public Note getSelectedNote() {
        return selectedNote;
    }

    public void setSelectedNote(Note selectedNote) {
        this.selectedNote = selectedNote;
    }

    public List<Faculty> getFacultyList() {
        return facultyList;
    }

    public void setFacultyList(List<Faculty> facultyList) {
        this.facultyList = facultyList;
    }

    public Report getReport() {
        return report;
    }

    public void setReport(Report report) {
        this.report = report;
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

    public InBox getSelectedInbox() {
        return selectedInbox;
    }

    public void setSelectedInbox(InBox selectedInbox) {
        this.selectedInbox = selectedInbox;
    }

    public List<Type> getTypeList() {
        return typeList;
    }

    public void setTypeList(List<Type> typeList) {
        this.typeList = typeList;
    }

    public OutBox getSelectedOutbox() {
        return selectedOutbox;
    }

    public void setSelectedOutbox(OutBox selectedOutbox) {
        this.selectedOutbox = selectedOutbox;
    }

    public List<SelectItem> getAllOrganizationList() {
        return allOrganizationList;
    }

    public void setAllOrganizationList(List<SelectItem> allOrganizationList) {
        this.allOrganizationList = allOrganizationList;
    }

    public boolean isOnlyView() {
        return onlyView;
    }

    public void setOnlyView(boolean onlyView) {
        this.onlyView = onlyView;
    }

}
