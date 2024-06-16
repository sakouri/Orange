<h3>Liste des techniciens</h3>

<form action="" method="post">
    Filtrer par : <input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1">
    <tr>
        <td>Matricule</td>
        <td>Nom technicien</td>
        <td>Prénom technicien</td>
        <td>Spécialité</td>
        <td>Date embauche</td>
    </tr>
    <?php
    if(isset($lesTechniciens))
    {
        foreach($lesTechniciens as $unTechnicien)
        {
            echo "<tr>";
            echo "<td>". $unTechnicien['idtechnicien']. "</td>";
            echo "<td>". $unTechnicien['nom']. "</td>";
            echo "<td>". $unTechnicien['prenom']. "</td>";
            echo "<td>". $unTechnicien['specialite']. "</td>";
            echo "<td>". $unTechnicien['dateEmbauche']. "</td>";
        }
    }
    ?>
</table>