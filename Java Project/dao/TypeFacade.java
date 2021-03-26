/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.dao;

import eg.edu.tanta.entities.Type;
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
public class TypeFacade extends AbstractFacade<Type> {

    static final org.slf4j.Logger LOGGER = LoggerFactory.getLogger(ReportFacade.class);

    public TypeFacade() {
        super(Type.class);
    }

    public List<Type> getTypeList() throws BusinessException {
        return searchType();
    }

    private List<Type> searchType() throws BusinessException {
        List<Type> typeList;
        try {
            typeList = executeNamedQuery(QueryNamesEnum.TYPE_SEARCH_TYPE.getCode(), null);
        } catch (DatabaseException e) {
            LOGGER.error("TypeFacade_DatabaseException", e);
            throw new BusinessException("error_general");
        } catch (NoDataException ex) {
            typeList = new ArrayList<Type>();
        }
        return typeList;
    }

}
