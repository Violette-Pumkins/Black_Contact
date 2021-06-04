<input type="hidden" name="action" value="listepart">

<?php
require('entity/Partenaire.class.php');
    // créer un tb vide
    $r=PartenaireController::afficherListepart();
    
    $parts=array();
    
    foreach($r as $part){
        // var_dump($part);
        //remplit le tb par mon objet
        $parts[]= new PARTENAIRE($part['identifiant_partenaire'], $part['nom_partenaire'], $part['adresse_partenaire']);
        
    }
    ?>
    <div class="container-sm mt-4">
    <label class="form-check-label mb-4">
                Ajoutez un partenaire:
            </label>
        <form class="form-inline">
            <label class="form-check-label mb-2">
                Nom du partenaire
            </label>
            <div class="form-group-sm mb-2">
                <input type="text" class="form-control">
            </div>
            <label class="form-check-label mb-2">
                Adresse du Partenaire
            </label>
            <div class="form-group-sm mb-2">
                <input type="text" class="form-control">
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
                <th scope="col">Nom partenaire</th>
                <th scope="col">Adresse Partenaire</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(count($parts)<1){
                echo (' <tr>
                <td colspan="7" class="text-center"><h4>Veuillez rajouter un partenaire</h4></td>

                </tr>');
                
            }
            foreach($parts as $part){
                
                //utilise le tb comme un tb normal
                echo(' <tr>
            <form> 
            <input type="hidden" name="action" value="updatepart">
            <td><input type="text" style="background: transparent;
            border: none; color:white;" value="'.$part->getIDPART().'"></td>
            </form>
                <td> 
                    <a class="btn btn-outline-warning update" href="index.php?action=updatepart&IDpart='.$part->getIDPART().'" role="button">Modifier</a>
                </td>
                <td>
                    <form action="index.php?action=confirm&url=deletePart&back=listepart" method="post">
                        <input type="hidden" name="IDPART" value="'.$part->getIDPART().'">
                        <input type="hidden" name="action" value="deletePart">
                        <button type="submit" class="btn btn-outline-danger" name="deletePart">Supprimer</button>
                    </form>
                </td>
                
                    </tr>');
            }

            ?>
                
            </tbody>
        </table>

    </div>