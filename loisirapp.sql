--   #############################################################################################################
--   #
--   # @ This file was created with ❤️ by BenJ
--   # Date : Mon, May 20 2024
--   # Time : 5:53 PM
--   #
--   # Usage : To create db using this file u need to create the db first in your prefered App such WampSERVER,
--   #         the db name must be ```loisirapp```, then import this file into the db created.
--   # 
--   ##############################################################################################################

  CREATE TABLE IF NOT EXISTS utilisateur (
    id_utilisateur INT NOT NULL AUTO_INCREMENT,
    nom_utilisateur VARCHAR(50) NOT NULL,
    prenom_utilisateur VARCHAR(50) NOT NULL,
    profil_utilisateur VARCHAR(50) NoT NULL,
    email_utilisateur VARCHAR(50) NOT NULL,
    phone_utilisateur VARCHAR(50) NOT NULL,
    pwd_utilisateur VARCHAR(100) NOT NULL,
    date_creation_compte date NOT NULL,
    status_compte VARCHAR(50) NOT NULL,

    additional Boolean NULL,
    description_utilisateur VARCHAR(300) NULL,
    link_fb VARCHAR(200) NULL,
    link_insta VARCHAR(200) NULL,
    link_x VARCHAR(200) NULL,
    link_yout VARCHAR(200) NULL,
    job_utilisateur VARCHAR(100) NULL,
    year_xperia_utilisateur VARCHAR(50) NULL,
    address_utilisateur VARCHAR(100) NULL,

    PRIMARY KEY (id_utilisateur)
);

CREATE TABLE IF NOT EXISTS activite (
    id_activite INT NOT NULL AUTO_INCREMENT,
    id_utilisateur INT NOT NULL,
    titre_activite VARCHAR(50) NOT NULL,
    domaine_activite VARCHAR(50) NOT NULL,
    lieu_activite VARCHAR(50) NOT NULL,
    description_activite VARCHAR(255) NOT NULL,
    prix_activite VARCHAR(50) NOT NULL,
    date_creation_activite date NOT NULL,
    date_activite date NOT NULL,
    heure Time NOT NULL,
    affiche_activite VARCHAR(50) NOT NULL,
    photo1 VARCHAR(50) NOT NULL,
    photo2 VARCHAR(50) NOT NULL,
    photo3 VARCHAR(50) NOT NULL,
    a_payer_publicite Boolean NOT NULL,
    date_sponsored date NULL,

    PRIMARY KEY (id_activite),
    FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id_utilisateur)
);

CREATE TABLE IF NOT EXISTS reservation (
    id_reservation INT NOT NULL AUTO_INCREMENT,
    id_utilisateur INT NOT NULL,
    id_activite INT NOT NULL,
    date_reservation date NOT NULL,
    status_reservation VARCHAR(50) NOT NULL,

    PRIMARY KEY (id_reservation),
    FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id_utilisateur),
    FOREIGN KEY(id_activite) REFERENCES activite(id_activite)
);


CREATE TABLE IF NOT EXISTS commentaire (
    id_commentaire INT NOT NULL AUTO_INCREMENT,
    id_utilisateur INT NOT NULL,
    id_activite INT NOT NULL,
    contenu VARCHAR(50) NOT NULL,
    note INT NOT NULL,
    date_commentaire date NOT NULL,

    PRIMARY KEY (id_commentaire),
    FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id_utilisateur),
    FOREIGN KEY(id_activite) REFERENCES activite(id_activite)
);


CREATE TABLE IF NOT EXISTS super_user (
    id_su INT NOT NULL AUTO_INCREMENT,
    nom_su VARCHAR(30) NOT NULL,
    prenom_su VARCHAR(30) NOT NULL,
    username_su VARCHAR(20) NOT NULL,
    pwd_su VARCHAR(80) NOT NULL,

    PRIMARY KEY (id_su)
);