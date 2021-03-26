/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.dao;

import eg.edu.tanta.entities.ComplainAction;

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
public class ComplainActionFacade extends AbstractFacade<ComplainAction> {
    static final org.slf4j.Logger LOGGER = LoggerFactory.getLogger(ComplainActionFacade.class);

    public ComplainActionFacade() {
        super(ComplainAction.class);
    }
    
    
     public List<ComplainAction> getcomplainActionlist() throws BusinessException {
        return searchComplainAction();
    }

    private List<ComplainAction> searchComplainAction() throws BusinessException {
        List<ComplainAction> complainActionlist;
        try {
            complainActionlist = executeNamedQuery(QueryNamesEnum.CATEGORY_SEARCH_CATEGORY.getCode(), null);
        } catch (DatabaseException e) {
             LOGGER.error("ComplainActionFacade_DatabaseException", e);
            throw new BusinessException("error_general");
        } catch (NoDataException ex) {
            complainActionlist = new ArrayList<ComplainAction>();
        }
        return complainActionlist;
    }

}
