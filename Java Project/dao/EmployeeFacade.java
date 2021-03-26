/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.dao;

import eg.edu.tanta.entities.Employee;
import eg.edu.tanta.enums.FlagsEnum;
import eg.edu.tanta.enums.QueryNamesEnum;
import eg.edu.tanta.exceptions.BusinessException;
import eg.edu.tanta.exceptions.DatabaseException;
import eg.edu.tanta.exceptions.NoDataException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import javax.ejb.Stateless;
import org.slf4j.LoggerFactory;

/**
 *
 * @author Salma
 */
@Stateless
public class EmployeeFacade extends AbstractFacade<Employee> {
    static final org.slf4j.Logger LOGGER = LoggerFactory.getLogger(EmployeeFacade.class);

    public EmployeeFacade() {
        super(Employee.class);
    }

    public List<Employee> getEmployee(String username, String userMail) throws BusinessException {
        return searchEmployee(username, userMail, null);
    }

    public Employee authenticateEmployee(String username, String password) throws BusinessException {
        Employee user = null;
        List<Employee> userList = searchEmployee(username, null, password);
        if (!userList.isEmpty()) {
            user = userList.get(0);
        }
        return user;
    }

    private List<Employee> searchEmployee(String username, String userMail, String userPassword) throws BusinessException {
        List<Employee> users;
        try {
            Map<String, Object> qParams = new HashMap<String, Object>();
            qParams.put("P_USER_NAME", username == null ? FlagsEnum.ALL.getCode() + "" : username);
            qParams.put("P_USER_EMAIL", userMail == null ? FlagsEnum.ALL.getCode() + "" : userMail);
            qParams.put("P_USER_PASSWORD", userPassword == null ? FlagsEnum.ALL.getCode() + "" : userPassword);
            users = executeNamedQuery(QueryNamesEnum.EMPLOYEE_SERACH_EMPLOYEE.getCode(), qParams);
        } catch (DatabaseException e) {
            LOGGER.error("EmployeeFacade_DatabaseException", e);
            throw new BusinessException("error_general");
        } catch (NoDataException ex) {
            users = new ArrayList<Employee>();
        }
        return users;
    }
}
