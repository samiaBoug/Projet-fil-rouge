<?php
require_once __DIR__ . '/../model/user.php';
session_start();

// login  
function login() {
    if (isset($_SESSION['id'])) {
        if ($_SESSION['profil'] === 'Utilis') {
            header('Location: index.php?action=profilUtilis');
            exit();
        } elseif ($_SESSION['profil'] === 'Entrep') {
            header('Location: index.php?action=profilEntrep');
            exit();
        }
    }

    $erreurs = [
        'email' => "",
        'motDePasse' => ""
    ];

    if (isset($_POST['login'])) {
        if (empty($_POST['email'])) {
            $erreurs['email'] = "Veuillez entrer un email pour vous connecter";
        } else {
            $email = $_POST['email'];
            $motDePasse = $_POST['motDePasse'];
            $utilis = trouverUtilis($email);
            $petiteEntrep = trouverEntrep($email);

            if ($utilis && password_verify($motDePasse, $utilis['motDePasseUtilis'])) {
                session_start();
                $_SESSION['id'] = $utilis['idUtilis'];
                $_SESSION['profil'] = 'Utilis';
                header('Location: index.php?action=profilUtilis');
                exit();
            } elseif ($petiteEntrep && password_verify($motDePasse, $petiteEntrep['motDePasseEntrep'])) {
                session_start();
                $_SESSION['id'] = $petiteEntrep['idEntrep'];
                $_SESSION['profil'] = 'Entrep';
                header('Location: index.php?action=profilEntrep');
                exit();
            } else {
                if (!$petiteEntrep && !$utilis) {
                    $erreurs['email'] = "Cet email n'existe pas";
                } else {
                    $erreurs['motDePasse'] = "Mot de passe incorrect";
                }
            }
        }
    }

    render('login', ['erreurs' => $erreurs]);
}

// sign up
function signup(){
    if (isset($_SESSION['id'])) {
        if ($_SESSION['profil'] === 'Utilis') {
            header('Location: index.php?action=profilUtilis');
            exit();
        } elseif ($_SESSION['profil'] === 'Entrep') {
            header('Location: index.php?action=profilEntrep');
            exit();
        }
    }

    $erreurs = [
        'nom' => "",
        'prenom' => "",
        'email' => "",
        'secteur' => "",
        'taille' => "",
        'adresse' => "",
        'motDePasse' => "", 
        'confirmerMotDePasse' => ""
    ];

    // signUp personne 
    if(isset($_POST['signUpUtilis'])){
        // utilisateur personne
        if(empty($_POST['nom'])){
            $erreurs['nom'] = "Veuillez entrer votre nom";
        } else {
            $nom = $_POST['nom'];
        }

        if(empty($_POST['prenom'])){
            $erreurs['prenom'] = "Veuillez entrer votre prénom";
        } else {
            $prenom = $_POST['prenom'];
        }

        if(empty($_POST['email'])){
            $erreurs['email'] = "Veuillez entrer votre email";
        } else {
            $existUtilis = trouverUtilis($_POST['email']);
            $existEntrep = trouverEntrep($_POST['email']);
            if($existUtilis || $existEntrep){
                $erreurs['email'] = "Cet e-mail existe déjà. Veuillez utiliser un autre e-mail ou vous connecter avec votre compte existant.";
            }else{
               $email = $_POST['email']; 
            }  
        }

        if(empty($_POST['motDePasse'])){
            $erreurs['motDePasse'] = "Veuillez entrer un mot de passe";
        } elseif(strlen($_POST['motDePasse']) < 8) {
            $erreurs['motDePasse'] = "Le mot de passe doit contenir au moins 8 caractères";
        } else {
            $motDePasse = $_POST['motDePasse'];
        }

        if(empty($_POST['confirmerMotDePasse'])){
            $erreurs['confirmerMotDePasse'] = "Veuillez confirmer votre mot de passe";
        } elseif($_POST['motDePasse'] !== $_POST['confirmerMotDePasse']) {
            $erreurs['confirmerMotDePasse'] = "Les mots de passe ne correspondent pas";
        }

        if(!array_filter($erreurs)){
            creerUtilis($nom, $prenom, $email, password_hash($motDePasse, PASSWORD_DEFAULT));
            render('login');
        }
    } 

    // utilisateur petite entreprise
    if (isset($_POST['signUpEntrep'])) {
        $erreurs = [];

        if (empty($_POST['nom'])) {
            $erreurs['nom'] = "Le nom de l'entreprise est requis.";
        } else {
            $nom = $_POST['nom'];
        }

        if (empty($_POST['adresse'])) {
            $erreurs['adresse'] = "L'adresse est requise.";
        } else {
            $adresse = $_POST['adresse'];
        }

        if (empty($_POST['secteur'])) {
            $erreurs['secteur'] = "Le secteur d'activité est requis.";
        } else {
            $secteur = $_POST['secteur'];
        }

        if (empty($_POST['taille'])) {
            $erreurs['taille'] = "La taille de l'entreprise est requise.";
        } elseif ($_POST['taille'] > 50) {
            $erreurs['taille'] = "La taille de l'entreprise dépasse la limite pour être considérée comme une petite entreprise.";
        } else {
            $taille = $_POST['taille'];
        }

        $existEntrep = trouverEntrep($_POST['email']);
        $existUtilis = trouverUtilis($_POST['email']);
        if (empty($_POST['email'])) {
            $erreurs['email'] = "L'email est requis.";
        } elseif ($existEntrep || $existUtilis) {
            $erreurs['email'] = "Cet email est déjà utilisé.";
        } else {
            $email = $_POST['email'];
        }

        if (empty($_POST['motDePasse'])) {
            $erreurs['motDePasse'] = "Le mot de passe est requis.";
        } elseif (strlen($_POST['motDePasse']) < 8) {
            $erreurs['motDePasse'] = "Le mot de passe doit comporter au moins 8 caractères.";
        } elseif (empty($_POST['confirmerMotDePasse'])) {
            $erreurs['confirmerMotDePasse'] = "La confirmation du mot de passe est requise.";
        } elseif ($_POST['confirmerMotDePasse'] != $_POST['motDePasse']) {
            $erreurs['confirmerMotDePasse'] = "Les mots de passe ne correspondent pas.";
        } else {
            $motDePasse = $_POST['motDePasse'];
        }

        if (!array_filter($erreurs)) {
            creerEntrep($nom, $secteur, $taille, $adresse, $email, password_hash($motDePasse, PASSWORD_DEFAULT));
            render('login');
        }
    }

    render('signup', ['erreurs' => $erreurs]);
}

// log out 
if(isset($_POST['deconnecter'])){
    session_destroy(); 
    unset($_SESSION['id']); 
    header('Location: index.php?action=login');
    exit();
}

// profil
function profil(){
    if(isset($_SESSION['id'])){
        if($_SESSION['profil'] === 'Utilis'){
            render('profilUtilis');
        } elseif($_SESSION['profil'] === 'Entrep'){
            header('Location: index.php?action=profilEntrep');
        } else {
            header('Location: index.php?action=login');
        }
    } else {
        header('Location: index.php?action=login');
    }
}

function render($view, $data = []) {
    extract($data);
    require __DIR__ . '/../view/' . $view . '.php'; 
}
