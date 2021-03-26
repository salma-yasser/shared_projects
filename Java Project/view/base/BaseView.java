/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.view.base;

import eg.edu.tanta.entities.Screen;
import eg.edu.tanta.enums.BundleEnum;
import java.io.IOException;
import java.text.MessageFormat;
import java.util.List;
import java.util.Locale;
import java.util.ResourceBundle;
import javax.annotation.PostConstruct;
import javax.faces.application.Application;
import javax.faces.application.FacesMessage;
import javax.faces.context.FacesContext;
import javax.inject.Inject;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpSession;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

/**
 *
 * @author Salma
 */
public abstract class BaseView {

    @Inject
    private UserManager userManager;
    static final Logger LOGGER = LoggerFactory.getLogger(BaseView.class);
    private ResourceBundle bundle = ResourceBundle.getBundle("bundle", new Locale(BundleEnum.AR.getCode()));

    @PostConstruct
    protected void init() {
    }

    protected HttpServletRequest getRequest() {
        return (HttpServletRequest) FacesContext.getCurrentInstance().getExternalContext().getRequest();
    }

    protected HttpSession getSession() {
        return ((HttpServletRequest) FacesContext.getCurrentInstance().getExternalContext().getRequest()).getSession();
    }

    protected Application getApplication() {
        return FacesContext.getCurrentInstance().getApplication();
    }

    public void setFacesMessage(String messageString) {
        FacesMessage msg = new FacesMessage(messageString, "");
        FacesContext.getCurrentInstance().addMessage(null, msg);
    }

    public void setServerSideSuccessMessages(String serverSideSuccessMessages) {
        setNotifyMessage(FacesMessage.SEVERITY_INFO, "", serverSideSuccessMessages);
    }

    public void setServerSideErrorMessages(String serverSideErrorMessages) {
        setNotifyMessage(FacesMessage.SEVERITY_ERROR, "", serverSideErrorMessages);
    }

    public void setNotifyMessage(FacesMessage.Severity severity, String messageHeader, String messageDetail) {
        FacesContext.getCurrentInstance().addMessage(null, new FacesMessage(severity, messageHeader, messageDetail));
    }

    public String getBundle(String key, Object... params) {
        String value = bundle.getString(key);
        return params == null ? value : MessageFormat.format(value, params);
    }

    public void changeLocale(String lang) {
        Locale locale = new Locale(lang);
        this.bundle = ResourceBundle.getBundle("bundle", locale);
    }

    public void goToAccessDenied() {
        try {
            FacesContext.getCurrentInstance().getExternalContext().redirect(getRequest().getContextPath() + "/accessDenied.xhtml");
        } catch (IOException ex) {
            LOGGER.error("Exception", ex);
            setFacesMessage(getBundle("error_general"));
        }
    }

    public void checkAccessability() {
        String screenPath = getRequest().getServletPath();
        List<Screen> screenList = userManager.getCurrentUser().getCurrentRole().getScreenList();
        boolean accessDenied = true;
        for (Screen screen : screenList) {
            if (screen.getPath().endsWith(screenPath)) {
                accessDenied = false;
                break;
            }
        }
        if (accessDenied && getRequest().getParameterMap().isEmpty()) {
            goToAccessDenied();
        }
    }

    public boolean isEditable() {
        return userManager.getCurrentUser().getCurrentRole().getEditable();
    }

    public UserManager getUserManager() {
        return userManager;
    }

    public void setUserManager(UserManager userManager) {
        this.userManager = userManager;
    }

    public ResourceBundle getBundle() {
        return bundle;
    }

    public void setBundle(ResourceBundle bundle) {
        this.bundle = bundle;
    }

}
