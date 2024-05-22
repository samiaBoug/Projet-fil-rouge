<?php 
function getDbConn(){


$dbname = "calculatorcarbone";
$user = "root";
$pass = "";

// Partie connection
try {
    $conn = new PDO("mysql:host=localhost;dbname=$dbname", $user, $pass);
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
    return $conn;
}