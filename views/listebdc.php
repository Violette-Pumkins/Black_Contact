<input type="hidden" name="action" value="listebdc">
<!-- <td>'.$bdctb->getLIBCATBDC().'</td>
            <td>'.$bdctb->getNOMPART().'</td> -->
<?php
require('entity/bdc.class.php');
    // créer un tb vide
    $liste_ligne=bdcController::afficherListebdc();
    // var_dump($bdcs);
    ?>

    <div class="container-sm liste">
        <table class="table table-bordered">
            <thead class="thead">
                <tr>
                <th scope="col">Identifiant bon de commande</th>
                <th scope="col">Date du bon de commande</th>
                <th scope="col">Format de page demandé</th>
                <th scope="col">Prix</th>
                <th scope="col">Nom partenaire</th>
                <th scope="col">Catégorie de commande</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            if (count($liste_ligne)<1) {
                echo(' <tr>
                <td colspan="7" class="text-center"><h4>Veuillez rajouter un bon de commande</h4></td>

                </tr>');
            }
            foreach ($liste_ligne as $ligne) {
                // var_dump($bdctb);
                $bdc = new BDC(
                    $ligne['identifiant_bon_de_commande'],
                    new DateTime($ligne['date_bon_de_commande']),
                    $ligne['format_de_page'],
                    $ligne['prix_du_bon_de_commande'],
                    $ligne['identifiant_categorie_bon_de_commande'],
                    $ligne['identifiant_partenaire']
                );
                $partenaire = new Partenaire(
                    $ligne['identifiant_partenaire'],
                    $ligne['nom_partenaire'],
                    $ligne['adresse_partenaire']
                );
                $catbdc = new Catbdc(
                    $ligne['identifiant_categorie_bon_de_commande'],
                    $ligne['libelle_categorie_bon_de_commande'],
                    $ligne['repetition'],
                );


                echo(' <tr>
            <form> 
            <input type="hidden" name="action" value="updatebdc">
            <td><input type="text" style="background: transparent;
            border: none; color:white;" value="'.$bdc->getIDBDC().'"></td>
            <td><input type="text" style="background: transparent;
            border: none; color:white;" value="'.$bdc->getDATEBDC()->format('Y-m-d').'"></td>
            <td><input type="text" style="background: transparent;
            border: none; color:white;" class="col-lg-12" value="'.$bdc->getFORPAGE().'"></td>
            <td><input type="text" style="background: transparent;
            border: none; color:white;" value="'.$bdc->getPRIXBDC().'"></td>
            </form>
            <td>'.$partenaire->getNOMPART().'</td>
            <td>'.$catbdc->getLIBCATBDC().'</td>
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