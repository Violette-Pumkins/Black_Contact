<input type="hidden" name="action" value="listecatbdc">

<?php

    // créer un tb vide
    $r=CatbdcController::afficherListeCatBdc();
    
    foreach($r as $lignes){
        //remplit le tb par mon objet
        $cbdc[]= new Catbdc(
            $lignes['identifiant_categorie_bon_de_commande'], 
            $lignes['libelle_categorie_bon_de_commande'], 
            $lignes['repetition']);
        
    }
    ?>

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