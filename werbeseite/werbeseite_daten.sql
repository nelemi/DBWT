CREATE DATABASE IF NOT EXISTS emensawerbeseite CHARACTER SET UTF8mb4 COLLATE utf8mb4_unicode_ci;
USE emensawerbeseite;
#hey, klappts
CREATE TABLE gericht (
                         id  INT8 PRIMARY KEY,
                         name VARCHAR(80) NOT NULL UNIQUE,
                         beschreibung VARCHAR(800) NOT NULL,
                         erfasst_am DATE NOT NULL,
                         vegetarisch BOOLEAN NOT NULL,
                         vegan BOOLEAN NOT NULL,
                         preisintern DOUBLE NOT NULL CHECK (preisintern < preisextern),
                         preisextern DOUBLE NOT NULL CHECK(preisextern > preisintern));

CREATE TABLE allergen (
                          code CHAR(4) PRIMARY KEY,
                          name VARCHAR(300) NOT NULL,
                          typ VARCHAR(20) NOT NULL
);

CREATE TABLE kategorie (
                           id INT8 PRIMARY KEY,
                           name VARCHAR(80) NOT NULL,
                           eltern_id INT8,
                           bildname VARCHAR(200)
);
CREATE TABLE gericht_hat_allergen (
                                      code CHAR(4),
                                      gericht_id INT8 NOT NULL
);

CREATE TABLE gericht_hat_kategorie (
                                       gericht_id INT8 NOT NULL,
                                       kategorie_id INT8 NOT NULL
);
INSERT INTO `allergen` (`code`, `name`, `typ`) VALUES
	('a', 'Getreideprodukte', 'Getreide (Gluten)'),
	('a1', 'Weizen', 'Allergen'),
	('a2', 'Roggen', 'Allergen'),
	('a3', 'Gerste', 'Allergen'),
	('a4', 'Dinkel', 'Allergen'),
	('a5', 'Hafer', 'Allergen'),
	('a6', 'Dinkel', 'Allergen'),
	('b', 'Fisch', 'Allergen'),
	('c', 'Krebstiere', 'Allergen'),
	('d', 'Schwefeldioxid/Sulfit', 'Allergen'),
	('e', 'Sellerie', 'Allergen'),
	('f', 'Milch und Laktose', 'Allergen'),
	('f1', 'Butter', 'Allergen'),
	('f2', 'Käse', 'Allergen'),
	('f3', 'Margarine', 'Allergen'),
	('g', 'Sesam', 'Allergen'),
	('h', 'Nüsse', 'Allergen'),
	('h1', 'Mandeln', 'Allergen'),
	('h2', 'Haselnüsse', 'Allergen'),
	('h3', 'Walnüsse', 'Allergen'),
	('i', 'Erdnüsse', 'Allergen');
