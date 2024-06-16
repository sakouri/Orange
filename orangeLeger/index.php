<?php
session_start(); 
 
require_once("controleur/controleur.class.php");
 
$unControleur = new Controleur();
?>
 
 <!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Orange</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<center>
 
        <?php
        if(!isset($_SESSION["email"]))
        {
            require_once "vue/vue_connexion.php";
        }
 
        if(isset($_POST["seConnecter"]))
        {
            $email = $_POST["email"];
            $mdp = $_POST["mdp"];
            $unUser = $unControleur->verifConnexion($email, $mdp);
            if($unUser != null)
            {
                $_SESSION["nom"] = $unUser["nom"];
                $_SESSION["prenom"] = $unUser["prenom"];
                $_SESSION["email"] = $unUser["email"];
                $_SESSION["role"] = $unUser["role"];
 
                header("Location:index.php?page=1");
                exit();
            }
        }
        if(isset($_SESSION["email"]))
        {
            echo ' 
            <nav class="navbar bg-black border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?page=1">Site Intervention Orange</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 bs-light-text-emphasis">
         
                <li><a class="dropdown-item text-white" href="index.php?page=2">Gestion des Clients</a></li>
                <li><a class="dropdown-item text-white" href="index.php?page=3">Gestion des Produits</a></li>
                <li><a class="dropdown-item text-white" href="index.php?page=4">Gestion des Techniciens</a></li>
                <li><a class="dropdown-item text-white" href="index.php?page=5">Gestion des Interventions</a></li>
                <li><a class="dropdown-item text-white" href="index.php?page=6">Deconnexion</a></li>
   

          </ul>
        </div>
        </nav>';
            if(isset($_GET["page"]))
            {
                $page = $_GET["page"];
            }
            else
            {
                $page = 1;
            }
            switch($page)
            {
                case 1:
                    require_once "home.php";
                break;
                case 2:
                    require_once "gestion_client.php";
                break;
                case 3:
                    require_once "gestion_produit.php";
                break;
                case 4:
                    require_once "gestion_technicien.php";
                break;
                case 5:
                    require_once "gestion_intervention.php";
                break;
                case 6 : session_destroy();
                    unset($_SESSION['email']);
                    header("Location: index.php");
                    exit(); 
                break;
            }
        }
        if(isset($_SESSION["email"]))
        {
            echo '
            <a href="index.php?page=2">
                <img src="image/client.jpeg" alt="" height="100" width="100">
            </a>
            <a href="index.php?page=3">
                <img src="image/produit.png" alt="" height="100" width="100">
            </a>
            <a href="index.php?page=4">
                <img src="image/technicien.png" alt="" height="100" width="100">
            </a>
            <a href="index.php?page=5">
                <img src="image/intervention.png" alt="" height="100" width="100">
            </a>
        ';
            
            if(isset($_GET["page"]))
            {
                $page = $_GET["page"];
            }
            else
            {
                $page = 1;
            }
            switch($page)
            {
                case 2:
                    require_once("gestion_client.php");
                break;
                case 3:
                    require_once("gestion_produit.php");
                break;
                case 4:
                    require_once("gestion_technicien.php");
                break;
                case 5:
                    require_once("gestion_intervention.php");
                break;
            }
        }
        ?>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>