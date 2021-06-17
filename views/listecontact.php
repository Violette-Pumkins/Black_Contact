<input type="hidden" name="action" value="listecontact">

<?php
require('entity/Contact.class.php');
    // créer un tb vide
    $contacts=ContactController::afficherListeContact();
    
    // foreach($contacts as $lignes){
    //     // var_dump($contact); 
    //     //remplit le tb par mon objet
    //     $contact = new Contact(
    //         $lignes['identifiant_contact'], 
    //         $lignes['adresse_mail_contact'], 
    //         $lignes['nom_contact'], 
    //         $lignes['identifiant_partenaire']
    //     );
    //     $part= new Partenaire(
    //         $lignes['identifiant_partenaire'], 
    //         $lignes['nom_partenaire'],
    //         $lignes['adresse_partenaire'],
    //     );
    // }
    // var_dump($contacts);
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
            if(count($r)<1){
                echo (' <tr>
                <td colspan="7" class="text-center"><h4>Veuillez rajouter un contact</h4></td>

                </tr>');
                // var_dump($contacts);
            }
                foreach ($contacts as $lignes) {
                    $contact = new Contact(
                        $lignes['identifiant_contact'], 
                        $lignes['adresse_mail_contact'], 
                        $lignes['nom_contact'], 
                        $lignes['identifiant_partenaire']
                    );
                    $part= new Partenaire(
                        $lignes['identifiant_partenaire'], 
                        $lignes['nom_partenaire'],
                        $lignes['adresse_partenaire'],
                    );
                    echo(' 
                    <tr>
                        <td>'.$contact->getIDCONTACT().'</td> 
                        <td>'.$part->getNOMPART().'</td>
                        <td> 
                            <a class="btn btn-outline-warning update" href="index.php?action=updatecatbdc&IDCATBDC='.$contact->getIDCONTACT().'" role="button">Modifier</a>
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
                // var_dump($contacts);
            ?>
                
            </tbody>
        </table>

    </div>