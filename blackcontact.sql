#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: partenaire
#------------------------------------------------------------

CREATE TABLE partenaire(
        identifiant_partenaire Int NOT NULL AUTO_INCREMENT,
        nom_partenaire         Varchar (50) NOT NULL ,
        adresse_partenaire     Varchar (50) NOT NULL
	,CONSTRAINT partenaire_PK PRIMARY KEY (identifiant_partenaire)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: catégorie de bons de commande
#------------------------------------------------------------

CREATE TABLE categorie_de_bons_de_commande(
        identifiant_categorie_bon_de_commande Int NOT NULL AUTO_INCREMENT,
        libelle_categorie_bon_de_commande     Varchar (20) NOT NULL ,
        repetition                            Int NOT NULL
	,CONSTRAINT categorie_de_bons_de_commande_PK PRIMARY KEY (identifiant_categorie_bon_de_commande)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: bon de commande
#------------------------------------------------------------

CREATE TABLE bon_de_commande(
        identifiant_bon_de_commande           Int NOT NULL AUTO_INCREMENT,
        date_bon_de_commande                  Date ,
        format_de_page                        Varchar (50) NOT NULL ,
        prix_du_bon_de_commande               Int ,
        identifiant_categorie_bon_de_commande Int NOT NULL ,
        identifiant_partenaire                Int NOT NULL
	,CONSTRAINT bon_de_commande_PK PRIMARY KEY (identifiant_bon_de_commande)

	,CONSTRAINT bon_de_commande_categorie_de_bons_de_commande_FK FOREIGN KEY (identifiant_categorie_bon_de_commande) REFERENCES categorie_de_bons_de_commande(identifiant_categorie_bon_de_commande)
	,CONSTRAINT bon_de_commande_partenaire0_FK FOREIGN KEY (identifiant_partenaire) REFERENCES partenaire(identifiant_partenaire)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: catégories de partenaire
#------------------------------------------------------------

CREATE TABLE categories_de_partenaire(
        identifiant_categorie_partenaires Int NOT NULL AUTO_INCREMENT,
        libelle_categorie_client          Varchar (20) NOT NULL
	,CONSTRAINT categories_de_partenaire_PK PRIMARY KEY (identifiant_categorie_partenaires)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Contact
#------------------------------------------------------------

CREATE TABLE Contact(
        identifiant_contact    Int NOT NULL AUTO_INCREMENT,
        adresse_mail_contact   Varchar (50) NOT NULL ,
        nom_contact            Varchar (50) NOT NULL ,
        identifiant_partenaire Int NOT NULL
	,CONSTRAINT Contact_PK PRIMARY KEY (identifiant_contact)

	,CONSTRAINT Contact_partenaire_FK FOREIGN KEY (identifiant_partenaire) REFERENCES partenaire(identifiant_partenaire)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Facturation
#------------------------------------------------------------

CREATE TABLE Facturation(
        identifiant_facturation               Int NOT NULL AUTO_INCREMENT,
        date_de_facturation                   Date NOT NULL ,
        identifiant_categorie_bon_de_commande Int NOT NULL
	,CONSTRAINT Facturation_PK PRIMARY KEY (identifiant_facturation)

	,CONSTRAINT Facturation_categorie_de_bons_de_commande_FK FOREIGN KEY (identifiant_categorie_bon_de_commande) REFERENCES categorie_de_bons_de_commande(identifiant_categorie_bon_de_commande)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Appartenir
#------------------------------------------------------------

CREATE TABLE Appartenir(
        identifiant_categorie_partenaires Int NOT NULL ,
        identifiant_partenaire            Int NOT NULL
	,CONSTRAINT Appartenir_PK PRIMARY KEY (identifiant_categorie_partenaires,identifiant_partenaire)

	,CONSTRAINT Appartenir_categories_de_partenaire_FK FOREIGN KEY (identifiant_categorie_partenaires) REFERENCES categories_de_partenaire(identifiant_categorie_partenaires)
	,CONSTRAINT Appartenir_partenaire0_FK FOREIGN KEY (identifiant_partenaire) REFERENCES partenaire(identifiant_partenaire)
)ENGINE=InnoDB;

