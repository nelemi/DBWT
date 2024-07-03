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
#DROP VIEW IF EXISTS view_kategoriegerichte_vegetarisch;

CREATE VIEW view_kategoriegerichte_vegetarisch AS
SELECT
    k.name AS kategorie_name,
    g.id AS gericht_id,
    g.name AS gericht_name
FROM
    kategorie k
        LEFT JOIN
    gericht_hat_kategorie ghk ON k.id = ghk.kategorie_id
        LEFT JOIN
    gericht g ON ghk.gericht_id = g.id AND g.vegetarisch = 1
WHERE
    g.id IS NOT NULL # eigtl. unnötige Überprüfung, aber für Union müssen SELECT Statements gleich
                    # aufgebaut sein, deshalb die WHERE Bedingung

UNION # weil zwei verschiedene Abfragen benötigt werden: einmal alle Kategorien zu vegetarischen
        # Gerichten und einmal alle Kategorien, zu denen es gar keine Gerichte gibt

SELECT
    k.name AS kategorie_name,
    NULL AS gericht_id,
    NULL AS gericht_name
FROM
    kategorie k
        LEFT JOIN
    gericht_hat_kategorie ghk ON k.id = ghk.kategorie_id
        LEFT JOIN
    gericht g ON ghk.gericht_id = g.id AND g.vegetarisch = 1
WHERE
    k.id NOT IN (
        SELECT k.id # so werden auch all die Kategorien ausgegeben, die eben noch nicht in den
                    # vegetarischen Gerichten vorgekommen sind (kategorie_id NOT IN Liste der vegetarischen gerichte von eben)
        FROM
            kategorie k
                LEFT JOIN
            gericht_hat_kategorie ghk ON k.id = ghk.kategorie_id
                LEFT JOIN
            gericht g ON ghk.gericht_id = g.id
        WHERE
            g.vegetarisch = 1
    );

