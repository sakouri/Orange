<h2>Gestion des interventions</h2>

<?php

$lesTechniciens = $unControleur->selectAllTechnicien();
$lesProduits = $unControleur->selectAllProduit();

require_once("vue/vue_insert_intervention.php");
require_once("vue/vue_select_intervention.php");


?>