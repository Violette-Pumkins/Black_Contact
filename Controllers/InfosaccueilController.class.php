<?php
    class InfosaccueilController
    {
        //liste catégories
        /**
         * @param $choix
         * @return void
         */
        public static function afficherListeAccueil($choix=PDO::FETCH_ASSOC) : array
        {
            $sql='SELECT b.identifiant_bon_de_commande, b.date_bon_de_commande, b.format_de_page, b.prix_du_bon_de_commande, b.identifiant_partenaire, b.identifiant_categorie_bon_de_commande, cbdc.libelle_categorie_bon_de_commande, cbdc.identifiant_categorie_bon_de_commande, cbdc.repetition, p.identifiant_partenaire, p.nom_partenaire, p.adresse_partenaire, a.identifiant_partenaire, a.identifiant_categorie_bon_de_commande
            FROM bon_de_commande b
            JOIN partenaire p
            ON b.identifiant_partenaire = p.identifiant_partenaire
            JOIN categorie_de_bons_de_commande cbdc                
            ON cbdc.identifiant_categorie_bon_de_commande = b.identifiant_categorie_bon_de_commande
            JOIN appartenir a
            ON p.identifiant_partenaire = a.identifiant_partenaire
            ORDER BY `identifiant_bon_de_commande` ASC';
            try {
                $res=BDCRM::getConnexion()->query($sql);
            
                switch ($choix) {
                case PDO::FETCH_CLASS:
                $res->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'bon_de_commande', ['identifiant_bon_de_commande', 'date_bon_de_commande', 'format_de_page', 'prix_du_bon_de_commande', 'identifiant_partenaire', 'identifiant_categorie_bon_de_commande', 'libelle_categorie_bon_de_commande', 'identifiant_categorie_bon_de_commande', 'repetition', 'identifiant_partenaire', 'nom_partenaire', 'adresse_partenaire',  'identifiant_partenaire', 'identifiant_categorie_bon_de_commande']);
                break;
            }
                $records=$res->fetchAll();
                // var_dump($records);
                $res->closeCursor();
                BDCRM::disconnect();
            } catch (PDOException $e) {
                die('<h1>Erreur lecture en BDD-afficherlisteBdc</h1>'. $e->getMessage());
            }
            return $records;
        }
    }
?>