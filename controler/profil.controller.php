<?php
require_once __DIR__ . '/../model/calculator.php';
require_once __DIR__ . '/../model/user.php';

function profil()
{
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id']; 
        $mois = date('m'); 
        $annee = date('Y');
        
        if ($_SESSION['profil'] === 'Utilis') {
            // info utilis 
            $recupererUtilis = utilis($id);
            $utilis = [
                "nom" => $recupererUtilis['nomUtilis'],
                "prenom" => $recupererUtilis['prenomUtilis'],
                "empreinteMensuelle" => getCarboneFootprintMUtilis($id, $mois, $annee),
                "empreinteAnnuelle" => getCarboneFootprintAUtilis($id, $annee),
                "empreinteParCategorie" => getBilanCarboneAnnuelCategUtilis($id, $annee),
                "mois" => $mois,
                "annee" => $annee
            ];
            
            renderProfil('profilUtilis', $utilis);

        } elseif ($_SESSION['profil'] === 'Entrep') {
            $recupererEntrep = petiteEntrep($id);
            $entrep = [
                "nom" => $recupererEntrep['nomEntrep'],
                "activite" => $recupererEntrep['activiteEntrep'],
                "adresse" => $recupererEntrep['adresse'],
                "taille" => $recupererEntrep['tailleEntrep'],
                "empreinteMensuelle" => getCarboneFootprintMEntreps($id, $mois, $annee),
                "empreinteAnnuelle" => getCarboneFootprintAEntrep($id, $annee),
                "empreinteParCategorie" => getBilanCarboneAnnuelCategEntrep($id, $annee),
                "mois" => $mois,
                "annee" => $annee
            ];
            
            renderProfil('profilEntrep', $entrep);
        }
    } else {
        header('Location: index.php?action=login');
    }
}

function renderProfil($view, $data = []) {
    extract($data);
    require __DIR__ . '/../view/' . $view . '.php'; 
}
