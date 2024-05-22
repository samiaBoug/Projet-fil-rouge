<?php
require_once '../db.php';
//inserer le registre 
function novRegistreUtilis($date , $idEntrep){
    $conn = getDbConn();
    $stm = $conn->prepare("insert into registermentuel (dateRegister , idUtilis) VALUES (:date, :id)");
    $stm->bindParam(':date', $date);
    $stm->bindParam(':id', $idUtilis);
    $stm->execute();   
}
function novRegistreEntrep($date , $idEntrep){
    $conn = getDbConn();
    $stm = $conn->prepare("insert into registermentuel (dateRegister , idUtilis) VALUES (:date, :id)");
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