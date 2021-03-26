/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.view.commission;

import eg.edu.tanta.dao.CommissionFacade;
import eg.edu.tanta.dao.FacultyFacade;
import eg.edu.tanta.dao.OrganizationFacade;
import eg.edu.tanta.dao.TypeFacade;
import eg.edu.tanta.entities.Commission;
import eg.edu.tanta.entities.CommissionAction;
import eg.edu.tanta.entities.CommissionMember;
import eg.edu.tanta.entities.Faculty;
import eg.edu.tanta.entities.Organization;
import eg.edu.tanta.entities.Type;
import eg.edu.tanta.enums.RequestParameterEnum;
import eg.edu.tanta.exceptions.BusinessException;
import eg.edu.tanta.utils.DateService;
import eg.edu.tanta.view.base.BaseView;
import java.io.IOException;
import java.io.InputStream;
import java.io.Serializable;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import javax.annotation.PostConstruct;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.faces.context.FacesContext;
import javax.inject.Inject;
import org.primefaces.event.FileUploadEvent;
import org.primefaces.model.UploadedFile;
import org.slf4j.LoggerFactory;

/**
 *
 * @author HEBA
 */
@ManagedBean(name = "newCommission")
@ViewScoped
public class NewCommission extends BaseView implements Serializable {

    static final org.slf4j.Logger LOGGER = LoggerFactory.getLogger(NewCommission.class);

    @Inject
    private OrganizationFacade organizationFacade;
    @Inject
    private FacultyFacade facultyFacade;
    @Inject
    private CommissionFacade commissionFacade;
    private List<Faculty> facultyList;
    private List<Organization> organizationList;
    private Commission commission;
    private CommissionMember selectedCommissionMember;
    private List<Type> typeList;
    private TypeFacade typeFacade;
    private CommissionAction selectedCommissionAction;
    private boolean onlyView;

    /**
     * Creates a new instance of NewCommission
     */
    public NewCommission() {
    }

    @PostConstruct
    public void init() {
        try {
            super.init();
            facultyList = facultyFacade.getFacultysList();
            if (getRequest().getParameterMap().isEmpty()) {
                commission = new Commission();
                commission.setNewObj(true);
            } else {
                int commId = Integer.parseInt(getRequest().getParameter(RequestParameterEnum.COMMISSION_ID.getCode()));
                commission = commissionFacade.getCommission(commId);
                if (!isEditable()) {
                    onlyView = true;
                }
            }
        } catch (BusinessException ex) {
            LOGGER.error("Error In Loading Page Commision", ex);
            setFacesMessage(getBundle(ex.getMessage()));
        } catch (Exception e) {
            LOGGER.error("Error In Loading Page Report", e);
            setFacesMessage(getBundle(e.getMessage()));
        }
    }

