<?php
require_once __DIR__ . '/../db.php';
//inserer le registre 
function novRegistreUtilis($date , $idUtilis, $profil ,$mois){
    $conn = getDbConn();
    $stm = $conn->prepare("insert into registermentuel (dateRegister , idUtilis , profil , moi) VALUES (:date, :id , :profil , :mois)");
    $stm->bindParam(':date', $date);
    $stm->bindParam(':id', $idUtilis);
    $stm->bindParam(':profil', $profil);
    $stm->bindParam(':mois', $mois);
    $stm->execute();   
}
function novRegistreEntrep($date , $idEntrep, $profil, $mois){
    $conn = getDbConn();
    $stm = $conn->prepare("insert into registermentuel (dateRegister , idEntrep , profil, moi) VALUES (:date, :id , :profil, :mois)");
    $stm->bindParam(':date', $date);
    $stm->bindParam(':id', $idEntrep);
    $stm->bindParam(':profil', $profil);
    $stm->bindParam(':mois', $mois);
    $stm->execute();   
}

//inserer les valeur 
function novValeurs($valeur, $idRegister, $idActivite){
    $conn = getDbConn();
    $stm = $conn->prepare("insert into valeur(valeur, idRegister, idActivite) VALUES (:valeur, :idRegister, :idActivite)");
    $stm->bindParam(':valeur', $valeur);
    $stm->bindParam(':idRegister', $idRegister);
    $stm->bindParam('idActivite', $idActivite);
    $stm->execute();
}
//trouver register 
function trouverRegisterUtilis($id, $mois, $profil){
    $conn = getDbConn();
    $stm = $conn->prepare("SELECT idRegister FROM registermentuel WHERE idUtilis = :id AND moi = :mois AND profil = :profil");
    $stm->bindParam(':id', $id);
    $stm->bindParam(':mois', $mois);
    $stm->bindParam(':profil', $profil);
    $stm->execute();
   
    return $stm->fetch(PDO::FETCH_ASSOC); 
}

function trouverRegisterEntrep($id, $mois, $profil){
    $conn = getDbConn();
    $stm = $conn->prepare("SELECT idRegister FROM registermentuel WHERE idEntrep = :id AND moi = :mois AND profil = :profil");
    $stm->bindParam(':id', $id);
    $stm->bindParam(':mois', $mois);
    $stm->bindParam(':profil', $profil);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC); 
}

function getCategorie(){
    $conn = getDbConn();
    $stm = $conn->query("select * from categorie");
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}
//aficher les activité 
function getActivite(){
    $conn = getDbConn();
    $query = $conn->query("select * from activite");
    return $query->fetchAll(PDO::FETCH_ASSOC);
    
}
//afficher les resultas 
function getValues($idRegister){
    $conn = getDbConn();
    $stm = $conn->prepare("select * from valeur inner joint registermentuel where valeur.idRegister=registermentuel.idRegister ");
    $stm->bindParam(':idRegister', $idRegister);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}
 function getRegisterUtilis($id){
    $conn = getDbConn();
    $stm = $conn->prepare("select * from registermentuel where idUtilis = :id");
    $stm->bindParam(':id', $id);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
 }

// calcule utilis
function getCarboneFootprintMUtilis($idUtilis, $mois, $annee) {
    $conn = getDbConn();
    $stm = $conn->prepare("
        SELECT SUM(a.facteurActivite * v.valeur) AS totalMentuel
        FROM valeur v
        JOIN activite a ON v.idActivite = a.idActivite
        JOIN registermentuel r ON v.idRegister = r.idRegister
        WHERE r.idUtilis = :idUtilis AND MONTH(r.dateRegister) = :mois AND YEAR(r.dateRegister) = :annee
    ");
    $stm->bindParam(':idUtilis', $idUtilis);
    $stm->bindParam(':mois', $mois);
    $stm->bindParam(':annee', $annee);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC)['totalMentuel'];
}

function getCarboneFootprintAUtilis($idUtilis, $annee) {
    $conn = getDbConn();
    $stm = $conn->prepare("
        SELECT SUM(a.facteurActivite * v.valeur) AS annual_total
        FROM valeur v
        JOIN activite a ON v.idActivite = a.idActivite
        JOIN registermentuel r ON v.idRegister = r.idRegister
        WHERE r.idUtilis = :idUtilis AND YEAR(r.dateRegister) = :annee
    ");
    $stm->bindParam(':idUtilis', $idUtilis);
    $stm->bindParam(':annee', $annee);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC)['annual_total'];
}

function getBilanCarboneAnnuelCategUtilis($idUtilis, $annee) {
    $conn = getDbConn();
    $stm = $conn->prepare("
        SELECT c.nomCategorie, SUM(a.facteurActivite * v.valeur) AS total_categorie
        FROM valeur v
        JOIN activite a ON v.idActivite = a.idActivite
        JOIN categorie c ON a.idCategorie = c.idCategorie
        JOIN registermentuel r ON v.idRegister = r.idRegister
        WHERE r.idUtilis = :idUtilis AND YEAR(r.dateRegister) = :annee
        GROUP BY c.nomCategorie
    ");
    $stm->bindParam(':idUtilis', $idUtilis);
    $stm->bindParam(':annee', $annee);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}
// calcule entrep


function getCarboneFootprintAEntrep($idEntrep, $annee) {
    $conn = getDbConn();
    $stm = $conn->prepare("
        SELECT SUM(a.facteurActivite * v.valeur) AS annual_total
        FROM valeur v
        JOIN activite a ON v.idActivite = a.idActivite
        JOIN registermentuel r ON v.idRegister = r.idRegister
        WHERE r.idEntrep = :idEntrep AND YEAR(r.dateRegister) = :annee
    ");
    $stm->bindParam(':idEntrep', $idEntrep);
    $stm->bindParam(':annee', $annee);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC)['annual_total'];
}

function getBilanCarboneAnnuelCategEntrep($idEntrep, $annee) {
    $conn = getDbConn();
    $stm = $conn->prepare("
        SELECT c.nomCategorie, SUM(a.facteurActivite * v.valeur) AS total_categorie
        FROM valeur v
        JOIN activite a ON v.idActivite = a.idActivite
        JOIN categorie c ON a.idCategorie = c.idCategorie
        JOIN registermentuel r ON v.idRegister = r.idRegister
        WHERE r.idEntrep = :idEntrep AND YEAR(r.dateRegister) = :annee
        GROUP BY c.nomCategorie
    ");
    $stm->bindParam(':idEntrep', $idEntrep);
    $stm->bindParam(':annee', $annee);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}
function getCarboneFootprintMEntreps($idUtilis, $mois, $annee) {
    $conn = getDbConn();
    $stm = $conn->prepare("
        SELECT SUM(a.facteurActivite * v.valeur) AS totalMentuel
        FROM valeur v
        JOIN activite a ON v.idActivite = a.idActivite
        JOIN registermentuel r ON v.idRegister = r.idRegister
        WHERE r.idUtilis = :idUtilis AND MONTH(r.dateRegister) = :mois AND YEAR(r.dateRegister) = :annee
    ");
    $stm->bindParam(':idUtilis', $idUtilis);
    $stm->bindParam(':mois', $mois);
    $stm->bindParam(':annee', $annee);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC)['totalMentuel'];
}