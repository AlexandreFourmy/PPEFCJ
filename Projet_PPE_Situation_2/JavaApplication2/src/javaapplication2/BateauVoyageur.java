/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javaapplication2;

import java.util.ArrayList;

public class BateauVoyageur extends Bateau {
    private double vitesseBatVoy;
    private String imageBatVoy;
    private ArrayList lesEquipements = new ArrayList();

    public BateauVoyageur(double vitessebatVoy, String imageBatVoy, String unId, String unNom, double uneLongueur, double uneLargeur) {
        super(unId, unNom, uneLongueur, uneLargeur);
        this.vitessebatVoy = vitessebatVoy;
        this.imageBatVoy = imageBatVoy;
    }
    
    public String toString(){
    System.out.println("Nom du bateau:" + nomBat);
    System.out.println("Longueur:" + LongueurBat + "mètres");
    System.out.println("Largeur:" + LargeurBat + "mètres");
    System.out.println("Vitesse" + vitesseBatVoy + "noeuds");
    System.out.println("");
        return null;
    } 
    
    public String getImageBatVoy(){
        return imageBatVoy;          
    }
    
    

    
}
