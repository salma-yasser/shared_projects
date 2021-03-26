/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package eg.edu.tanta.dao;

import eg.edu.tanta.entities.Note;
import javax.ejb.Stateless;

/**
 *
 * @author Salma
 */
@Stateless
public class NoteFacade extends AbstractFacade<Note> {

    public NoteFacade() {
        super(Note.class);
    }
    
}
