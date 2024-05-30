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
-- 
ALTER TABLE petiteentrep 
ADD COLUMN emailEntrep
 VARCHAR(200) ;

INSERT INTO `calculatorcarbone`.`utilisateur` (`nomUtilis`, `prenomUtilis`, `emailUtilis`, `motDePasseUtilis`) VALUES ('bougtoub', 'samia', 'email@gmail.com', '123456789');

INSERT INTO `calculatorcarbone`.`categorie` (`nomCategorie`) VALUES ('Transports');
INSERT INTO `calculatorcarbone`.`categorie` (`nomCategorie`) VALUES ('Consommation d\'énergie');
INSERT INTO `calculatorcarbone`.`categorie` (`nomCategorie`) VALUES ('Déchets');
INSERT INTO `calculatorcarbone`.`categorie` (`nomCategorie`) VALUES ('Alimentation');

INSERT INTO `calculatorcarbone`.`activite` (`nomActivite`, `idCategorie`) VALUES ('Kilomètres parcourus en voiture', '1');
INSERT INTO `calculatorcarbone`.`activite` (`nomActivite`, `idCategorie`) VALUES ('Kilomètres parcourus en transport en commun', '1');
INSERT INTO `calculatorcarbone`.`activite` (`nomActivite`, `idCategorie`) VALUES ('Kilomètres parcourus en taxi', '1');
INSERT INTO `calculatorcarbone`.`activite` (`nomActivite`, `idCategorie`) VALUES ('Kilomètres parcourus à vélo', '1');
INSERT INTO `calculatorcarbone`.`activite` (`nomActivite`, `idCategorie`) VALUES ('Facture d\'électricité', '2');
INSERT INTO `calculatorcarbone`.`activite` (`nomActivite`, `idCategorie`) VALUES ('Facture de gaz', '2');
INSERT INTO `calculatorcarbone`.`activite` (`nomActivite`, `idCategorie`) VALUES ('Quantité de déchets produits', '3');
INSERT INTO `calculatorcarbone`.`activite` (`nomActivite`, `idCategorie`) VALUES ('Nombre de repas par jour', '4');

UPDATE `calculatorcarbone`.`activite` SET `facteurActivite` = '0,195', `unite` = 'kg CO2' WHERE (`idActivite` = '1');
UPDATE `calculatorcarbone`.`activite` SET `facteurActivite` = '0,035', `unite` = 'kg CO2' WHERE (`idActivite` = '2');
UPDATE `calculatorcarbone`.`activite` SET `facteurActivite` = ' 0,180', `unite` = 'kg CO2' WHERE (`idActivite` = '3');
UPDATE `calculatorcarbone`.`activite` SET `facteurActivite` = '0', `unite` = 'kg CO2' WHERE (`idActivite` = '4');
UPDATE `calculatorcarbone`.`activite` SET `facteurActivite` = '2,5', `unite` = 'kg CO2' WHERE (`idActivite` = '8');
UPDATE `calculatorcarbone`.`activite` SET `facteurActivite` = '0,46', `unite` = 'kg CO2' WHERE (`idActivite` = '5');
UPDATE `calculatorcarbone`.`activite` SET `facteurActivite` = '8,1', `unite` = 'kg CO2' WHERE (`idActivite` = '6');
UPDATE `calculatorcarbone`.`activite` SET `facteurActivite` = '0,2', `unite` = 'kg CO2' WHERE (`idActivite` = '7');
