DROP DATABASE IF EXISTS compets_management;
CREATE DATABASE IF NOT EXISTS compets_management;

USE compets_management;

DROP TABLE IF EXISTS epreuves;
DROP TABLE IF EXISTS passages;
DROP TABLE IF EXISTS resultat;

CREATE TABLE IF NOT EXISTS epreuves
(
    epreuve_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    epreuve_nom VARCHAR(32) NOT NULL,
    epreuve_categorie VARCHAR(32) NOT NULL,
    epreuve_profil VARCHAR(32) NOT NULL,
    epreuve_lieu VARCHAR(32) NOT NULL,
    epreuve_date DATETIME NOT NULL
)Engine=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS participants
(
    participant_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    
    participant_nom VARCHAR(32) NOT NULL,
    participant_prenom VARCHAR(32) NOT NULL,
    participant_photo VARCHAR(32) NOT NULL,
    participant_categorie VARCHAR(32) NOT NULL,
    participant_profil VARCHAR(32) NOT NULL,
    participant_email VARCHAR(32) NOT NULL UNIQUE,
    participant_date_de_naissance DATETIME NOT NULL
)Engine=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS resultat
(
    resultat_id INT(11)PRIMARY KEY,
    epreuve_id INT(11)  NULL,
    participant_id INT(11) NULL,
    resultat_nombre_passage INT(11) NULL,
    resultat_temps_one INT(11) NULL,
    resultat_temps_two INT(11) NULL
    /*CONSTRAINT fk_participants_resultat
        FOREIGN KEY (participant_id)
        REFERENCES participants(participant_id),
    CONSTRAINT fk_epreuves_resultat
        FOREIGN KEY (epreuve_id)
        REFERENCES epreuves(epreuve_id)*/
)Engine=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO epreuves (epreuve_nom, epreuve_categorie, epreuve_profil, epreuve_lieu, epreuve_date)
VALUE
('blog','snow', 'open', 'paris','2019-09-24 16:15:54'),
('blog','snow', 'close', 'paris','2019-09-24 16:15:54');

INSERT INTO resultat (epreuve_id, participant_id, resultat_nombre_passage, resultat_temps_one, resultat_temps_two)
VALUE
('1','1', '2', '15','12');



INSERT INTO participants (participant_photo, participant_nom, participant_prenom, participant_categorie, participant_profil, participant_email, participant_date_de_naissance)
VALUE
("flopi.jpg","plopi","flo","snow","open","hello@test.fr", "2019-09-24 16:15:54"),
("flopi.jpg","plopi","flo","snow","open","hello@tests.fr", "2019-09-24 16:15:54");



 ALTER TABLE resultat
 ADD CONSTRAINT fk_participants_resultat
 FOREIGN KEY (participant_id) REFERENCES participants(participant_id);
 
 CREATE INDEX gt_epreuveID ON epreuves (epreuve_id); 
 ALTER TABLE resultat
 ADD CONSTRAINT fk_epreuves_resultat
 FOREIGN KEY (epreuve_id) REFERENCES epreuves(epreuve_id);