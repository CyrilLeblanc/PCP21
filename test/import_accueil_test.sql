USE PCP21;

INSERT INTO Covoitureur(idCovoitureur, Nom, Prenom, Email, Nbr_Alveoles, is_Confirme, idPoint_RDV, Mot_De_Passe) VALUES
(1, 'Boun', 'Théo', 'theo@boun.fr', 10, 1, 3, '$2y$10$noj4rNTfSkh.gvXhnQggWOE2PrEeRddX2sy9MrnNcsLsg/xV3cfjq'),
(2, 'Villanova', 'Quentin', 'quentin@villanova.fr', 3, 1, 2, '$2y$10$noj4rNTfSkh.gvXhnQggWOE2PrEeRddX2sy9MrnNcsLsg/xV3cfjq'),
(3, 'Leblanc', 'Cyril', 'cyril@leblanc.fr', -2, 1, 4, '$2y$10$noj4rNTfSkh.gvXhnQggWOE2PrEeRddX2sy9MrnNcsLsg/xV3cfjq');

INSERT INTO Voiture (idVoiture, Modele, Marque, Annee, Couleur, Nbr_Place, is_Favoris, idCovoitureur) VALUES 
(1, 'Citröen', 'C5', '2020', 'gris', 5, 1, 1),
(2, 'Citröen', 'C5', '2020', 'gris', 5, 1, 2),
(3, 'Citröen', 'C5', '2020', 'gris', 5, 1, 3);

INSERT INTO Covoiturage (idCovoiturage, Jour, Heure, is_Depart_Lycee, idLigne) VALUES 
(1, 'mardi', '08:00:00', 0, 1);

INSERT INTO Inscription (idCovoitureur, idCovoiturage, Date_Depart, is_Unique, is_Depart_Lycee, Jour_Semaine, Heure_Arrivee) VALUES 
(1, 1, '2021-06-08', 1, 0, 'mardi', '08:00:00'),
(2, 1, '2021-06-08', 1, 0, 'mardi', '08:00:00'),
(3, 1, '2021-06-08', 1, 0, 'mardi', '08:00:00')