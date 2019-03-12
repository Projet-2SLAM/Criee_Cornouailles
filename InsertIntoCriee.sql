USE LaCriee;


INSERT INTO ESPECE(nomScienEspece, nomComEspece, urlImage) VALUES
        ("Sepia officinalis", "Seiche", "../../../images/Seiche commune.jpg"),
        ("Pollachius pollachius", "Lieu jaune", "../../../images/Lieu jaune.jpg"),
        ("Gadus morhua", "Morue", "../../../images/Morue.jpg"),
        ("Merlangius merlangus", "Merlan", "../../../images/Merlan.jpg"),
        ("Nephrops norvegicus", "Langoustine", "../../../images/Langoustine.jpg"),
        ("Thunnus thynnus", "Thon rouge", "../../../images/Thon rouge.jpg"),
        ("Merluccius merluccius", "Merlu", "../../../images/Merlu.jpg"),
        ("Melanogrammus aeglefinus", "Aiglefin", "../../../images/Eglefin.jpg"),
        ("Lophius piscatorius", "Baudroie", "../../../images/Baudroie.jpg");



INSERT INTO TAILLE(taille) VALUES
        (1),
        (2),
        (3),
        (4),
        (5),
        (6),
        (7),
        (8),
        (9);


INSERT INTO TAILLEINTERMEDIAIRE(tailleIntermediaire) VALUES
	(0),
	(1),
	(2),
	(3),
	(4),
	(5),
	(6),
	(7),
	(8),
	(9);
        

INSERT INTO QUALITE(codeQualite,intituleQualite) VALUES
        ("E", "Extra"),
        ("A", "Glacé"),
        ("B", "Déclassé");
        

INSERT INTO PRESENTATION(codePresentation, intitulePresentation) VALUES
        ("ENT","Entier"),
        ("VID","Vidé");


INSERT INTO BATEAU(immatBateau) VALUES
        ("DK123456"),
        ("BX654321"),
        ("LR648397");
        

INSERT INTO ACHETEUR(login, password, RSEntreprise, numRueAcheteur, rueAcheteur, villeAcheteur, cpAcheteur, numHabilitation) VALUES
        ('admin','root','/','/','/','/','/','/'),
        ('fhuber','root','/','/','/','/','/','/');