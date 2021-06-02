<?php
    class PartenaireController{

    //liste catégories
    /**
     * @param $choix
     * @return void
     */
    public static function afficherListepart($choix=PDO::FETCH_ASSOC) : array
    {
        $sql='SELECT * FROM `bon_de_commande` ORDER BY `identifiant_partenaire` ASC';
        try{
        $res=BDCRM::getConnexion()->query($sql);
            // var_dump($res);
            
            switch($choix){
                case PDO::FETCH_CLASS:
                $res->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'partenaire', ['identifiant_partenaire ','nom_partenaire', 'adresse_partenaire']);
                break;
            }
            $records=$res->fetchAll();
            // var_dump($records);
            $res->closeCursor();
            BDCRM::disconnect();


        }catch(PDOException $e){
            die('<h1>Erreur lecture en BDD-afficherlistepart</h1>'. $e->getMessage());
        }
        return $records;
    }
        //ajouter
        //modifier? avec liste?
        //suppprimer (cntrl suppr que si non utilisé)
    }
?>