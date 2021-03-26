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
public enum BundleEnum {
    AR("ar"),
    EN("en");

    private String code;

    private BundleEnum(String code) {
	this.code = code;
    }

    public String getCode() {
	return code;
    }
}
