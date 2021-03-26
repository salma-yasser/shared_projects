/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.dao;

import eg.edu.tanta.entities.Report;
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
public class ReportFacade extends AbstractFacade<Report> {

    static final org.slf4j.Logger LOGGER = LoggerFactory.getLogger(ReportFacade.class);

    public ReportFacade() {
        super(Report.class);
    }

    public void update(Report report) throws BusinessException {
        List<Report> list = searchReport(FlagsEnum.ALL.getCode(), report.getRepNumber(), report.getDeptID().getDeptID(), report.getRepDate(), report.getRepDate(), report.getOrgID().getOrgID(), report.getFacID().getFacID(), FlagsEnum.ALL.getCode(), FlagsEnum.ALL.getCode(), null);
        if (list.isEmpty() || list.get(0).getRepID().equals(report.getRepID())) {
            edit(report);
        } else {
            throw new BusinessException("error_unique");
        }
    }

    public void saveNew(Report report) throws BusinessException {
        List<Report> list = searchReport(FlagsEnum.ALL.getCode(), report.getRepNumber(), report.getDeptID().getDeptID(), report.getRepDate(), report.getRepDate(), report.getOrgID().getOrgID(), report.getFacID().getFacID(), FlagsEnum.ALL.getCode(), FlagsEnum.ALL.getCode(), null);
        if (list.isEmpty()) {
            create(report);
        } else {
            throw new BusinessException("error_unique");
        }
    }

    public List<Report> getReportList(Long reportNumber, Long depID, Date fromDate, Date toDate, long organizationID, long facultyID, int status, long noteCatID, Long inboxNumber) throws BusinessException {
        return searchReport(FlagsEnum.ALL.getCode(), reportNumber, depID, fromDate, toDate, organizationID, facultyID, status, noteCatID, inboxNumber);
    }

    public Report getReport(long reportId) throws BusinessException {
        Report report = null;
        List<Report> list = searchReport(reportId, null, null, null, null, FlagsEnum.ALL.getCode(), FlagsEnum.ALL.getCode(), FlagsEnum.ALL.getCode(), FlagsEnum.ALL.getCode(), null);
        if (!list.isEmpty()) {
            report = list.get(0);
        }
        return report;
    }

    public Report getReport(long reportId, Long depID) throws BusinessException {
        Report report = null;
        List<Report> list = searchReport(reportId, null, depID, null, null, FlagsEnum.ALL.getCode(), FlagsEnum.ALL.getCode(), FlagsEnum.ALL.getCode(), FlagsEnum.ALL.getCode(), null);
        if (!list.isEmpty()) {
            report = list.get(0);
        }
        return report;
    }

    private List<Report> searchReport(long reportId, Long reportNumber, Long depID, Date fromDate, Date toDate, long organizationID, long facultyID, int status, long noteCatID, Long inboxNumber) throws BusinessException {
        List<Report> reportList;
        try {
            Map<String, Object> qParams = new HashMap<String, Object>();
            qParams.put("P_REPORT_ID", reportId);
            qParams.put("P_REPORT_NUMBER", reportNumber == null ? FlagsEnum.ALL.getCode() : reportNumber);
            qParams.put("P_FROM_DATE", fromDate);
            qParams.put("P_TO_DATE", toDate);
            qParams.put("P_ORGANIZATION_ID", organizationID);
            qParams.put("P_FACULTY_ID", facultyID);
            qParams.put("P_STATUS", status);
            qParams.put("P_NOTE_CAT", noteCatID);
            qParams.put("P_DEP_ID", depID == null || depID == DepartmentEnum.ALL.getCode() ? FlagsEnum.ALL.getCode() : depID);
            qParams.put("P_INBOX_NUMBER", inboxNumber == null ? FlagsEnum.ALL.getCode() : inboxNumber);
            reportList = executeNamedQuery(QueryNamesEnum.REPORT_SEARCH_REPORT.getCode(), qParams);
        } catch (DatabaseException e) {
            LOGGER.error("ReportFacade_DatabaseException", e);
            throw new BusinessException("error_general");
        } catch (NoDataException ex) {
            reportList = new ArrayList<Report>();
        }
        return reportList;
    }
}
