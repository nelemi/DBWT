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