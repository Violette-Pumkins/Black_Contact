<input type="hidden" name="action" value="listebdc">

<?php
require('entity/bdc.class.php');
    // créer un tb vide
    $r=bdcController::afficherListebdc();
    
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
            if (count($r)<1) {
                echo(' <tr>
                <td colspan="7" class="text-center"><h4>Les bons de commandes se sont échappé...</h4></td>

                </tr>');
            }
            foreach ($r as $lignes) {
                $bdc= new BDC(
                    $ligne['identifiant_bon_de_commande'],
                    new DateTime($ligne['date_bon_de_commande']),
                    $ligne['format_de_page'],
                    $ligne['prix_du_bon_de_commande'],
                    $ligne['libelle_categorie_bon_de_commande'],
                    $ligne['nom_partenaire']
                );
        
                $part= new Partenaire(
                    $ligne['identifiant_partenaire'],
                    $ligne['nom_partenaire'],
                    $ligne['adresse_partenaire']
                );
                $cbdc= new Catbdc(
                    $ligne['identifiant_categorie_bon_de_commande'],
                    $ligne['libelle_categorie_bon_de_commande'],
                    $ligne['repetition'],
                );
                $cpart= new Catpart(
                    $ligne['identifiant_categorie_partenaires'],
                    $ligne['libelle_categorie_client']
                );
                //utilise le tb comme un tb normal
                echo(' <tr>
            <input type="hidden" name="action" value="updatebdc">
            <td>'.$bdc->getDATEBDC().'</td>
            <td>'.$bdc->getIDBDC().'</td>
            <td>'.$part->getNOMPART().'</td>
            <td>'.$cpart->getLIBCATPART().'</td>
            <td>'.$cbdc->getLIBCATBDC().'</td>
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