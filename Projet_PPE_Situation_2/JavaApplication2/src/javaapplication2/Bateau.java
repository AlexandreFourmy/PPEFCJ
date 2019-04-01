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
public class Bateau {
    
    private String idBat;
    String nomBat;
    double LongueurBat;
    double LargeurBat;
    
    public Bateau (String unId, String unNom, double uneLongueur, double uneLargeur){
        this.idBat = unId;
        this.nomBat = unNom;
        this.LongueurBat = uneLongueur;
        this.LargeurBat = uneLargeur;       
        
        
    }
    
    public String toString(){
    System.out.println("Nom du bateau:" + nomBat);
    System.out.println("Longueur:" + LongueurBat + "mètres");
    System.out.println("Largeur:" + LargeurBat + "mètres");
        return null;
    } 

}
