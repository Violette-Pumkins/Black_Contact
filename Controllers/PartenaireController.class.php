<?php
    class PartenaireController{

    //liste catégories
    /**
     * @param $choix
     * @return void
     */
    public static function afficherListepart($choix=PDO::FETCH_ASSOC) : array
    {
        $sql='SELECT * FROM `partenaire` ORDER BY `identifiant_partenaire` ASC';
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

    /**
    * @param $nompart
    * @param $adressepart
    * @return bool
    */
    public static function ajouterpart(string $nompart, String $adressepart):bool
    {
        $sql= 'INSERT INTO `partenaire`( `nom_partenaire`, `adresse_partenaire`) VALUES (:nompart, :adressepart)';

        try {
            // echo"controller:46";
            $co=BDCRM::getConnexion();
            // echo"hello";
            $res=$co->prepare($sql);
            $res->execute(array(':nompart'=>$nompart, ':adressepart'=>$adressepart));
            $res->closeCursor();
            BDCRM::disconnect();
            // var_dump("goodbye");
            return true;
        } catch (PDOException $e) {
            die('<h1>Erreur lecture en BDD-ajouterpart</h1>'. $e->getMessage());
        }
        return false;
    }
        //modifier? avec liste?
        //suppprimer (cntrl suppr que si non utilisé)
    }
?>