INSERT INTO `gericht` (`id`, `name`, `beschreibung`, `erfasst_am`, `vegan`, `vegetarisch`, `preisintern`, `preisextern`) VALUES
	(1, 'Bratkartoffeln mit Speck und Zwiebeln', 'Kartoffeln mit Zwiebeln und gut Speck', '2020-08-25', 0, 0, 2.3, 4),
	(3, 'Bratkartoffeln mit Zwiebeln', 'Kartoffeln mit Zwiebeln und ohne Speck', '2020-08-25', 1, 1, 2.3, 4),
	(4, 'Grilltofu', 'Fein gewürzt und mariniert', '2020-08-25', 1, 1, 2.5, 4.5),
	(5, 'Lasagne', 'Klassisch mit Bolognesesoße und Creme Fraiche', '2020-08-24', 0, 0, 2.5, 4.5),
	(6, 'Lasagne vegetarisch', 'Klassisch mit Sojagranulatsoße und Creme Fraiche', '2020-08-24', 0, 1, 2.5, 4.5),
	(7, 'Hackbraten', 'Nicht nur für Hacker', '2020-08-25', 0, 0, 2.5, 4),
	(8, 'Gemüsepfanne', 'Gesundes aus der Region, deftig angebraten', '2020-08-25', 1, 1, 2.3, 4),
	(9, 'Hühnersuppe', 'Suppenhuhn trifft Petersilie', '2020-08-25', 0, 0, 2, 3.5),
	(10, 'Forellenfilet', 'mit Kartoffeln und Dilldip', '2020-08-22', 0, 0, 3.8, 5),
	(11, 'Kartoffel-Lauch-Suppe', 'der klassische Bauchwärmer mit frischen Kräutern', '2020-08-22', 0, 1, 2, 3),
	(12, 'Kassler mit Rosmarinkartoffeln', 'dazu Salat und Senf', '2020-08-23', 0, 0, 3.8, 5.2),
	(13, 'Drei Reibekuchen mit Apfelmus', 'grob geriebene Kartoffeln aus der Region', '2020-08-23', 0, 1, 2.5, 4.5),
	(14, 'Pilzpfanne', 'die legendäre Pfanne aus Pilzen der Saison', '2020-08-23', 0, 1, 3, 5),
	(15, 'Pilzpfanne vegan', 'die legendäre Pfanne aus Pilzen der Saison ohne Käse', '2020-08-24', 1, 1, 3, 5),
	(16, 'Käsebrötchen', 'schmeckt vor und nach dem Essen', '2020-08-24', 0, 1, 1, 1.5),
	(17, 'Schinkenbrötchen', 'schmeckt auch ohne Hunger', '2020-08-25', 0, 0, 1.25, 1.75),
	(18, 'Tomatenbrötchen', 'mit Schnittlauch und Zwiebeln', '2020-08-25', 1, 1, 1, 1.5),
	(19, 'Mousse au Chocolat', 'sahnige schweizer Schokolade rundet jedes Essen ab', '2020-08-26', 0, 1, 1.25, 1.75),
	(20, 'Suppenkreation á la Chef', 'was verschafft werden muss, gut und günstig', '2020-08-26', 0, 0, 0.5, 0.9);

INSERT INTO `gericht_hat_allergen` (`code`, `gericht_id`) VALUES
	('h', 1),	
	('a3', 1),	
	('a4', 1),	
	('f1', 3),	
	('a6', 3),	
	('i', 3),	
	('a3', 4),	
	('f1', 4),	
	('a4', 4),	
	('h3', 4),	
	('d', 6),	
	('h1',7),	
	('a2', 7),	
	('h3', 7),	
	('c', 7),	
	('a3', 8),	
	('h3', 10),	
	('d', 10),	
	('f', 10),	
	('f2', 12),	
	('h1', 12),	
	('a5',12),	
	('c', 1),	
	('a2', 9),	
	('i', 14),	
	('f1', 1),	
	('a1', 15),	
	('a4', 15),	
	('i', 15),	
	('f3', 15),	
	('h3', 15);

INSERT INTO `kategorie` (`id`, `eltern_id`, `name`, `bildname`) VALUES
	(1, NULL, 'Aktionen', 'kat_aktionen.png'),
	(2, NULL, 'Menus', 'kat_menu.gif'),
	(3, 2, 'Hauptspeisen', 'kat_menu_haupt.bmp'),
	(4, 2, 'Vorspeisen', 'kat_menu_vor.svg'),
	(5, 2, 'Desserts', 'kat_menu_dessert.pic'),
	(6, 1, 'Mensastars', 'kat_stars.tif'),
	(7, 1, 'Erstiewoche', 'kat_erties.jpg');

INSERT INTO `gericht_hat_kategorie` (`kategorie_id`, `gericht_id`) VALUES
	(3, 1),	(3, 3),	(3, 4),	(3, 5),	(3, 6),	(3, 7),	(3, 9),	(4, 16), (4, 17), (4, 18), (5, 16), (5, 17), (5, 18);

