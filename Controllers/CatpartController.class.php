<?php
    class CatpartController{
        //liste des catégories
    /**
     * @param $choix
     * @return void
     */
    public static function afficherListeCatPart($choix=PDO::FETCH_ASSOC) : array
    {
        $sql='SELECT * FROM `categories_de_partenaire` ORDER BY `libelle_categorie_client` ASC';
        try{
        $res=BDCRM::getConnexion()->query($sql);
            // var_dump($res);
            
            switch($choix){
                case PDO::FETCH_CLASS:
                $res->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'categories_de_partenaire', ['identifiant_categorie_partenaires','libelle_categorie_client']);
                break;
            }
            $records=$res->fetchAll();
            // var_dump($records);
            $res->closeCursor();
            BDCRM::disconnect();


        }catch(PDOException $e){
            die('<h1>Erreur lecture en BDD-afficherlisteCatpart</h1>'. $e->getMessage());
        }
        return $records;
    }
    //ajouter

        /**
    * @param $libcatpart
    * @return bool
    */
    public static function ajoutercatpart(string $libcatpart):bool
    {
        $sql= 'INSERT INTO `categories_de_partenaire`(`libelle_categorie_partenaire`) VALUES (:libcatbdc)';

        try {
            // echo"controller:46";
            $co=BDCRM::getConnexion();
            // echo"hello";
            $res=$co->prepare($sql);
            $res->execute(array(':libcatpart'=>$libcatpart));
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
        //ajouter
        //modifier
        //supprimer
        
    }
?>