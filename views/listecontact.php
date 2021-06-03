<input type="hidden" name="action" value="listecontact">

<?php
require('entity/Contact.class.php');
    // créer un tb vide
    $r=ContactController::afficherListeContact();
    
    $contacts=array();
    
    foreach($r as $contact){
        // var_dump($contact);
        //remplit le tb par mon objet
        $contacts[]= new Catbdc($contact['identifiant_categorie_bon_de_commande'], $contact['libelle_categorie_bon_de_commande'], $contact['repetition']);
        
    }
    ?>

<div class="container-sm mt-4">
    <label class="form-check-label mb-4">
                Ajoutez un contact:
            </label>
        <form class="form-inline">
        <label class="form-check-label mb-2">
                Adresse-Mail du contact
            </label>
            <div class="form-group-sm mb-2">
                <input type="mail" class="form-control">
            </div>
            <label class="form-check-label mb-2">
                Nom du contact
            </label>
            <div class="form-group-sm mb-2">
                <input type="text" class="form-control">
            </div>
            <label class="form-check-label mb-2">
                Nom du Partenaire
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
                <th scope="col">Libellé</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(count($contacts)<1){
                echo (' <tr>
                <td colspan="7" class="text-center"><h4>Veuillez rajouter une catégorie</h4></td>

                </tr>');
                
            }
            foreach($contacts as $contact){
                
                //utilise le tb comme un tb normal
                echo(' <tr>
            <form> 
            <input type="hidden" name="action" value="updatecatbdc">
            <td><input type="text" style="background: transparent;
            border: none; color:white;" value="'.$contact->getNOMCON().'"></td>
            </form>
                <td> 
                    <a class="btn btn-outline-warning update" href="index.php?action=updatecatbdc&IDCATBDC='.$contact->getNOMCON().'" role="button">Modifier</a>
                </td>
                <td>
                    <form action="index.php?action=confirm&url=deleteContact&back=listecontact" method="post">
                        <input type="hidden" name="IDCONTACT" value="'.$contact->getIDCONTACT().'">
                        <input type="hidden" name="action" value="deleteContact">
                        <button type="submit" class="btn btn-outline-danger" name="deleteContact">Supprimer</button>
                    </form>
                </td>
                
                    </tr>');
            }

            ?>
                
            </tbody>
        </table>

    </div>