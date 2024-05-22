<?php 
require_once '../db.php';
//inserer les message 
function insertMessage($nom, $email, $message){
    $conn = getDbConn();
    $stm = $conn->prepare("insert into message (nomVisiteur , emailVisiteur, message) VALUES (:nom, :email, :message) ");
    $stm->bindParam(':nom', $nom);
    $stm->bindParam(':email', $email);
    $stm->bindParam(':message', $message);
    $stm->execute();
}

//afficher les message 
function getMessage(){
    $conn = getDbConn();
    $stm = $conn->query("select * from message");
    $message = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $message;

}