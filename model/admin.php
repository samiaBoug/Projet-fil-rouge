<?php
require_once '../db.php';

function findAdmin($email){
    $conn = getDbConn();
    $stm = $conn->prepare("select * from admin where emailAdmin = :email");
    $stm->bindParam(':email', $email);
    $stm->execute();
    $admin = $stm->fetch(PDO::FETCH_ASSOC);
    return $admin;
}