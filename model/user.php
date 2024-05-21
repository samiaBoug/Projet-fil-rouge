<!-- requette -->
<!-- connx -->
<?php 
function dbConnx(){
    $db = 'calculatorCarbone';
    $host = 'localhost';
    $user ='root';
    $password ='';
$connx = new PDO (dsn:'mysql:dbname=$db; host=$host', username:$user, password:$password);
return $connx ;
}


