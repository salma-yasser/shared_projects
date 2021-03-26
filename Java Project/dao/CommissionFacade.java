/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.dao;

import eg.edu.tanta.entities.Commission;
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
public class CommissionFacade extends AbstractFacade<Commission> {
    static final org.slf4j.Logger LOGGER = LoggerFactory.getLogger(CommissionFacade.class);

    public CommissionFacade() {
        super(Commission.class);
    }

    public void update(Commission commission) throws BusinessException {
        List<Commission> list = searchCommission((long)FlagsEnum.ALL.getCode(), commission.getCommNumber(), commission.getCommDate(), commission.getCommDate(), FlagsEnum.ALL.getCode(),commission.getCommDecFrom(), FlagsEnum.ALL.getCode(), "", "");
        if (list.isEmpty() || list.get(0).getCommID().equals(commission.getCommID())) {
            edit(commission);
        } else {
            throw new BusinessException("error_unique");
        }
    }

    public void saveNew(Commission commission) throws BusinessException {
        List<Commission> list = searchCommission((long)FlagsEnum.ALL.getCode(), commission.getCommNumber(), commission.getCommDate(), commission.getCommDate(), FlagsEnum.ALL.getCode(),commission.getCommDecFrom(), FlagsEnum.ALL.getCode(), "", "");
        if (list.isEmpty()) {
            create(commission);
        } else {
            throw new BusinessException("error_unique");
        }
    }

    public List<Commission> getCommissionList(Long commNumber, Date commDateFrom, Date commDateTo, long facultyID,String decFrom, int status, String commMembName, String commSubject) throws BusinessException {
        return searchCommission((long)FlagsEnum.ALL.getCode(), commNumber, commDateFrom, commDateTo, facultyID, decFrom , status, commMembName, commSubject);
    }

    public Commission getCommission(long commId) throws BusinessException {
        Commission commission = null;
        List<Commission> list = searchCommission(commId, null, null, null, FlagsEnum.ALL.getCode(),null, FlagsEnum.ALL.getCode(), "", "");
        if (!list.isEmpty()) {
            commission = list.get(0);
        }
        return commission;
    }

    private List<Commission> searchCommission(Long commId, Long commNumber, Date commDateFrom, Date commDateTo, long facultyID, String decFrom, int status, String commMembName, String commSubject) throws BusinessException {
        List<Commission> commissionList;
        try {
            Map<String, Object> qParams = new HashMap<String, Object>();
            qParams.put("P_COMM_ID", commId);
            qParams.put("P_COMM_NUMBER", commNumber == null ? FlagsEnum.ALL.getCode() : commNumber);
            qParams.put("P_COMM_DATEFROM", commDateFrom);
            qParams.put("P_COMM_DATETO", commDateTo );
            qParams.put("P_FACULTY_ID", facultyID);
            qParams.put("P_DEC_FROM", decFrom == null ? FlagsEnum.ALL.getCode()+ "" :decFrom);
            qParams.put("P_STATUS", status);
            qParams.put("P_MEMB_NAME", commMembName.isEmpty() ? FlagsEnum.ALL.getCode() + "" : "%" + commMembName + "%");
            qParams.put("P_COMM_SUBJECT", commSubject.isEmpty() ? FlagsEnum.ALL.getCode() + "" : "%" + commSubject + "%");

            commissionList = executeNamedQuery(QueryNamesEnum.COMMISSION_SEARCH_COMMISSION.getCode(), qParams);
        } catch (DatabaseException e) {
            LOGGER.error("CommissionFacade_DatabaseException", e);
            throw new BusinessException("error_general");
        } catch (NoDataException ex) {
            commissionList = new ArrayList<Commission>();
        }
        return commissionList;
    }

}
