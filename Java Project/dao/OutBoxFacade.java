/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.dao;

import eg.edu.tanta.entities.OutBox;
import javax.ejb.Stateless;

/**
 *
 * @author Salma
 */
@Stateless
public class OutBoxFacade extends AbstractFacade<OutBox> {

    public OutBoxFacade() {
        super(OutBox.class);
    }
    
}
