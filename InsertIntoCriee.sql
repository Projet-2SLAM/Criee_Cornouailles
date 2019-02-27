USE LaCriee;


INSERT INTO ESPECE(nomScienEspece, nomComEspece) VALUES
        ("Gadus morhua", "Morue de l'atlantique"),
        ("Salmo salar", "Saumon Atlantique");

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

/*INSERT INTO PECHE(idBateau, datePeche) VALUES 
        (1, now()), 
        (2, now()),
        (3, now());*/

INSERT INTO ACHETEUR(login, password, RSEntreprise, numRueAcheteur, rueAcheteur, villeAcheteur, cpAcheteur, numHabilitation) VALUES
('admin','root','/','/','/','/','/','/'),
('fhuber','root','/','/','/','/','/','/');