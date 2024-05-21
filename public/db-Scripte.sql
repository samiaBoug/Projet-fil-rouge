CREATE DATABASE calculatorCarbone;

CREATE TABLE petiteEntrep (
    idEntrep INT PRIMARY KEY AUTO_INCREMENT,
    nomEntrep VARCHAR(200),
    activiteEntrep VARCHAR(200),
    adresse VARCHAR(200),
    tailleEntrep VARCHAR(200),
    motDePasseEntrep VARCHAR(100)
);

CREATE TABLE utilisateur (
    idUtilis INT PRIMARY KEY AUTO_INCREMENT,
    nomUtilis VARCHAR(200),
    prenomUtilis VARCHAR(200),
    emailUtilis VARCHAR(200),
    motDePasseUtilis VARCHAR(100)
);

CREATE TABLE categorie (
    idCategorie INT PRIMARY KEY AUTO_INCREMENT,
    nomCategorie VARCHAR(200),
    descriptionCategorie VARCHAR(200)
);

CREATE TABLE admin (
    idAdmin INT PRIMARY KEY AUTO_INCREMENT,
    nomAdmin VARCHAR(200),
    emailAdmin VARCHAR(200),
    motDePasseAdmin VARCHAR(200)
);

CREATE TABLE RegisterMentuel (
    idRegister INT PRIMARY KEY AUTO_INCREMENT,
    dateRegister DATE,
    idUtilis INT,
    idEntrep INT,
    FOREIGN KEY (idUtilis) REFERENCES utilisateur(idUtilis),
    FOREIGN KEY (idEntrep) REFERENCES petiteEntrep(idEntrep)
);

CREATE TABLE activite (
    idActivite INT PRIMARY KEY AUTO_INCREMENT,
    nomActivite VARCHAR(200),
    facteurActivite DECIMAL,
    unite VARCHAR(200),
    idCategorie INT,
    FOREIGN KEY (idCategorie) REFERENCES categorie(idCategorie)
);

CREATE TABLE valeur (
    idValeur INT PRIMARY KEY AUTO_INCREMENT,
    valeur DECIMAL,
    idRegister INT,
    idActivite INT,
    FOREIGN KEY (idRegister) REFERENCES RegisterMentuel(idRegister),
    FOREIGN KEY (idActivite) REFERENCES activite(idActivite)
);

CREATE TABLE message (
    idMessage INT PRIMARY KEY AUTO_INCREMENT,
    dateMessage DATE,
    nomVisiteur VARCHAR(200),
    emailVisiteur VARCHAR(200),
    message VARCHAR(280)
);
