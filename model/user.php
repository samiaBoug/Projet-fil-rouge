<?php

require_once __DIR__ . '/../db.php';

//créer nouveau utilisateur : insert to
 //personne 
 function creerUtilis($nom , $prenom, $email, $motDePasse){
    $conn = getDbConn();
    $stm = $conn->prepare("insert into utilisateur (nomUtilis, prenomUtilis, emailUtilis, motDePasseUtilis) 
    VALUES (:nom, :prenom, :email, :motDePasse)");
    $stm->bindParam(':nom', $nom);
    $stm->bindParam(':prenom', $prenom);
    $stm->bindParam(':email', $email);
    $stm->bindParam(':motDePasse', $motDePasse);
    $stm->execute();
 
 }
 //petite entreprise
 function creerEntrep ($nom, $secteur, $taille, $adresse , $email, $motDePasse){
    $conn = getDbConn();
    $stm = $conn->prepare("insert into petiteentrep(nomEntrep, activiteEntrep, adresse, tailleEtrep, emailEntrep, motDePasseEntrep
                           VALUES (:nom, :secteur, :taille, :adresse, :email , :motDePasse)");
    $stm->bindParam(':nom', $nom);
    $stm->bindParam(':secteur', $secteur);
    $stm->bindParam(':taille', $taille);
    $stm->bindParam(':adresse', $adresse);
    $stm->bindParam(':email', $email);
    $stm->bindParam(':motDePasse', $motDePasse);
    $stm->execute();

 }

//verifier utilisateur par email : select
function trouverUtilis($email){
    $conn = getDbConn();
    $stm = $conn->prepare("select * from utilisateur where emailUtilis = :email ");
    $stm->bindParam(':email', $email);
    $stm->execute();
    $utilisateur = $stm->fetch(PDO::FETCH_ASSOC);
    return $utilisateur;

}

function trouverEntrep($email){
    $conn = getDbConn();
    $stm = $conn->prepare("select * from petiteentrep where emailEntrep = :email ");
    $stm->bindParam(':email', $email);
    $stm->execute();
    $petiteEntrep = $stm->fetch(PDO::FETCH_ASSOC);
    return $petiteEntrep;

}

