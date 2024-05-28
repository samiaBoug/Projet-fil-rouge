<?php 
//calculer 
function calucule(){
    $erreur =[
        "transport" => "",
        "energie" => "",
        "dechets" => "",
        "alimentation" => "",
        "date" => ""
    ];
    if(isset($_POST['calculer'])){

        if(empty($_POST['kmVoiture']) && empty($_POST['kmTransport']) && empty($_POST['kmTaxi']) && empty($_POST['kmVelo']) ){
            $erreur['transport'] = "";
        }else{
        $kmkmVoitureoiture = $_POST['kmVoiture'];
        $kmTransport = $_POST['kmTransport'];
        $kmTaxi = $_POST['kmTaxi'];
        $kmVelo = $_POST['kmVelo'];     
        }

        if(empty($_POST['electricite']) && empty($_POST['gaz'])){
            $erreur['energie'];
        }else{
             $electricite = $_POST['electricite'];
             $gaz = $_POST['gaz'];
        }

        if(empty($_POST['dechets'])){
            $erreur['dechets'] = "";
        }else{
        $dechets = $_POST['dechets'];
        }

        if(empty($nbreRepas = $_POST['nbreRepas'])){
            $erreur['alimentation'] = "";
        }else{
           $nbreRepas = $_POST['nbreRepas']; 
        }

        if(empty($_POST['date'])){
            $erreur['date'] = "";
        }else{
            $date = $_POST['date'];
        }

        //nouveau register
        if(isset($_SESSION['idUtilis'])){
            $id = $_POST['idUtilis'];
            novRegistreUtilis($date, $id);

  
        } 
         if(isset($_SESSION['idEntrep'])){
            $id = $_POST['idEntrep'];
            novRegistreEntrep($date, $id);
        }
        //recuperer id register
        $idRegidter =trouverRegister($id, $date);

        //nouveau lignes dans valeur 

        $array = [$kmkmVoitureoiture, $kmTransport, $kmTaxi, $kmVelo, $electricite, $gaz ,$dechets ];
        
        for($i=0 ; $i>= 14; $i++){
            novValeurs($array[$i], $idRegidter , $i);
        }
 

    }else{
    require __DIR__ . '/../view/calculator.php'; 
       
    }
}


