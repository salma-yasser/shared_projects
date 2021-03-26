/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.utils;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;

/**
 *
 * @author Salma
 */
public class DateService {

    public static final String DATE_FORMAT = "dd-MM-yyyy";

    private DateService() {
    }

    public static String getDateString(Date date) {
        SimpleDateFormat sdf = new SimpleDateFormat(DATE_FORMAT);
        return ((date == null) ? null : sdf.format(date));
    }

    public static String getDateString(Date date, String dateFormat) {
        SimpleDateFormat sdf = new SimpleDateFormat(dateFormat);
        return ((date == null) ? null : sdf.format(date));
    }

    public static Date getDate(String dateString) {
        SimpleDateFormat sdf = new SimpleDateFormat(DATE_FORMAT);
        Date date;
        try {
            date = ((dateString == null) ? null : sdf.parse(dateString));
        } catch (ParseException ex) {
            date = null;
        }
        return date;
    }

}
