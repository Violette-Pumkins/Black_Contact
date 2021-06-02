<?php
class BdcController
    {
    //liste catégories
    /**
     * @param $choix
     * @return void
     */
    public static function afficherListeBdc($choix=PDO::FETCH_ASSOC) : array
    {
        $sql='SELECT * FROM `bon_de_commande` ORDER BY `identifiant_partenaire` ASC';
        try{
        $res=BDCRM::getConnexion()->query($sql);
            // var_dump($res);
            
            switch($choix){
                case PDO::FETCH_CLASS:
                $res->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'bon_de_commande', ['identifiant_bon_de_commande ','date_bon_de_commande', 'format_de_page', 'prix_du_bon_de_commande', 'identifiant_categorie_bon_de_commande', 'identifiant_partenaire']);
                break;
            }
            $records=$res->fetchAll();
            // var_dump($records);
            $res->closeCursor();
            BDCRM::disconnect();


        }catch(PDOException $e){
            die('<h1>Erreur lecture en BDD-afficherlisteBdc</h1>'. $e->getMessage());
        }
        return $records;
    }
        //ajouter
        //modifier? avec liste?
        //suppprimer (cntrl suppr que si non utilisé)
    }
?>