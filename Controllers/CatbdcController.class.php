<?php
    class CatbdcController {
                //liste catégories
        /**
     * @param $choix
     * @return void
     */
    public static function afficherListeCatBdc($choix=PDO::FETCH_ASSOC) : array
    {
        $sql='SELECT * FROM `categorie_de_bons_de_commande` ORDER BY `libelle_categorie_bon_de_commande` ASC';
        try{
        $res=BDCRM::getConnexion()->query($sql);
            // var_dump($res);
            
            switch($choix){
                case PDO::FETCH_CLASS:
                $res->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'categorie_de_bons_de_commande', ['identifiant_categorie_bon_de_commande ','libelle_categorie_bon_de_commande', 'repetition']);
                break;
            }
            $records=$res->fetchAll();
            // var_dump($records);
            $res->closeCursor();
            BDCRM::disconnect();


        }catch(PDOException $e){
            die('<h1>Erreur lecture en BDD-afficherlisteCatBdc</h1>'. $e->getMessage());
        }
        return $records;
    }
        //ajouter
        //modifier? avec liste?
        //suppprimer (cntrl suppr que si non utilisé)
    }
?>