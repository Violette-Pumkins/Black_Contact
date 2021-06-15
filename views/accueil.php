<input type="hidden" name="action" value="listebdc">

<?php
require('entity/bdc.class.php');
    // créer un tb vide
    $r=bdcController::afficherListebdc();
    
    $bdcs=array();
    
    foreach ($r as $bdc) {
        // var_dump($bdc);
        //remplit le tb par mon objet
        $bdcs[]= new BDC(
            $bdc['identifiant_bon_de_commande'],
            new DateTime($bdc['date_bon_de_commande']),
            $bdc['format_de_page'],
            $bdc['prix_du_bon_de_commande'],
            $bdc['libelle_categorie_bon_de_commande'],
            $bdc['nom_partenaire']
            
            );
    }
    ?>
    <div class="container-sm liste">
        <table class="table table-bordered">
            <thead class="thead">
                <tr>
                <th scope="col">Identifiant bon de commande</th>
                <th scope="col">Nom du partenaire</th>
                <th scope="col">Catégorie du bon de commande</th>
                <th scope="col">Catégorie du partenaire</th>
                <!-- si catégorie = répétition: -->
                <!-- <th scope="col">date de facturation</th> -->
                <!-- <th scope="col"></th> -->
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            if (count($bdcs)<1) {
                echo(' <tr>
                <td colspan="7" class="text-center"><h4>Veuillez rajouter un bon de commande</h4></td>

                </tr>');
            }
            foreach ($bdcs as $bdc) {
                
                //utilise le tb comme un tb normal
                echo(' <tr>
            <input type="hidden" name="action" value="updatebdc">
            <td>'.$bdc->getIDBDC().'</td>
            <td>'.$bdc->getDATEBDC().'</td>
            <td>'.$bdc->getFORPAGE().'</td>
            <td>'.$bdc->getPRIXBDC().'</td>
            <td>'.$bdc->getLIBCATBDC().'</td>
            <td>'.$bdc->getNOMPART().'</td>
            <td> 
                <a class="btn btn-outline-warning update" href="index.php?action=updatebdc&IDbdc='.$bdc->getIDBDC().'" role="button">Modifier</a>
            </td>
            <td>
                <form action="index.php?action=confirm&url=deleteBdc&back=listebdc" method="post">
                    <input type="hidden" name="IDBDC" value="'.$bdc->getIDBDC().'">
                    <input type="hidden" name="action" value="deleteBdc">
                    <button type="submit" class="btn btn-outline-danger" name="deleteBdc">Supprimer</button>
                </form>
            </td>
                
                    </tr>');
            }
            ?>
                
            </tbody>
        </table>

    </div>