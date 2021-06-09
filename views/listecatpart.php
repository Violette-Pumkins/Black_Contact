<input type="hidden" name="action" value="listecatpart">

<?php
require('entity/Catpart.class.php');
    // créer un tb vide
    $r=CatpartController::afficherListeCatPart();
    
    $catparts=array();
    
    foreach($r as $catpart){
        // var_dump($catpart);
        //remplit le tb par mon objet
        $catparts[]= new Catbdc($catpart['identifiant_categorie_bon_de_commande'], $catpart['libelle_categorie_bon_de_commande'], $catpart['repetition']);
        
    }
    ?>


    <div class="container-sm liste">
        

        <table class="table table-bordered">
            <thead class="thead">
                <tr>
                <th scope="col">Libellé</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(count($catparts)<1){
                echo (' <tr>
                <td colspan="7" class="text-center"><h4>Veuillez rajouter une catégorie</h4></td>

                </tr>');
                
            }
            foreach($catparts as $catpart){
                
                //utilise le tb comme un tb normal
                echo(' <tr>
            <form> 
            <input type="hidden" name="action" value="updatecatbdc">
            <td><input type="text" style="background: transparent;
            border: none; color:white;" value="'.$catpart->getLIBCATPART().'"></td>
            </form>
                <td> 
                    <a class="btn btn-outline-warning update" href="index.php?action=updatecatbdc&IDCATBDC='.$catpart->getLIBCATPART().'" role="button">Modifier</a>
                </td>
                <td>
                    <form action="index.php?action=confirm&url=deleteCatpart&back=listecatpart" method="post">
                        <input type="hidden" name="IDCATPART" value="'.$catpart->getIDCATPART().'">
                        <input type="hidden" name="action" value="deleteCatpart">
                        <button type="submit" class="btn btn-outline-danger" name="deleteCatpart">Supprimer</button>
                    </form>
                </td>
                
                    </tr>');
            }

            ?>
                
            </tbody>
        </table>

    </div>