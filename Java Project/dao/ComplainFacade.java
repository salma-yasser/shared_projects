/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.dao;

import eg.edu.tanta.entities.Complain;
import eg.edu.tanta.enums.DepartmentEnum;
import eg.edu.tanta.enums.FlagsEnum;
import eg.edu.tanta.enums.QueryNamesEnum;
import eg.edu.tanta.exceptions.BusinessException;
import eg.edu.tanta.exceptions.DatabaseException;
import eg.edu.tanta.exceptions.NoDataException;
import java.util.ArrayList;
import java.util.Date;
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
public class ComplainFacade extends AbstractFacade<Complain> {

    static final org.slf4j.Logger LOGGER = LoggerFactory.getLogger(ComplainFacade.class);

    public ComplainFacade() {
        super(Complain.class);
    }

    public void update(Complain complain) throws BusinessException {
        List<Complain> list = searchComplain(FlagsEnum.ALL.getCode(), complain.getCompNumber(), complain.getDeptID().getDeptID(), complain.getCompDate(), complain.getCompDate(), FlagsEnum.ALL.getCode(), FlagsEnum.ALL.getCode(), null, null, null);
        if (list.isEmpty() || list.get(0).getCompID().equals(complain.getCompID())) {
            edit(complain);
        } else {
            throw new BusinessException("error_unique");
        }
    }

    public void saveNew(Complain complain) throws BusinessException {
        List<Complain> list = searchComplain(FlagsEnum.ALL.getCode(), complain.getCompNumber(), complain.getDeptID().getDeptID(), complain.getCompDate(), complain.getCompDate(), FlagsEnum.ALL.getCode(), FlagsEnum.ALL.getCode(), null, null, null);
        if (list.isEmpty()) {
            create(complain);
        } else {
            throw new BusinessException("error_unique");
        }
    }

    public List<Complain> getComplainList(Long compNumber, Long depId, Date compDateFrom, Date compDateTo, long facultyID, int status, String complainerName, String compSubject, String compType) throws BusinessException {
        return searchComplain((long) FlagsEnum.ALL.getCode(), compNumber, depId, compDateFrom, compDateTo, facultyID, status, complainerName, compSubject, compType);
    }

    public Complain getComplain(long compId, Long depId) throws BusinessException {
        Complain complain = null;
        List<Complain> list = searchComplain(compId, null, depId, null, null, FlagsEnum.ALL.getCode(), FlagsEnum.ALL.getCode(), null, null, null);
        if (!list.isEmpty()) {
            complain = list.get(0);
        }
        return complain;
    }

    private List<Complain> searchComplain(long compId, Long compNumber, Long depID, Date compDateFrom, Date compDateTo, long facultyID, int status, String complainerName, String compSubject, String compType) throws BusinessException {
        List<Complain> ComplainList;
        try {
            Map<String, Object> qParams = new HashMap<String, Object>();
            qParams.put("P_COMP_ID", compId);
            qParams.put("P_COMP_NUMBER", compNumber == null ? FlagsEnum.ALL.getCode() : compNumber);
            qParams.put("P_COMP_DATEFROM", compDateFrom);
            qParams.put("P_COMP_DATETO", compDateTo);
            qParams.put("P_FACULTY_ID", facultyID);
            qParams.put("P_STATUS", status);
            qParams.put("P_COMPLAINER_NAME", complainerName == null || complainerName.isEmpty() ? FlagsEnum.ALL.getCode() + "" : "%" + complainerName + "%");
            qParams.put("P_COMP_SUBJECT", compSubject == null || compSubject.isEmpty() ? FlagsEnum.ALL.getCode() + "" : "%" + compSubject + "%");
            qParams.put("P_COMP_TYPE", compType == null || compType.isEmpty() ? FlagsEnum.ALL.getCode() + "" : "%" + compType + "%");
            qParams.put("P_DEP_ID", depID == null || depID == DepartmentEnum.ALL.getCode() ? FlagsEnum.ALL.getCode() : depID);
            ComplainList = executeNamedQuery(QueryNamesEnum.COMPLAIN_SEARCH_COMPLAIN.getCode(), qParams);
        } catch (DatabaseException e) {
            LOGGER.error("ComplainFacade_DatabaseException", e);
            throw new BusinessException("error_general");
        } catch (NoDataException ex) {
            ComplainList = new ArrayList<Complain>();
        }
        return ComplainList;
    }

}
