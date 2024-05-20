package controleur;

import java.util.ArrayList;

import modele.Modele;

public class Controleur 
{
    public static User verifConnexion(String email, String mdp)
    {
        return Modele.verifConnexion(email, mdp);
    }

    public static void updateUser(User unUser) 
    {
		Modele.updateUser(unUser);
	}
	
	//Gestion Client
	public static void insertClient(Client unClient) 
    {
		Modele.insertClient(unClient);
	}

	public static ArrayList<Client> selectAllClients(String filtre)
    {
		return Modele.selectAllClients(filtre);
	}

	public static void deleteClient(int idclient)
	{
		Modele.deleteClient(idclient);
	}

	public static void updateClient(Client unClient)
	{
		Modele.updateClient(unClient);
	}

	//Gestion Produit
	public static void insertProduit(Produit unProduit) 
    {
		Modele.insertProduit(unProduit);
	}

	public static ArrayList<Produit> selectAllProduits()
    {
		return Modele.selectAllProduits();
    }

	//gestion technicien
	public static ArrayList<Technicien> selectAllTechniciens()
    {
		return Modele.selectAllTechniciens();
	}

}
