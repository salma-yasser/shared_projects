/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.dao;

import eg.edu.tanta.entities.Faculty;
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
public class FacultyFacade extends AbstractFacade<Faculty> {
    static final org.slf4j.Logger LOGGER = LoggerFactory.getLogger(FacultyFacade.class);

    public FacultyFacade() {
        super(Faculty.class);
    }

   public List<Faculty> getFacultysList() throws BusinessException {
        return searchFacultys(null);
    }

    private List<Faculty> searchFacultys(String name) throws BusinessException {
        List<Faculty> results = null;
        try {
            results = executeNamedQuery(QueryNamesEnum.FACULTY_SEARCH_FACULTY.getCode(), null);
            return results;
        } catch (DatabaseException ex) {
            LOGGER.error("FacultyFacade_DatabaseException", ex);
            throw new BusinessException("error_general");
        } catch (NoDataException ex) {
            results = new ArrayList<Faculty>();
        }
        return results;
    }
}
