<h2>Gestion des clients</h2>

<?php

if(isset($_SESSION["role"]) && $_SESSION["role"] == "admin")
{
    $leClient = null;
    
    if(isset($_GET['action']) && isset($_GET['idclient']))
    {
        $idclient = $_GET['idclient'];
        $action = $_GET['action'];
        
        switch($action)
        {
            case "sup":
                $unControleur->deleteClient($idclient);
            break;
            case "edit":
                $leClient = $unControleur->selectWhereClient($idclient);
            break;
            case "voir":
                $lesProduits = $unControleur->selectProduitClient($idclient);
            break;
        }
    }

    require_once("vue/vue_insert_client.php");

    if(isset($_POST["Valider"]))
    {
        $unControleur->insertClient($_POST);
    }
    if(isset($_POST["Modifier"]))
    {
        $unControleur->updateClient($_POST);
        header("Location: index.php?page=2");
    }
}

if(isset($_POST['Filtrer']))
{
    $filtre = $_POST['filtre'];
    $lesClients = $unControleur->selectLikeClient($filtre);
}
else
{
    $lesClients = $unControleur->selectAllClient();
}

$nb = $unControleur->count("client")['nb'];
echo "<br> Nombre de clients : ".$nb;

require_once("vue/vue_select_client.php");

if(isset($lesProduits))
{
    require_once("vue/vue_select_produit.php");
}

?>