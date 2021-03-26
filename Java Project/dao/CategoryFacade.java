/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.dao;

import eg.edu.tanta.entities.Category;
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
public class CategoryFacade extends AbstractFacade<Category> {
    static final org.slf4j.Logger LOGGER = LoggerFactory.getLogger(CategoryFacade.class);

    public CategoryFacade() {
        super(Category.class);
    }

    public List<Category> getCategoryList() throws BusinessException {
        return searchCategory();
    }

    private List<Category> searchCategory() throws BusinessException {
        List<Category> categoryList;
        try {
            categoryList = executeNamedQuery(QueryNamesEnum.CATEGORY_SEARCH_CATEGORY.getCode(), null);
        } catch (DatabaseException e) {
            LOGGER.error("CategoryFacade_DatabaseException", e);
            throw new BusinessException("error_general");
        } catch (NoDataException ex) {
            categoryList = new ArrayList<Category>();
        }
        return categoryList;
    }

}
