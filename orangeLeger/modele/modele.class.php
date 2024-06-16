<?php

class Modele
{
    private $unPDO;
    
    public function __construct()
    {
        try
        {
            $url = "mysql:host=localhost;dbname=orange_efrei";
            $user = "root";
            $mdp = "Umdptcpm2023!";
            $this->unPDO = new PDO($url, $user, $mdp);
        }
        catch (PDOException $e)
        {
            echo"erreur connexion BDD : ". $e->getMessage();
        }
    }

    //***************** gestion client ************/
    public function insertClient($tab)
    {
        $requete = "insert into client values (null, :nom, :prenom, :adresse, :email);";

        $donnee = array(
            ":nom"=>$tab['nom'],
            ":prenom"=>$tab['prenom'],
            ":adresse"=>$tab['adresse'],
            ":email"=>$tab['email']
        );

        $insert = $this->unPDO->prepare($requete);

        $insert->execute($donnee);
    }
    public function selectAllClient()
    {
        $requete = "select * from client;";

        $select = $this->unPDO->prepare($requete);

        $select->execute();

        return $select->fetchAll();
    }

    public function selectLikeClient($filtre)
    {
        $requete = "select * from client where nom like :filtre or prenom like :filtre or adresse like :filtre or email like :filtre;";

        $donnee = array(":filtre" => "%". "$filtre". "%");

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);

        return $select->fetchAll();
    }
    public function selectWhereClient($idclient)
    {
        $requete = "select * from client where idclient = :idclient;";

        $donnee = array(":idclient"=>$idclient);

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);

        return $select->fetch();
    }
    public function updateClient($tab)
    {
        $requete = "update client set nom = :nom, prenom = :prenom, adresse = :adresse, email = :email where idclient = :idclient;";

        $donnee = array(
            ":nom"=>$tab['nom'],
            ":prenom"=>$tab['prenom'],
            ":adresse"=>$tab['adresse'],
            ":email"=>$tab['email'],
            ":idclient"=>$tab['idclient']
        );

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);
    }
    public function deleteClient($idclient)
    {
        $requete = "delete from client where idclient = :idclient;";

        $donnee = array(":idclient"=>$idclient);

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);
    }


    //***************** gestion technicien ************/
    public function insertTechnicien($tab)
    {
        $requete = "insert into technicien values (null, :nom, :prenom, :specialite, :dateEmbauche);";

        $donnee = array(
            ":nom"=>$tab['nom'],
            ":prenom"=>$tab['prenom'],
            ":specialite"=>$tab['specialite'],
            ":dateEmbauche"=>$tab['dateEmbauche']
        );

        $insert = $this->unPDO->prepare($requete);

        $insert->execute($donnee);
    }
    public function selectAllTechnicien()
    {
        $requete = "select * from technicien;";

        $select = $this->unPDO->prepare($requete);

        $select->execute();

        return $select->fetchAll();
    }

    //***************** gestion intervention ************/
    public function insertIntervention($tab)
    {
        $requete = "insert into intervention values (null, :description, :prixInter, :dateInter, :idproduit, :idtechnicien);";

        $donnee = array(
            ":description"=>$tab['description'],
            ":prixInter"=>$tab['dateInter'],
            ":dateInter"=>$tab['dateInter'],
            ":idproduit"=>$tab['idproduit'],
            ":idtechnicien"=>$tab['idtechnicien']
        );

        $insert = $this->unPDO->prepare($requete);

        $insert->execute($donnee);
    }
    public function selectAllIntervention()
    {
        $requete = "select * from intervention;";

        $select = $this->unPDO->prepare($requete);

        $select->execute();

        return $select->fetchAll();
    }

    //***************** gestion produit ************/
    public function insertProduit($tab)
    {
        $requete = "insert into produit values (null, :designation, :prixAchat, :dateAchat, :categorie, :idclient);";

        $donnee = array(
            ":designation"=>$tab['designation'],
            ":prixAchat"=>$tab['prixAchat'],
            ":dateAchat"=>$tab['dateAchat'],
            ":categorie"=>$tab['categorie'],
            ":idclient"=>$tab['idclient']
        );

        $insert = $this->unPDO->prepare($requete);

        $insert->execute($donnee);
    }
    public function selectAllProduit()
    {
        $requete = "select * from produit;";

        $select = $this->unPDO->prepare($requete);

        $select->execute();

        return $select->fetchAll();
    }
    public function selectProduitClient($idclient)
    {
        $requete = "select * from produit where idclient = :idclient;";

        $donnee = array(":idclient" => $idclient);

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);

        return $select->fetchAll();
    }
    public function count($table)
    {
        $requete = "select count(*) as nb from " .$table;

        $select = $this->unPDO->prepare($requete);

        $select->execute();

        return $select->fetch();
    }
    public function verifConnexion($email, $mdp)
    {
        $requete = "select * from user where email = :email and mdp = :mdp;";

        $donnee = array(':email' => $email, ':mdp' => $mdp);

        $select = $this->unPDO->prepare($requete);

        $select->execute($donnee);

        $unUser = $select->fetch();

        return $unUser;
    }
}