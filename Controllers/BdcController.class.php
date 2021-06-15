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
        $sql='SELECT b.identifiant_bon_de_commande, b.date_bon_de_commande, b.format_de_page, b.prix_du_bon_de_commande, b.identifiant_partenaire, b.identifiant_categorie_bon_de_commande, cbdc.libelle_categorie_bon_de_commande, cbdc.identifiant_categorie_bon_de_commande, cbdc.repetition, p.identifiant_partenaire, p.nom_partenaire, p.adresse_partenaire
        FROM bon_de_commande b
        JOIN partenaire p
        ON b.identifiant_partenaire = p.identifiant_partenaire
        JOIN categorie_de_bons_de_commande cbdc
        ON cbdc.identifiant_categorie_bon_de_commande = b.identifiant_categorie_bon_de_commande
        ORDER BY `identifiant_bon_de_commande` ASC';
        try{
        $res=BDCRM::getConnexion()->query($sql);
            
            switch($choix){
                case PDO::FETCH_CLASS:
                $res->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'bon_de_commande', ['identifiant_bon_de_commande', 'date_bon_de_commande', 'format_de_page', 'prix_du_bon_de_commande', 'identifiant_partenaire', 'identifiant_categorie_bon_de_commande', 'libelle_categorie_bon_de_commande', 'identifiant_categorie_bon_de_commande', 'repetition', 'identifiant_partenaire', 'nom_partenaire', 'adresse_partenaire']);
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
    /**
    * @param $date
    * @param $formatdepage
    * @param $prix
    * @param $catbdc
    * @param $part
    * @return bool
    */
    public static function ajouterbdc(String $date, String $formatdepage, Int $prix, Int $catbdc, Int $part):bool
    {
            $sql= 'INSERT INTO `bon_de_commande`( `date_bon_de_commande`, `format_de_page`, `prix_du_bon_de_commande`, `identifiant_categorie_bon_de_commande`, `identifiant_partenaire`) VALUES (:datebdc, :formatdepage, :prix, :catbdc, :part)';

            try {
                // echo"controller:46";
                $co=BDCRM::getConnexion();
                // echo"hello";
                $res=$co->prepare($sql);
                $res->execute(array(':datebdc'=>$date, ':formatdepage'=>$formatdepage, ':prix'=>$prix, ':catbdc'=>$catbdc, ':part'=>$part));
                $res->closeCursor();
                BDCRM::disconnect();
                // var_dump("goodbye");
                return true;
            } catch (PDOException $e) {
                die('<h1>Erreur lecture en BDD-ajoutercatpart</h1>'. $e->getMessage());
            }
        return false;
    }
        //modifier? avec liste?
        //suppprimer (cntrl suppr que si non utilisé)
    }
?>