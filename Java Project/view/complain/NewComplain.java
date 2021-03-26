/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.view.complain;

import eg.edu.tanta.dao.ComplainFacade;
import eg.edu.tanta.entities.Complain;
import eg.edu.tanta.entities.ComplainAction;
import eg.edu.tanta.entities.Faculty;
import eg.edu.tanta.enums.RequestParameterEnum;
import eg.edu.tanta.exceptions.BusinessException;
import eg.edu.tanta.utils.DateService;
import eg.edu.tanta.view.base.BaseView;
import eg.edu.tanta.view.base.UserManager;
import java.io.IOException;
import java.io.Serializable;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import javax.annotation.PostConstruct;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.faces.context.FacesContext;
import javax.inject.Inject;
import org.slf4j.LoggerFactory;

/**
 *
 * @author Asmaa
 */
@ManagedBean(name = "newComplain")
@ViewScoped
public class NewComplain extends BaseView implements Serializable {

    static final org.slf4j.Logger LOGGER = LoggerFactory.getLogger(NewComplain.class);

    @Inject
    private UserManager userManager;
    @Inject
    private ComplainFacade complainFacade;

    private boolean onlyView;
    private List<Faculty> facultyList;
    private Complain complain;
    private ComplainAction selectedAction;

    public NewComplain() {

    }

    @PostConstruct
    public void init() {
        try {
            super.init();
            facultyList = userManager.getCurrentUser().getFacultyList();
            if (getRequest().getParameterMap().isEmpty()) {
                complain = new Complain();
                complain.setNewObj(true);
                complain.setDeptID(getUserManager().getCurrentUser().getCurrentRole().getDep());
            } else {
                int compId = Integer.parseInt(getRequest().getParameter(RequestParameterEnum.COMPLAIN_ID.getCode()));
                complain = complainFacade.getComplain(compId, getUserManager().getCurrentUser().getCurrentRole().getDep().getDeptID());
                if (complain == null) {
                    goToAccessDenied();
                } else {
                    if (!isEditable() || !facultyList.contains(complain.getFacID())) {
                        onlyView = true;
                    }
                }
            }
        } catch (BusinessException ex) {
            LOGGER.error("Error In Loading Page Complain", ex);
            setFacesMessage(getBundle(ex.getMessage()));
        } catch (Exception e) {
            LOGGER.error("Error In Loading Page Report", e);
            setFacesMessage(getBundle(e.getMessage()));
        }

    }

    public void prepareActionDG() {
        selectedAction = new ComplainAction();
        selectedAction.setNewObj(true);
        selectedAction.setCompID(complain);
    }

    public void saveComplain() throws BusinessException {
        try {
            if (complain.isNewObj()) {
                complainFacade.saveNew(complain);
                complain.setNewObj(false);
            } else {
                complainFacade.update(complain);
            }
            setFacesMessage(getBundle("notify_successOperation"));
        } catch (BusinessException ex) {
            setFacesMessage(getBundle(ex.getMessage()));
        }
    }

    public void deleteComplain() {
        try {
            complainFacade.remove(complain);
            FacesContext.getCurrentInstance().getExternalContext().redirect(getRequest().getContextPath() + "/complains/search.xhtml");
        } catch (IOException ex) {
            LOGGER.error("Error In Delete Complain", ex);
            setFacesMessage(getBundle("error_general"));
        }
    }

    public ComplainAction getSelectedAction() {
        return selectedAction;
    }

    public void setSelectedAction(ComplainAction selectedAction) {
        this.selectedAction = selectedAction;
    }

    public List<Faculty> getFacultyList() {
        return facultyList;
    }

    public void setFacultyList(List<Faculty> facultyList) {
        this.facultyList = facultyList;
    }

    public void deleteComplainAction(ComplainAction complainAction) {
        complain.getComplainActionList().remove(complainAction);
    }

    public Complain getComplain() {
        return complain;
    }

    public void setComplain(Complain complain) {
        this.complain = complain;
    }

    public String formatDate(Date date) {
        return DateService.getDateString(date);
    }

    public void savecomplainaction() {
        if (selectedAction != null && selectedAction.isNewObj()) {
            if (complain.getComplainActionList() == null) {
                complain.setComplainActionList(new ArrayList<ComplainAction>());
            }
            complain.getComplainActionList().add(selectedAction);
            selectedAction.setNewObj(false);
        }
    }

    public boolean isOnlyView() {
        return onlyView;
    }

    public void setOnlyView(boolean onlyView) {
        this.onlyView = onlyView;
    }
}
