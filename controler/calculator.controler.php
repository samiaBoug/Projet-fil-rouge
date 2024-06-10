<?php 
require_once __DIR__ . '/../model/calculator.php';
function calculer(){
    // Initialisation des messages d'erreurs
    $erreurs = [
        "transport" => "",
        "energie" => "",
        "dechets" => "",
        "alimentation" => "",
        "date" => ""
    ];
    if(!isset($_SESSION['id'])){
        header('location:index.php?action=login');
        exit();
    }
    $profil = $_SESSION['profil'];
    $id =$_SESSION['id'];

    // Vérifier si le formulaire a été soumis
    if (isset($_POST['calculer'])) {
        // Vérification des champs de transport
        if (empty($_POST['kmVoiture']) && empty($_POST['kmTransport']) && empty($_POST['kmTaxi']) && empty($_POST['kmVelo'])) {
            $erreurs['transport'] = "Veuillez renseigner au moins un moyen de transport.";
        } else {
            $kmVoiture = isset($_POST['kmVoiture']) ? $_POST['kmVoiture'] : 0;
            $kmTransport = isset($_POST['kmTransport']) ? $_POST['kmTransport'] : 0;
            $kmTaxi = isset($_POST['kmTaxi']) ? $_POST['kmTaxi'] : 0;
            $kmVelo = isset($_POST['kmVelo']) ? $_POST['kmVelo'] : 0;
        }

        // Vérification des champs d'énergie
        if (empty($_POST['electricite']) && empty($_POST['gaz'])) {
            $erreurs['energie'] = "Veuillez renseigner votre consommation d'énergie.";
        } else {
            $electricite = isset($_POST['electricite']) ? $_POST['electricite'] : 0;
            $gaz = isset($_POST['gaz']) ? $_POST['gaz'] : 0;
        }

        // Vérification du champ des déchets
        if (empty($_POST['dechets'])) {
            $erreurs['dechets'] = "Veuillez renseigner la quantité de déchets.";
        } else {
            $dechets = $_POST['dechets'];
        }

        // Vérification du champ d'alimentation
        if (empty($_POST['nbreRepas'])) {
            $erreurs['alimentation'] = "Veuillez renseigner le nombre de repas.";
        } else {
            $nbreRepas = $_POST['nbreRepas'];
        }

        // Vérification du champ de la date
        if (empty($_POST['date'])) {
            $erreurs['date'] = "Veuillez renseigner la date.";
        } else {
           if($profil === 'Utilis'){
                $registerExist = trouverRegisterUtilis($id, $_POST['date'], $profil);   
           }elseif($profil==='Entrep'){
                $registerExist = trouverRegisterEntrep($id, $_POST['date'], $profil);   

           }
           if($registerExist){
                $erreurs['date'] = "Un calcul pour ce moi existe déjà. Veuillez choisir une autre date.";
           }else{
                $date = $_POST['date'];
                $mois = $mois = date('m', strtotime($date));
           }
        }

        if (!array_filter($erreurs)) {
            // Nouveau registre
            if ($profil === 'Utilis') {
                $id = $_SESSION['id'];
                novRegistreUtilis($date, $id, $profil, $mois);
            } elseif ($profil === 'Entrep') {
                $id = $_SESSION['id'];
                novRegistreEntrep($date, $id, $profil, $mois);
            }

            // Récupérer l'ID du registre
            if ($profil === 'Utilis') {
                $idRegister = trouverRegisterUtilis($id, $mois, $profil);
            } elseif ($profil === 'Entrep') {
                $idRegister = trouverRegisterEntrep($id, $mois, $profil);
            }
            
            if ($idRegister) {
                // Nouveau lignes dans valeur
                $array = [$kmVoiture, $kmTransport, $kmTaxi, $kmVelo, $electricite, $gaz, $dechets, $nbreRepas];
                // Boucle pour insérer les valeurs dans la base de données
                for ($i = 0; $i < count($array); $i++) {
                    novValeurs($array[$i], $idRegister['idRegister'], $i+1);
                }
                header("location:ndex.php?action=profil$profil");

            }
        }
           
    }
    // Rendre la vue avec les erreurs
    renderCalculator('calculator', ['erreurs' => $erreurs]); 
}
//statistique : 

function renderCalculator($view, $data = []) {
    extract($data);
    require __DIR__ . '/../view/' . $view . '.php'; 
}

