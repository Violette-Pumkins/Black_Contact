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


    <div class="container-sm" id="listecatbdc">
        
    <a class="btn btn-outline-success add" href="index.php?action=ajoutercatbdc" role="button">Ajouter une catégorie bon de commande</a>

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
                    <form action="index.php?action=confirm&url=deleteEntreprise&back=listeentreprise" method="post">
                        <input type="hidden" name="ID_en" value="'.$catbdc->getIDCATBDC().'">
                        <input type="hidden" name="action" value="deleteEntreprise">
                        <button type="submit" class="btn btn-outline-danger" name="deleteEntreprise">Supprimer</button>
                    </form>
                </td>
                
                    </tr>');
            }

            ?>
                
            </tbody>
        </table>

    </div>