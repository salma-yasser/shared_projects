/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.dao;

import eg.edu.tanta.entities.AllOrganization;
import eg.edu.tanta.enums.QueryNamesEnum;
import eg.edu.tanta.exceptions.BusinessException;
import eg.edu.tanta.exceptions.DatabaseException;
import eg.edu.tanta.exceptions.NoDataException;
import java.util.ArrayList;
import java.util.List;
import javax.ejb.Stateless;
import org.slf4j.LoggerFactory;

/**
 *
 * @author Salma
 */
@Stateless
public class AllOrganizationFacade extends AbstractFacade<AllOrganization> {
    static final org.slf4j.Logger LOGGER = LoggerFactory.getLogger(AllOrganizationFacade.class);

    public AllOrganizationFacade() {
        super(AllOrganization.class);
    }

    public List<AllOrganization> getAllOrganizationList() throws BusinessException {
        return searchAllOrganization();
    }

    private List<AllOrganization> searchAllOrganization() throws BusinessException {
        List<AllOrganization> allOrganizationList;
        try {
            allOrganizationList = executeNamedQuery(QueryNamesEnum.ALLORGANIZATION_SEARCH_ORGANIZATION.getCode(), null);
        } catch (DatabaseException e) {
            LOGGER.error("AllOrganizationFacade_DatabaseException", e);
            throw new BusinessException("error_general");
        } catch (NoDataException ex) {
            allOrganizationList = new ArrayList<AllOrganization>();
        }
        return allOrganizationList;
    }

}
