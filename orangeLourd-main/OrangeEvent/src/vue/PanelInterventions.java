package vue;

import java.awt.Color;
import java.awt.GridLayout;
import java.util.ArrayList;

import javax.swing.JButton;
import javax.swing.JComboBox;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTextField;

import controleur.Controleur;
import controleur.Produit;
import controleur.Tableau;
import controleur.Technicien;

public class PanelInterventions extends PanelPrincipal
{
    private JPanel panelForm = new JPanel();
    private JTextField txtDesignation = new JTextField();
    private JTextField txtPrixInter = new JTextField();
    private JTextField txtDateInter = new JTextField();
    private JComboBox<String> txtIdProduit = new JComboBox<String>();
    private static JComboBox<String> txtIdTechnicien = new JComboBox<String>();
    private JButton btEnregistrer = new JButton("Enregistrer");
    private JButton btAnnuler = new JButton("Annuler");
    
    private JScrollPane uneScroll;
    private Tableau unTableau;
    private JLabel txtNbProduits = new JLabel();

    public PanelInterventions()
    {
        super("Gestion des interventions");

        this.panelForm.setBackground(Color.gray);
        this.panelForm.setBounds(40, 100, 350, 300);
        this.panelForm.setLayout(new GridLayout(6, 2));
        this.panelForm.add(new JLabel("Désignation produits : "));
        this.panelForm.add(this.txtDesignation);
        this.panelForm.add(new JLabel("Prix d'achat produit : "));
        this.panelForm.add(this.txtPrixInter);
        this.panelForm.add(new JLabel("Date d'achat produit"));
        this.panelForm.add(this.txtDateInter);
        this.panelForm.add(new JLabel("Catégorie : "));
        this.panelForm.add(this.txtIdProduit);
        this.panelForm.add(new JLabel("Intervenant concerné"));
        this.panelForm.add(txtIdTechnicien);

        this.panelForm.add(btEnregistrer);
        this.panelForm.add(btAnnuler);
        this.add(this.panelForm);

        this.remplirCBX();
    }

    public void remplirCBX()
    {
        this.txtIdProduit.removeAllItems();
        
        ArrayList<Produit> lesProduits = Controleur.selectAllProduits();

        for(Produit unProduit : lesProduits)
        {
            this.txtIdProduit.addItem(unProduit.getIdproduit() + "-" + unProduit.getDesignation());
        }
        this.txtIdTechnicien.removeAllItems();

        ArrayList<Technicien> lesTechniciens = Controleur.selectAllTechniciens();

        for(Technicien unTechnicien : lesTechniciens)
        {
            this.txtIdTechnicien.addItem(unTechnicien.getIdtechnicien() + "-" + unTechnicien.getNom() + " " + unTechnicien.getPrenom());
        }
    }
}
