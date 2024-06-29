USE emensawerbeseite;
#DROP PROCEDURE IF EXISTS inkrementiere_anmeldungen ;

CREATE PROCEDURE inkrementiere_anmeldungen (
    IN user_id INTEGER
)
BEGIN
    UPDATE benutzer
    SET anzahlanmeldungen = anzahlanmeldungen + 1
    WHERE id = user_id;
END;