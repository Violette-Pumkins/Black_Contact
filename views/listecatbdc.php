<input type="hidden" name="action" value="listecatbdc">

<?php
require('entity/Catbdc.class.php');
    // créer un tb vide
    $r=CatbdcController::afficherListeCatBdc();
    
    $catbdcs=array();
    
    foreach($r as $catbdc){
        // var_dump($catbdc);
        //remplit le tb par mon objet
        $catbdcs[]= new Catbdc($catbdc['identifiant_categorie_bon_de_commande'], $catbdc['libelle_categorie_bon_de_commande'], $catbdc['repetition']);
        
    }
    ?>
    <div class="container-sm mt-4">
    <label class="form-check-label mb-2">
                Ajoutez une catégorie:
            </label>
        <form class="form-inline">
            <div class="form-group-sm mb-2">
                <input type="text" class="form-control">
            </div>

            <div class="mt-4">
            <label class="form-check-label">
                catégorie répétitive? (exemple: abonnement)
            </label>
            <div>
            </div>
            <input class="form-check-input" type="radio" name="repetition">
            <label class="form-check-label">
                Oui
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="repetition">
            <label class="form-check-label">
                Non
            </label>
            <div class="mt-4">
            <button type="submit" class="btn btn-primary mb-2">Ajouter</button>
            </div>
        </form>
    </div>

    <div class="container-sm liste">

        <table class="table table-bordered">
            <thead class="thead">
                <tr>
                <th scope="col">Libellé</th>
                <th scope="col">Répétitif?</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(count($catbdcs)<1){
                echo (' <tr>
                <td colspan="7" class="text-center"><h4>Veuillez rajouter une catégorie</h4></td>

                </tr>');
                
            }
            foreach($catbdcs as $catbdc){
                
                //utilise le tb comme un tb normal
                echo(' <tr>
            <form> 
            <input type="hidden" name="action" value="updatecatbdc">
            <td><input type="text" style="background: transparent;
            border: none; color:white;" value="'.$catbdc->getLIBCATBDC().'"></td>
            </form>
                <td>'.$catbdc->getREPET().'</td>
                <td> 
                    <a class="btn btn-outline-warning update" href="index.php?action=updatecatbdc&IDCATBDC='.$catbdc->getIDCATBDC().'" role="button">Modifier</a>
                </td>
                <td>
                    <form action="index.php?action=confirm&url=deleteCatbdc&back=listecatbdc" method="post">
                        <input type="hidden" name="IDCATBDC" value="'.$catbdc->getIDCATBDC().'">
                        <input type="hidden" name="action" value="deleteCatbdc">
                        <button type="submit" class="btn btn-outline-danger" name="deleteCatdbc">Supprimer</button>
                    </form>
                </td>
                
                    </tr>');
            }

            ?>
                
            </tbody>
        </table>

    </div>