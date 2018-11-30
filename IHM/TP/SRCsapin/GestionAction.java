


import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
import javax.swing.event.*;
public class GestionAction implements ActionListener {
 private int n;
 private Dessin d;
 private static int modele=0;
 private JFrame j;
 public GestionAction( int n, Dessin d, JFrame j) {
	this.n = n;
	this.d = d;
 	this.j = j;
 }
 
 public void actionPerformed(ActionEvent e) {
  switch (n)  {
    case 1 : d.nouveau();
    break;
    case 2 : System.exit(0);
    break;
    case 3 : gestionModele();	   
    break;
   }
 }
 private void gestionModele() {
  String LAndF = "com.sun.java.swing.plaf.motif.MotifLookAndFeel";
  try {
   switch(modele) {
    case 0 :  
     LAndF = "com.sun.java.swing.plaf.motif.MotifLookAndFeel";
     System.out.println(" Modele Motif ");
    break;
    case 1 : 
     LAndF = "javax.swing.plaf.metal.MetalLookAndFeel";	    
     System.out.println(" Modele Metal ");
    break;
    case 2 : 
     LAndF = "javax.swing.plaf.mac.MacLookAndFeel";
     System.out.println(" Modele Mac ");
    break;
    case 3 : 
	LAndF = "com.sun.java.swing.plaf.windows.WindowsLookAndFeel";			 	   
	System.out.println(" Modele Windows ");
    break;
   }
   UIManager.setLookAndFeel(LAndF);
   SwingUtilities.updateComponentTreeUI(j);
  }
  catch(UnsupportedLookAndFeelException ex) {
   System.out.println("Exception : Modele non disponible");
  }
  catch(IllegalAccessException ex) {
   System.out.println("Exception : Modele non accessible");
  }
  catch(ClassNotFoundException ex) {
   System.out.println("Exception : Modele non trouve");
  }
  catch(InstantiationException ex) {
   System.out.println("Exception : Modele non instanciable ");
  }
  catch(Exception ex) {
   System.out.println("Exception : Erreur d'execution ");
  }
  modele++;
  modele = modele % 4;
 } 
}