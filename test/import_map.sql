USE PCP21;

DELETE FROM Inscription;
DELETE FROM Voiture;
DELETE FROM Etape;
DELETE FROM Participation;
DELETE FROM Token;
DELETE FROM Covoitureur;
DELETE FROM Etape;
DELETE FROM Composition;
DELETE FROM Point_RDV;
DELETE FROM Covoiturage;
DELETE FROM Ligne; 


INSERT INTO Point_RDV (idPoint_RDV, Nom, Latitude, Longitude, Adresse, Ville, is_Confirme) VALUES
(1, "Lycée Charles Poncet", 46.06178, 6.57994, "1 Avenue Charles Poncet", "74300 Cluses", 1),
(2, "Parking Relais - Villy-le-Pelloux", 45.99306, 6.12862, "28-114 Impasse des Glaises", "74370 Villy-le-Pelloux", 1),
(3, "Mairie de La-Roche-sur-Foron", 46.06695, 6.31201, "1 place de l'hotel de ville", "74800 La-Roche-sur-Foron", 1),
(4, "Gare de Bonneville", 46.07799, 6.41669, "299 Avenue de la Gare", "74130 Bonneville", 1),
(5, "Place du Bourgeal - Mont-Saxonnex", 46.05249, 6.48505, "Place du Bourgeal", "74130 Mont-Saxonnex", 1),
(6, "Gare de Saint-Gervais", 45.90609, 6.70033, "Impasses des deux gares", "74170 Saint-Gervais-les-Bains", 1),
(7, "P+R de Passy", 45.91341, 6.68971, "Autoroute Blanche, Sortie 21 en direction d'Annecy", "74190 Passy", 1),
(8, "Gare de Sallanches", 45.93529, 6.63405, "Avenue de la gare", "74700 Sallanches", 1),
(9, "Aire de stationnement de Morillon", 46.0862, 6.67921, "Lac Bleu", "74440 Morillon", 1),
(10, "Mairie de Mieussy", 46.13373, 6.52368, "1 place de la Mairie", "74440 Mieussy", 1),
(11, "Salle des fêtes de Tanninges", 46.10545, 6.59072, "223 Avenue des Thézières", "74440 Taninges", 1),
(12, "Mairie de Châtillon-sur-Cluses", 46.08778, 6.5828, "Place de la Mairie", "74300 Châtillon-sur-Cluses", 1),
(13, "Mairie de Nangy", 46.15457, 6.3057, "6-26 D298A", "74380 Nangy", 1),
(14, "Pont du Risse - Saint-Jeoire", 46.13621, 6.47774, "D907", "74490 Saint-Jeoire", 1),
(15, "Cours de l'Ets Mojon Fer et Métaux - Thyez", 46.08787, 6.51535, "3225 Avenu Vallées", "74300 Thyez", 1);

INSERT INTO Ligne (idLigne, Nom, Nbr_Points) VALUES 
(1, "Annecy", 4),
(2, "Le Fayet", 4),
(3, "Nangy", 4),
(4, "Mieussy", 4),
(5, "Morillon", 4),
(6, "Mont Saxonnex", 2);

INSERT INTO Composition (Rang, idPoint_RDV, idLigne) VALUES 
(4, 2, 1),
(3, 3, 1),
(2, 4, 1),
(1, 1, 1),

(4, 6, 2),
(3, 7, 2),
(2, 8, 2),
(1, 1, 2),

(4, 13, 3),
(3, 14, 3),
(2, 15, 3),
(1, 1, 3),

(4, 10, 4),
(3, 11, 4),
(2, 12, 4),
(1, 1, 4),

(4, 9, 5),
(3, 11, 5),
(2, 12, 5),
(1, 1, 5),

(2, 5, 6),
(1, 1, 6);
