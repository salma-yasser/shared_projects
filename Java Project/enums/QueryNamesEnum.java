package eg.edu.tanta.enums;

/**
 *
 * @author salma.eid
 */
public enum QueryNamesEnum {
    EMPLOYEE_SERACH_EMPLOYEE("Employee.searchEmployee"),
    FACULTY_SEARCH_FACULTY("Faculty.searchFaculty"),
    ORGANIZATION_SEARCH_ORGANIZATION("Organization.searchOrganization"),
    CATEGORY_SEARCH_CATEGORY("Category.searchCategory"),
    TYPE_SEARCH_TYPE("Type.searchType"),
    REPORT_SEARCH_REPORT("Report.searchReport"),
    COMMISSION_SEARCH_COMMISSION("Commission.searchCommission"),
    COMPLAIN_SEARCH_COMPLAIN("Complain.searchComplain"),
    ALLORGANIZATION_SEARCH_ORGANIZATION("AllOrganization.searchOrganization");
   
    private String code;

    private QueryNamesEnum(String code) {
        this.code = code;
    }

    public String getCode() {
        return code;
    }
}
