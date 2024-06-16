<h3> Ajout d'une intervention </h3>
<form action="" method="post">
    <table>
        <tr>
            <td>Description</td>
            <td><textarea name="description" id="" cols="40" rows="4"></textarea></td>
        </tr>
        <tr>
            <td>Prix intervention</td>
            <td><input type="text" name="prixinter"></td>
        </tr>
        <tr>
            <td>Date intervention</td>
            <td><input type="date" name="dateinter"></td>
        </tr>
        <tr>
            <td>Le produit</td>
            <td>
                <select name="idproduit" id="">
                    <?php
                    foreach($lesProduits as $unProduit)
                    {
                        echo "<option value='". $unProduit['idProduit']."'>'";
                        echo"". $unProduit["designation"];
                        echo "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Le technicien</td>
            <td>
                <select name="idtechnicien" id="">
                    <?php
                    foreach($lesTechniciens as $unTechnicien)
                    {
                        echo "<option value='". $unTechnicien['idTechnicien']."'>'";
                        echo"". $unTechnicien["nom"];
                        echo "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
            <td> </td>
            <td>
                <input type="reset" name="Annuler" value="Annuler">
                <input type="submit" name="Valider" value="Valider">
            </td>
        </tr>
    </table>
</form>