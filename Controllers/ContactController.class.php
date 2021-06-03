<?php
    class ContactController{

        //liste catégories
    /**
     * @param $choix
     * @return void
     */
    public static function afficherListeContact($choix=PDO::FETCH_ASSOC) : array
    {
        $sql='SELECT * FROM `contact` ORDER BY `adresse_mail_contact` ASC';
        try{
        $res=BDCRM::getConnexion()->query($sql);
            // var_dump($res);
            
            switch($choix){
                case PDO::FETCH_CLASS:
                $res->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'contact', ['identifiant_contact','adresse_mail_contact', 'nom_contact', 'identifiant_partenaire']);
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
        //modifier? avec liste?
        //suppprimer (cntrl suppr que si non utilisé)
    }
?>