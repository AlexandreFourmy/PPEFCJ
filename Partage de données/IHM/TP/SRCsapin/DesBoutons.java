


import java.awt.*;
import javax.swing.*;
import java.awt.event.*;
public class DesBoutons extends JPanel {
	public DesBoutons(Dessin d, JFrame j)  {
		setBackground(Color.lightGray); 
		// Les boutons
		JButton bPeindre = new JButton ("Nouveau");
		bPeindre.addActionListener(new GestionAction(1, d, j));
		this.add(bPeindre);
    JButton bModele = new JButton ("Modele");
    bModele.addActionListener(new GestionAction(3, d, j));
    this.add(bModele);

    JButton bQuitter = new JButton ("Quitter");
    bQuitter.addActionListener(new GestionAction(2, d, j));
    this.add(bQuitter);
 	}
}