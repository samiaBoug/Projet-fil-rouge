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
    $idRegister = $stm->fetch(PDO::FETCH_ASSOC);
    return $idRegister; 
}

function trouverRegisterEntrep($id, $mois, $profil){
    $conn = getDbConn();
    $stm = $conn->prepare("SELECT idRegister FROM registermentuel WHERE idEntrep = :id AND moi = :mois AND profil = :profil");
    $stm->bindParam(':id', $id);
    $stm->bindParam(':mois', $mois);
    $stm->bindParam(':profil', $profil);
    $stm->execute();
    $idRegister = $stm->fetch(PDO::FETCH_ASSOC);
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