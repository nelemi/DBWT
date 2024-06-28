#a) alle Suppen-Gerichte (die ein *suppe* im Namen tragen)

USE emensawerbeseite;
#DROP VIEW IF EXISTS view_suppengerichte; # Mit View if exits davor!!
CREATE VIEW view_suppengerichte AS
    SELECT *
    FROM gericht
    WHERE name LIKE '%suppe%';

#b)Anzahl der Anmeldungen pro Benutzer absteigend sortiert nach Anzahl der Anmeldungen
CREATE VIEW view_anmeldungen AS
    SELECT anzahlanmeldungen
    FROM benutzer ORDER BY anzahlanmeldungen DESC;

#c) alle vegetarischen Gerichte sowie die zugehörigen Kategorien zeigt.
# Stellen Sie immer alle Kategorien dar, auch wenn dieser Kategorie kein Gericht zugeordnet ist.
DROP VIEW IF EXISTS view_kategoriegerichte_vegetarisch;
CREATE VIEW view_kategoriegerichte_vegetarisch AS
    SELECT g.id,g.name, k.name AS kategorie_name
    FROM gericht g
    RIGHT JOIN gericht_hat_kategorie ghk ON g.id = ghk.gericht_id
    RIGHT JOIN kategorie k ON ghk.kategorie_id = k.id
    WHERE g.vegetarisch = 1;

