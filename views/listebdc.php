<input type="hidden" name="action" value="listebdc">

<?php
require('entity/bdc.class.php');
    // créer un tb vide
    $r=bdcController::afficherListebdc();
    
    $bdcs=array();
    
    foreach ($r as $bdc) {
        // var_dump($bdc);
        //remplit le tb par mon objet
        $bdcs[]= new BDC($bdc['identifiant_bon_de_commande'], $bdc['date_bon_de_commande'], $bdc['format_de_page'], $bdc['prix_du_bon_de_commande'], $bdc['identifiant_categorie_bon_de_commande'], $bdc['identifiant_partenaire']);
    }
    ?>
    <div class="container-sm mt-4">
    <label class="form-check-label mb-4">
                Ajoutez un bon de commande:
            </label>
        <form class="form-inline">
        <div class="form-group row">
            <label for="example-date-input" class="col-2 col-form-label">Date</label>
            <div class="col-10">
                <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
            </div>
        </div>
            <label class="form-check-label mb-2">
                Format de page
            </label>
            <div class="form-group-sm mb-2">
                <input type="text" class="form-control">
            </div>
            <label class="form-check-label mb-2">
                Prix du bon de commande
            </label>
            <div class="form-group-sm mb-2">
                <input class="form-control" type="number" value="0" id="example-number-input">
            </div>
            <div class="mt-4">
            <button type="submit" class="btn btn-primary mb-2">Ajouter</button>
            </div>
        </form>
    </div>
    <div class="container-sm liste">
        <table class="table table-bordered">
            <thead class="thead">
                <tr>
                <th scope="col">Identifiant bon de commande</th>
                <th scope="col">Nom du client</th>
                <th scope="col">Date du bon de commande</th>
                <th scope="col">Format de page demandé</th>
                <th scope="col">Prix</th>
                <th scope="col">Catégorie du bon de commande</th>
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
            <form> 
            <input type="hidden" name="action" value="updatebdc">
            <td><input type="text" style="background: transparent;
            border: none; color:white;" value="'.$bdc->getIDPART().'"></td>
            </form>
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