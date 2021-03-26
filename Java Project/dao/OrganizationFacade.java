/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.dao;

import eg.edu.tanta.entities.Organization;
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
public class OrganizationFacade extends AbstractFacade<Organization> {
    static final org.slf4j.Logger LOGGER = LoggerFactory.getLogger(OrganizationFacade.class);
    
    public OrganizationFacade() {
        super(Organization.class);
    }

    public List<Organization> getOrganizationList() throws BusinessException {
        return searchOrganization(null);
    }

    private List<Organization> searchOrganization(String name) throws BusinessException {
        List<Organization> organizationList;
        try {
            organizationList = executeNamedQuery(QueryNamesEnum.ORGANIZATION_SEARCH_ORGANIZATION.getCode(), null);
        } catch (DatabaseException e) {
            LOGGER.error("OrganizationFacade_DatabaseException", e);
            throw new BusinessException("error_general");
        } catch (NoDataException ex) {
            organizationList = new ArrayList<Organization>();
        }
        return organizationList;
    }
}
