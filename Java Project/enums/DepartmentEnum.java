/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.enums;

/**
 *
 * @author Salma
 */
public enum DepartmentEnum {
    Financial(1),
    Organizational(2),
    ALL(3);

    private int code;

    private DepartmentEnum(int code) {
        this.code = code;
    }

    public int getCode() {
        return code;
    }
}
