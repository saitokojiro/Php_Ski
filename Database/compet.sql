DROP DATABASE IF EXISTS compets_management;
CREATE DATABASE IF NOT EXISTS compets_management;

USE compets_management;

DROP TABLE IF EXISTS epreuves;
DROP TABLE IF EXISTS passages;
DROP TABLE IF EXISTS resultat;

CREATE TABLE IF NOT EXISTS epreuves
(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(32) NOT NULL,
    categorie VARCHAR(32) NOT NULL,
    profil VARCHAR(32) NOT NULL,
    lieu VARCHAR(32) NOT NULL,
    lifeDate DATE NOT NULL
)Engine=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS participants
(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    
    nom VARCHAR(32) NOT NULL,
    prenom VARCHAR(32) NOT NULL,
    photo VARCHAR(32) NOT NULL,
    categorie VARCHAR(32) NOT NULL,
    profil VARCHAR(32) NOT NULL,
    email VARCHAR(32) NOT NULL UNIQUE,
    date_de_naissance DATE NOT NULL
)Engine=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS resultat
(
    id INT(11)PRIMARY KEY,
    epreuve_id INT(11)  NULL,
    participant_id INT(11) NULL,
    nombre_passage INT(11) NULL,
    temps_one TIME NULL,
    temps_two TIME NULL
    /*CONSTRAINT fk_participants_resultat
        FOREIGN KEY (participant_id)
        REFERENCES participants(participant_id),
    CONSTRAINT fk_epreuves_resultat
        FOREIGN KEY (epreuve_id)
        REFERENCES epreuves(epreuve_id)*/
)Engine=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO epreuves (nom, categorie, profil, lieu, lifeDate)
VALUE
('blog','snow', 'open', 'paris','2019-09-24 16:15:54'),
('blog','snow', 'close', 'paris','2019-09-24 16:15:54');

INSERT INTO resultat (epreuve_id, participant_id, nombre_passage, temps_one, temps_two)
VALUE
('1','1', '2', '15','12');



INSERT INTO participants (photo, nom, prenom, categorie, profil, email, date_de_naissance)
VALUE
("flopi.jpg","plopi","flo","snow","open","hello@test.fr", "2019-09-24 16:15:54"),
("flopi.jpg","plopi","flo","snow","open","hello@tests.fr", "2019-09-24 16:15:54");



 ALTER TABLE resultat
 ADD CONSTRAINT fk_participants_resultat
 FOREIGN KEY (participant_id) REFERENCES participants(id);
 
 -- CREATE INDEX gt_epreuveID ON epreuves (id);
 ALTER TABLE resultat
 ADD CONSTRAINT fk_epreuves_resultat
 FOREIGN KEY (epreuve_id) REFERENCES epreuves(id);