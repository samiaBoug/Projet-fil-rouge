<?php
require_once '../db.php';
//inserer le registre 
function novRegistreUtilis($date , $idUtilis){
    $conn = getDbConn();
    $stm = $conn->prepare("insert into registermentuel (dateRegister , idUtilis) VALUES (:date, :id)");
    $stm->bindParam(':date', $date);
    $stm->bindParam(':id', $idUtilis);
    $stm->execute();   
}
function novRegistreEntrep($date , $idEntrep){
    $conn = getDbConn();
    $stm = $conn->prepare("insert into registermentuel (dateRegister , idEntrep) VALUES (:date, :id)");
    $stm->bindParam(':date', $date);
    $stm->bindParam(':id', $idEntrep);
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
function trouverRegister($id, $date){
    $conn = getDbConn();
    $stm = $conn->prepare("select idRegister from register where idutilis = :id or idEntrep = :id and date = :date ");
    $stm->bindParam(':id', $id);
    $stm->bindParam(':date', $date);
    $id = $stm->fetch(PDO::FETCH_ASSOC);
    $idRegister = $id['idRegister'];
    return $idRegister;

}

//aficher les categorie 
function getCategorie(){
    $conn = getDbConn();
    $stm = $conn->query("select * from categorie");
    $categorie = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $categorie;
}
//aficher les activité 
function getActivite(){
    $conn = getDbConn();
    $query = $conn->query("select * from activite");
    $activite = $query->fetchAll(PDO::FETCH_ASSOC);
    return $activite;
    
}
//afficher les resultas 
function getValues($idRegister , $idUtilis){
    $conn = getDbConn();
    $stm = $conn->prepare("select * from valeur where idRegister = :idRegister  ");
    $stm->bindParam(':idRegister', $idRegister);
    $stm->execute();
    $valeurs = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $valeurs;
}