/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.view.base;

import eg.edu.tanta.dao.EmployeeFacade;
import eg.edu.tanta.entities.Employee;
import eg.edu.tanta.entities.Screen;
import eg.edu.tanta.entities.ScreenType;
import eg.edu.tanta.exceptions.BusinessException;
import java.io.IOException;
import java.io.Serializable;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.enterprise.context.SessionScoped;
import javax.faces.application.FacesMessage;
import javax.faces.context.ExternalContext;
import javax.faces.context.FacesContext;
import javax.inject.Inject;
import javax.inject.Named;
import org.primefaces.model.menu.DefaultMenuItem;
import org.primefaces.model.menu.DefaultMenuModel;
import org.primefaces.model.menu.DefaultSubMenu;
import org.primefaces.model.menu.MenuModel;

/**
 *
 * @author Salma
 */
@Named(value = "userManager")
@SessionScoped
public class UserManager extends BaseView implements Serializable {

    @Inject
    private EmployeeFacade employeeFacade;

    private Employee currentUser;
    private String username = "";
    private String password = "";
    private MenuModel model;

    public UserManager() {
    }

    public void login() {
        try {
            Employee user = employeeFacade.authenticateEmployee(username, password);
            if (user != null) {
                currentUser = user;
                currentUser.setCurrentRole(user.getRoleList() == null || user.getRoleList().isEmpty() ? null : user.getRoleList().get(0));
                loadMenu();
                getExternalContext().redirect(null);
            } else {
                // Handle unknown userEmail/password in request.login().
                FacesMessage msg = new FacesMessage(getBundle("error_invalidUser"), "");
                FacesContext.getCurrentInstance().addMessage(null, msg);
                username = "";
                password = "";
            }
        } catch (Exception e) {
            // Handle invalid password in request.login().
            if (e instanceof BusinessException) {
                getBundle(e.getMessage());
            } else {
                getBundle("error_general");
            }
        }
    }

    public void loadMenu() {
        model = new DefaultMenuModel();
        List<Screen> screenList = getCurrentUser().getCurrentRole().getScreenList();
        DefaultSubMenu subMenuModel;
        DefaultMenuItem menuItemModel;
        Map<Long, DefaultSubMenu> subMenuMap = new HashMap<Long, DefaultSubMenu>();
        for (Screen screen : screenList) {
            ScreenType subMenu = screen.getScreenType();
            subMenuModel = subMenuMap.get(subMenu.getId());
            //Check new SubMenu
            if (subMenuModel == null) {
                subMenuModel = new DefaultSubMenu(subMenu.getName());
                subMenuModel.setId(String.valueOf(subMenu.getId()));
                subMenuMap.put(subMenu.getId(), subMenuModel);
            }
            menuItemModel = new DefaultMenuItem(screen.getName(), null, screen.getPath());
            subMenuModel.addElement(menuItemModel);
        }
        for (DefaultSubMenu subMenu : subMenuMap.values()) {
            model.addElement(subMenu);
        }
    }

    public void changeRole() {
        loadMenu();
        goToWelcomePage();
    }

    public String goToLogIn() {
        return "/login.xhtml?faces-redirect=true";
    }

    public void goToWelcomePage() {
        try {
            getExternalContext().redirect(getExternalContext().getRequestContextPath() + "/index.xhtml");
            FacesContext.getCurrentInstance().responseComplete();
        } catch (IOException ex) {
            Logger.getLogger(UserManager.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    private ExternalContext getExternalContext() {
        FacesContext context = FacesContext.getCurrentInstance();
        ExternalContext externalContext = context.getExternalContext();
        return externalContext;
    }

    public String logout() {
        FacesContext.getCurrentInstance().getExternalContext().invalidateSession();
        return "/login.xhtml?faces-redirect=true";//
    }

    public boolean isLoggedIn() {
        return currentUser != null;
    }

    public Employee getCurrentUser() {
        return currentUser;
    }

    public void setCurrentUser(Employee currentUser) {
        this.currentUser = currentUser;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public MenuModel getModel() {
        return model;
    }

    public void setModel(MenuModel model) {
        this.model = model;
    }

}
