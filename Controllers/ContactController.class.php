<?php
class ContactController {

    //liste catégories
    /**
     * @param $choix
     * @return void
     */
    public static function afficherListeContact($choix=PDO::FETCH_ASSOC) : array 
    {
        $sql='SELECT c.identifiant_contact, c.adresse_mail_contact, c.nom_contact, c.identifiant_partenaire, p.identifiant_partenaire, p.nom_partenaire, p.adresse_partenaire
        FROM contact c
        JOIN partenaire p
        ON c.identifiant_partenaire = p.identifiant_partenaire
        ORDER BY c.adresse_mail_contact ASC';
        try{
        $res=BDCRM::getConnexion()->query($sql);
            // var_dump($res);
            
            switch($choix){
                case PDO::FETCH_CLASS:
                $res->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, ['identifiant_contact', 'adresse_mail_contact', 'nom_contact', 'identifiant_partenaire', 'identifiant_partenaire', 'nom_partenaire', 'adresse_partenaire']);
                break;
            }
            $records=$res->fetchAll();
            // var_dump($records);
            $res->closeCursor();
            BDCRM::disconnect();


        }catch(PDOException $e){
            die('<h1>Erreur lecture en BDD-afficherlisteContact</h1>'. $e->getMessage());
        }
        return $records;
    }
    //ajouter

    /**
    * @param $mailcontact
    * @param $nomcontact
    * @param $idpartenaire
    * @return bool
    */
    public static function ajoutercontact(string $mailcontact, $nomcontact, $idpartenaire):bool
    {
            $sql= 'INSERT INTO `contact`( `adresse_mail_contact`, `nom_contact`, `identifiant_partenaire`) VALUES (:mailcontact, :nomcontact, :idpartenaire)';

            try {
                // echo"controller:46";
                $co=BDCRM::getConnexion();
                // echo"hello";
                $res=$co->prepare($sql);
                $res->execute(array(':mailcontact'=>$mailcontact, ':nomcontact'=>$nomcontact, ':idpartenaire'=>$idpartenaire));
                $res->closeCursor();
                BDCRM::disconnect();
                // var_dump("goodbye");
                return true;
            } catch (PDOException $e) {
                die('<h1>Erreur lecture en BDD-ajoutercatpart</h1>'. $e->getMessage());
            }
        return false;
    }

    // https://developer.snapappointments.com/bootstrap-select
    /*
        <select class="selectpicker">
            <option value="volvo">Mustard</option>
            <option value="saab">Ketchup</option>
            <option>Barbecue</option>
        </select>

        https://www.w3schools.com/tags/tag_option.asp

        https://www.w3schools.com/tags/att_select_form.asp
        


    */


    //modifier? avec liste?
    //suppprimer (cntrl suppr que si non utilisé)
}
?>