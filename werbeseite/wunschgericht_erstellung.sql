USE emensawerbeseite;

CREATE TABLE erstellerin (
    eid INT8 AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR(800) DEFAULT 'anonym' ,
    mail VARCHAR(800) NOT NULL
);
CREATE TABLE wunschgericht (
                         number  INT8 AUTO_INCREMENT PRIMARY KEY,
                         name VARCHAR(800) NOT NULL UNIQUE,
                         beschreibung VARCHAR(800) NOT NULL,
                         erstellungsdatum DATE NOT NULL,
                         erstellerinid  INT8 REFERENCES erstellerin(eid) # Drauf achten dass Keys gleiche Datentypen haben
);

ALTER TABLE erstellerin ADD CONSTRAINT unique_name_email UNIQUE (name, mail);

SELECT * FROM  wunschgericht w LEFT JOIN erstellerin e ON w.erstellerinid = e.eid  ORDER BY erstellerinid DESC LIMIT 5 ;
SELECT erstellerinid, COUNT(*) as anzahl_gerichte FROM wunschgericht GROUP BY erstellerinid ;

#Ab hier ausführen bitte; M5 Aufgabe 1 a)
CREATE TABLE benutzer (
    id INT8 AUTO_INCREMENT PRIMARY KEY UNIQUE , #Eindeutig noch was hinzufügen?
    name varchar(200) NOT NULL, #Name der auch auf Oberfläche dargestellt wird
    email varchar(100) NOT NULL UNIQUE, #eindeutige Mail? Teil der Anmeldung
    passwort varchar(200) NOT NULL, #Speicherung des Passwort-Hashs mit SHA-1(=kryptografische Hashfunktion, entwickelt um Daten in Hash-Wert umzuwandeln
    admin BOOLEAN NOT NULL DEFAULT FALSE , #Markierung, ob es sich um einen Administrator handelt oder nicht. Standard: false.
    anzahlfehler INT NOT NULL DEFAULT 0, #Zähler, wie oft hintereinander eine Anmeldungerfolglos durchgeführt wurde. Standard: 0
    anzahlanmeldungen INT NOT NULL, #Zähler, wie oft eine Anmeldung insgesamt erfolgreichdurchgeführt wurde.
    letzteanmeldung datetime, #Zeitpunkt, an dem sich der/die Benutzer:in zuletzt erfolgreich angemeldet hat
    letzterfehler datetime #Zeitpunkt, an dem sich der/die Benutzer:in zuletzterfolglos angemeldet hat
);

#M5 Aufgabe 1 3)
#neuen Benutzer anlegen und gehashtes Passwort mit Salt aus passwort.php einsetzen
INSERT INTO benutzer (name, email, passwort, admin, anzahlanmeldungen) VALUES ('Amnele', 'admin@emensa.example', '3340634a2cf0e4f8676ad3ba176a18b8ab00d229', true, 0);
UPDATE benutzer SET passwort = 'a8e28f8ec5a988b7523f2976942c2d3277c28232' WHERE id = 1;
#weiteren Benutzer hinzufügen
INSERT INTO benutzer (name, email, passwort, anzahlanmeldungen) VALUES ('Lara', 'lara@emensa.example', 'amelieundnelesindtoll', 0);
#gehastes Passwort hinzufügen
UPDATE benutzer SET passwort = '8e685b83f7d1790ad327633a33cd46783ba9ed4a' WHERE id = 2;