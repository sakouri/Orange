<h3>Liste des interventions</h3>

<form action="" method="post">
    Filtrer par : <input type="text" name="filtre">
    <input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1">
    <tr>
        <td>Description</td>
        <td>Prix intervention</td>
        <td>Date intervention</td>
        <td>iD produit</td>
        <td>iD technicien</td>
    </tr>
    <?php
    if(isset($lesClients))
    {
        foreach($lesClients as $unClient)
        {
            echo "<tr>";
            echo "<td>". $unClient['idClient']. "</td>";
            echo "<td>". $unClient['nom']. "</td>";
            echo "<td>". $unClient['prenom']. "</td>";
            echo "<td>". $unClient['adresse']. "</td>";
            echo "<td>". $unClient['email']. "</td>";
        }
    }
    ?>
</table>