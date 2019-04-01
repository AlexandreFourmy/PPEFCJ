/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javaapplication2;

/**
 *
 * @author julien.dussart
 */
public class Equipement {
    private String idEquip;
    private String libEquip;
    
    public Equipement(String unId, String unLib){
        this.idEquip = unId;
        this.libEquip = unLib;
        
    }
    
    public String toString(){
        System.out.println("Le libellé de l'équipement est:" + libEquip);
        return null;        
    }
    
}
