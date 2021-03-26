/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.dao;

import eg.edu.tanta.entities.RuleAndRegulation;
import javax.ejb.Stateless;

/**
 *
 * @author Salma
 */
@Stateless
public class RuleAndRegulationFacade extends AbstractFacade<RuleAndRegulation> {

    public RuleAndRegulationFacade() {
        super(RuleAndRegulation.class);
    }
    
}
