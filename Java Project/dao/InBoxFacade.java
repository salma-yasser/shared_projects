/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.dao;

import eg.edu.tanta.entities.InBox;
import javax.ejb.Stateless;

/**
 *
 * @author Salma
 */
@Stateless
public class InBoxFacade extends AbstractFacade<InBox> {

    public InBoxFacade() {
        super(InBox.class);
    }
    
}
