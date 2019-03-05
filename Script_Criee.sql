#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
DROP DATABASE IF EXISTS LaCriee;
CREATE DATABASE LaCriee;
USE LaCriee;

#------------------------------------------------------------
# Table: ESPECE
#------------------------------------------------------------

CREATE TABLE ESPECE(
        idEspece       Int  Auto_increment  NOT NULL ,
        nomScienEspece Varchar (50) NOT NULL ,
        nomComEspece   Varchar (50) NOT NULL
	,CONSTRAINT ESPECE_PK PRIMARY KEY (idEspece)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: TAILLE
#------------------------------------------------------------

CREATE TABLE TAILLE(
        idTaille Int  Auto_increment  NOT NULL ,
        taille   Int NOT NULL
        ,CONSTRAINT TAILLE_PK PRIMARY KEY (idTaille)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: TailleINTERMEDIAIRE
#------------------------------------------------------------

CREATE TABLE TAILLEINTERMEDIAIRE(
        tailleIntermediaire Int NOT NULL
        ,CONSTRAINT TAILLEINTERMEDIAIRE_PK PRIMARY KEY (tailleIntermediaire)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: QUALITE
#------------------------------------------------------------

CREATE TABLE QUALITE(
        idQualite       Int  Auto_increment  NOT NULL ,
        codeQualite     Varchar(1) NOT NULL,
        intituleQualite Varchar (50) NOT NULL
	,CONSTRAINT QUALITE_PK PRIMARY KEY (idQualite)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ACHETEUR
#------------------------------------------------------------

CREATE TABLE ACHETEUR(
        idAcheteur      Int  Auto_increment  NOT NULL ,
        login           Varchar (50) NOT NULL ,
        password        Varchar (50) NOT NULL ,
        RSEntreprise    Varchar (50) NOT NULL ,
        numRueAcheteur  Varchar (50) NOT NULL ,
        rueAcheteur     Varchar (50) NOT NULL ,
        villeAcheteur   Varchar (50) NOT NULL ,
        cpAcheteur      Varchar (50) NOT NULL ,
        numHabilitation Varchar (50) NOT NULL
	,CONSTRAINT ACHETEUR_PK PRIMARY KEY (idAcheteur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PRESENTATION
#------------------------------------------------------------

CREATE TABLE PRESENTATION(
        idPresentation          Int Auto_increment      NOT NULL ,
        codePresentation        Varchar(1)              NOT NULL ,
        intitulePresentation    Varchar (50)            NOT NULL
	,CONSTRAINT PRESENTATION_PK PRIMARY KEY (idPresentation)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: BATEAU
#------------------------------------------------------------

CREATE TABLE BATEAU(
        idBateau    Int  Auto_increment  NOT NULL ,
        immatBateau Varchar (50) NOT NULL
	,CONSTRAINT BATEAU_PK PRIMARY KEY (idBateau)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: PECHE
#------------------------------------------------------------

CREATE TABLE PECHE(
        idBateau    Int  NOT NULL ,
        datePeche   Varchar(50) NOT NULL
	,CONSTRAINT PECHE_PK PRIMARY KEY (idBateau,datePeche)
	,CONSTRAINT PECHE_BATEAU_FK FOREIGN KEY (idBateau) REFERENCES BATEAU(idBateau)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: BAC
#------------------------------------------------------------


CREATE TABLE BAC(
        idBac     Int  Auto_increment  NOT NULL ,
        tare      Float NOT NULL ,
        idEspece  Int NOT NULL ,
        idBateau  Int NOT NULL ,
        datePeche   Varchar(50) NOT NULL,
        idLot     Int NOT NULL
        ,CONSTRAINT BAC_PK PRIMARY KEY (idBac)

        ,CONSTRAINT BAC_ESPECE_FK FOREIGN KEY (idEspece) REFERENCES ESPECE(idEspece)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LOT
#------------------------------------------------------------

CREATE TABLE LOT(
        idLot             Int Auto_increment NOT NULL ,
        idBateau          Int NOT NULL ,        /*Demander à M. TROESTLER comment faire en sorte que idBateau et idLot ne soient pas vides, sans que l'utilisateur ne doive y saisir des valeurs car ce dernier ne 
                                                peut pas connaître la valeur de l'auto-increment qui correspond à l'immatriculation de son bateau ou au numéro du lot qu'il va ajouter dans la base de données*/
        datePeche         Varchar(50) NOT NULL,
        poidsBrutLot      Float NOT NULL ,
        prixPlancher      DECIMAL (15,3)  NOT NULL ,
        prixDepart        DECIMAL (15,3)  NOT NULL ,
        prixEnchereMax    DECIMAL (15,3)  NULL ,
        dateEnchere       Date NULL ,
        heureDebutEnchere Varchar(50) NULL ,
        codeEtat          Varchar (50) NULL ,
        idPresentation    Int NULL ,
        idAcheteur        Int NULL,
        idQualite         Int NULL,
        idTaille          Int NULL ,
        idTailleIntermediaire Int NULL,
        idEspece          Int NULL,
        CONSTRAINT LOT_PK PRIMARY KEY (idLot,idBateau,datePeche)
        ,CONSTRAINT LOT_PECHE_FK FOREIGN KEY (idBateau,datePeche) REFERENCES PECHE(idBateau,datePeche)
        ,CONSTRAINT LOT_PRESENTATION0_FK FOREIGN KEY (idPresentation) REFERENCES PRESENTATION(idPresentation)
        ,CONSTRAINT LOT_ACHETEUR1_FK FOREIGN KEY (idAcheteur) REFERENCES ACHETEUR(idAcheteur)
        ,CONSTRAINT LOT_TAILLE2_FK FOREIGN KEY (idTaille) REFERENCES TAILLE(idTaille)
        ,CONSTRAINT LOT_TAILLEINTERMEDIAIRE_FK FOREIGN KEY (idTailleIntermediaire) REFERENCES TAILLEINTERMEDIAIRE(tailleIntermediaire)
        ,CONSTRAINT LOT_QUALITE3_FK FOREIGN KEY (idQualite) REFERENCES QUALITE(idQualite)
)ENGINE=InnoDB;


/*
#------------------------------------------------------------
# Table: COMMANDE
#------------------------------------------------------------

CREATE TABLE COMMANDE(
        idCommande       Int  Auto_increment  NOT NULL ,
        dateCommande Datetime NOT NULL,
        idAcheteur      Int  NOT NULL ,
        idLot   Int NOT NULL
        ,CONSTRAINT COMMANDE_PK PRIMARY KEY (idCommande)
        ,CONSTRAINT COMMANDE_FK FOREIGN KEY (idAcheteur) REFERENCES ACHETEUR(idAcheteur)

)ENGINE=InnoDB;

*/


#------------------------------------------------------------
# Table: ENCHERE
#------------------------------------------------------------

CREATE TABLE ENCHERE(
        idEnchere    Int  Auto_increment  NOT NULL ,
        prixEnchere  Float NOT NULL ,
        heureEnchere Datetime NOT NULL,
        CONSTRAINT ENCHERE_PK PRIMARY KEY (idEnchere)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: CONCERNER
#------------------------------------------------------------

CREATE TABLE CONCERNER(
        idBateau   Int NOT NULL ,
        datePeche   Varchar(50) NOT NULL,
        idLot      Int NOT NULL ,
        idEnchere  Int NOT NULL ,
        idAcheteur Int NOT NULL ,
        CONSTRAINT CONCERNER_PK PRIMARY KEY (idBateau, datePeche, idLot, idEnchere, idAcheteur)
)ENGINE=InnoDB;


ALTER TABLE LOT
ADD CONSTRAINT LOT_ESPECE_FK
FOREIGN KEY (idEspece) REFERENCES BAC(idEspece);

ALTER TABLE BAC
ADD CONSTRAINT BAC_LOT0_FK 
FOREIGN KEY (idBateau,datePeche,idLot) REFERENCES LOT(idBateau,datePeche,idLot);
