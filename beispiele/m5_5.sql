USE emensawerbeseite;
CREATE PROCEDURE inkrementiere_anmeldungen (
    IN user_id INTEGER,
    OUT anzahlanmeldungen INTEGER)
BEGIN
    UPDATE benutzer
    SET anzahlanmeldungen = anzahlanmeldungen +1
    WHERE id = user_id;

    SELECT anzahlanmeldungen
        INTO anzahlanmeldungen
    FROM benutzer
    WHERE id = user_id;
end;