    public void saveCommission() throws BusinessException {
        try {
            if (commission.isNewObj()) {
                commissionFacade.saveNew(commission);
                commission.setNewObj(false);
            } else {
                commissionFacade.update(commission);
            }
            setFacesMessage(getBundle("notify_successOperation"));
        } catch (BusinessException ex) {
            setFacesMessage(getBundle(ex.getMessage()));
        }
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

    public void prepareNewMembDG() {
        selectedCommissionMember = new CommissionMember();
        selectedCommissionMember.setNewObj(true);
        selectedCommissionMember.setCommID(commission);
    }

    public void saveCommMemb() {
        if (selectedCommissionMember != null && selectedCommissionMember.isNewObj()) {
            if (commission.getCommissionMemberList() == null) {
                commission.setCommissionMemberList(new ArrayList<CommissionMember>());
            }
            commission.getCommissionMemberList().add(selectedCommissionMember);
            selectedCommissionMember.setNewObj(false);
        }
        setFacesMessage(getBundle("notify_successOperation"));
    }

    public void deleteCommMemb(CommissionMember commissionMember) {
        commission.getCommissionMemberList().remove(commissionMember);
        setFacesMessage(getBundle("notify_successOperation"));
    }

    public void prepareNewActionDG() {
        selectedCommissionAction = new CommissionAction();
        selectedCommissionAction.setNewObj(true);
        selectedCommissionAction.setCommID(commission);
    }

    public void saveCommAction() {
        if (selectedCommissionAction != null && selectedCommissionAction.isNewObj()) {
            if (commission.getCommissionActionList() == null) {
                commission.setCommissionActionList(new ArrayList<CommissionAction>());
            }
            commission.getCommissionActionList().add(selectedCommissionAction);
            selectedCommissionAction.setNewObj(false);
        }
        setFacesMessage(getBundle("notify_successOperation"));
    }

    public void deleteCommAction(CommissionAction commissionAction) {
        commission.getCommissionActionList().remove(commissionAction);
        setFacesMessage(getBundle("notify_successOperation"));
    }

    public void deleteCommission() {
        try {
            commissionFacade.remove(commission);
            FacesContext.getCurrentInstance().getExternalContext().redirect(getRequest().getContextPath() + "/commission/search.xhtml");
        } catch (IOException ex) {
            LOGGER.error("Error In Delete Commision", ex);
            setFacesMessage(getBundle("error_general"));
        }
    }

    public void uploadReportFile(FileUploadEvent event) {
        UploadedFile file = event.getFile();
        commission.setCommRepPhoto(getBytes(file));
        commission.setCommRepName(file.getFileName());
        commission.setCommRepType(file.getContentType());
        setFacesMessage(getBundle("notify_successOperation"));
    }

    public void uploadDecisionFile(FileUploadEvent event) {
        UploadedFile file = event.getFile();
        commission.setCommDecisionPhoto(getBytes(file));
        commission.setCommDecisionName(file.getFileName());
        commission.setCommDecisionType(file.getContentType());
        setFacesMessage(getBundle("notify_successOperation"));
    }

    private byte[] getBytes(UploadedFile uploadedFile) {
        byte[] byteArray = null;
        try {
            byteArray = new byte[(int) uploadedFile.getSize()];
            InputStream objStream = uploadedFile.getInputstream();
            objStream.read(byteArray);
            objStream.close();
        } catch (IOException ex) {
            LOGGER.error("Error In Upload File", ex);
            setFacesMessage(getBundle("error_general"));
        }
        return byteArray;
    }

    public void deleteReportFile() {
        commission.setCommRepPhoto(null);
        commission.setCommRepName(null);
        commission.setCommRepType(null);
        setFacesMessage(getBundle("notify_successOperation"));
    }

    public void deleteDecisionFile() {
        commission.setCommDecisionPhoto(null);
        commission.setCommDecisionName(null);
        commission.setCommDecisionType(null);
        setFacesMessage(getBundle("notify_successOperation"));
    }

    public List<Organization> getOrganizationList() {
        return organizationList;
    }

    public OrganizationFacade getOrganizationFacade() {
        return organizationFacade;
    }

    public void setOrganizationFacade(OrganizationFacade organizationFacade) {
        this.organizationFacade = organizationFacade;
    }

    public FacultyFacade getFacultyFacade() {
        return facultyFacade;
    }

    public void setFacultyFacade(FacultyFacade facultyFacade) {
        this.facultyFacade = facultyFacade;
    }

    public List<Type> getTypeList() {
        return typeList;
    }

    public void setTypeList(List<Type> typeList) {
        this.typeList = typeList;
    }

    public TypeFacade getTypeFacade() {
        return typeFacade;
    }

    public CommissionMember getSelectedCommissionMember() {
        return selectedCommissionMember;
    }

    public void setSelectedCommissionMember(CommissionMember selectedCommissionMember) {
        this.selectedCommissionMember = selectedCommissionMember;
    }

    public CommissionAction getSelectedCommissionAction() {
        return selectedCommissionAction;
    }

    public void setSelectedCommissionAction(CommissionAction selectedCommissionAction) {
        this.selectedCommissionAction = selectedCommissionAction;
    }

    public void setTypeFacade(TypeFacade typeFacade) {
        this.typeFacade = typeFacade;
    }

    public void setOrganizationList(List<Organization> organizationList) {
        this.organizationList = organizationList;
    }

    public Commission getCommission() {
        return commission;
    }

    public void setCommission(Commission commission) {
        this.commission = commission;
    }

    public boolean isOnlyView() {
        return onlyView;
    }

    public void setOnlyView(boolean onlyView) {
        this.onlyView = onlyView;
    }

}