#Prüfen ob alle Daten eingelesen wurden pro Spalte
SELECT COUNT(*) FROM allergen; # 21 entspricht Wahrheit
SELECT COUNT(*) FROM gericht; #19 entspricht Wahrheit
SELECT COUNT(*) FROM gericht_hat_allergen; #31 Wahrheit
SELECT COUNT(*) FROM gericht_hat_kategorie; #13 passt
SELECT COUNT(*) FROM kategorie; #7 passt auch

#Alle Daten der Gerichte
SELECT * FROM gericht;
#Erfassungsdatum Gerichte
SELECT erfasst_am FROM gericht;
#Erfassungsdatum sowie den Namen (als Attributname Gerichtname) aller Gerichte absteigend sortiert nach Gerichtname
SELECT erfasst_am, name AS Gerichtname FROM gericht ORDER BY Gerichtname DESC;
#Namen und Beschreibung, aufsteigend...
SELECT name, beschreibung FROM gericht ORDER BY name LIMIT 10 OFFSET 5;
SELECT DISTINCT typ FROM allergen;
SELECT name FROM gericht WHERE name LIKE 'K%';
SELECT id, name FROM gericht WHERE name LIKE '%suppe%';
SELECT * FROM kategorie WHERE eltern_id IS NULL;
UPDATE allergen SET name = 'Kamut' WHERE code = 'a6';
INSERT INTO gericht (`id`, `name`, `beschreibung`, `erfasst_am`, `vegan`, `vegetarisch`, `preisintern`, `preisextern`) VALUES  (21, 'Currywurst mit Pommes', 'Leckerer Klassiker', '2024-05-19', 0, 0, 2.3, 3);
INSERT INTO gericht_hat_kategorie (gericht_id, kategorie_id) VALUES (21, 3);
#Aufgabe 6
#Alle Gerichte mit allen zugehörigen Allergenen; alle Allergene bleiben erhalten
SELECT g.name AS Gericht,a.name AS Allergen
FROM gericht g
         RIGHT JOIN
     gericht_hat_allergen gha ON g.id = gha.gericht_id
         RIGHT JOIN
     allergen a ON gha.code = a.code;
#Anzahl der Gerichte pro Kategorie aufsteigend sortiert nach Zahl, nur alle die mehr als 2 Gerichte haben.
SELECT k.name AS Kategorie, COUNT(g.id) AS Anzahl_Gerichte
FROM gericht g
         JOIN gericht_hat_kategorie ghk ON g.id = ghk.gericht_id
         JOIN kategorie k ON ghk.kategorie_id = k.id
GROUP BY k.name
HAVING Anzahl_Gerichte > 2
ORDER BY
    Anzahl_Gerichte ASC;

#Alle Gerichte, die vier oder mehr Allergene aufweisen
SELECT g.name AS gericht, COUNT(ghk.gericht_id) AS Anzahl_Allergene
FROM gericht g
         JOIN gericht_hat_allergen ghk ON ghk.gericht_id = g.id
GROUP BY g.name
HAVING Anzahl_Allergene >= 4;

#Aufgabe 7
ALTER TABLE gericht
 ADD CONSTRAINT gericht_gericht_hat_allergen_gericht_id_fk
    FOREIGN KEY (id)
    REFERENCES gericht_hat_allergen (gericht_id);

ALTER TABLE gericht
 ADD CONSTRAINT gericht_gericht_hat_kategorie_gericht_id
     FOREIGN KEY (id)
     REFERENCES gericht_hat_kategorie (gericht_id);

ALTER TABLE kategorie
    ADD CONSTRAINT kategorie_gericht_hat_kategorie_kategorie_id_fk
        FOREIGN KEY (id)
            REFERENCES gericht_hat_kategorie (kategorie_id);

ALTER TABLE allergen
ADD CONSTRAINT allergen_gericht_hat_allergen_code_fk
    FOREIGN KEY (code)
    REFERENCES gericht_hat_allergen (code);