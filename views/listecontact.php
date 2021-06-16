<input type="hidden" name="action" value="listecontact">

<?php
require('entity/Contact.class.php');
    // créer un tb vide
    $r=ContactController::afficherListeContact();
    
    $contacts=array();
    
    foreach($r as $contact){
        // var_dump($contact); 
        //remplit le tb par mon objet
        $contacts[]= new Contact(
            $contact['identifiant_contact'], 
            $contact['adresse_mail_contact'], 
            $contact['nom_contact'], 
            $contact['identifiant_partenaire']
        );
        
    }
    ?>

    <div class="container-sm liste">
        

        <table class="table table-bordered">
            <thead class="thead">
                <tr>
                <th scope="col">Nom du contact</th>
                <th scope="col">Nom du partenaire associé</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(count($contacts)<1){
                echo (' <tr>
                <td colspan="7" class="text-center"><h4>Veuillez rajouter un contact</h4></td>

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
            <td>'.$contact->getIDPART().'</td>
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