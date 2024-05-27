<?php
require_once __DIR__ . '/../model/user.php';

//login  
function login(){
    if(isset($_POST['login'])){
        
        $erreur = [
            'email' => "",
            'motDePasse' => ""
        ];
        if(empty($_POST['email'])){
            $erreur['email'] = "entrer un email pour vous connecter";
        }else{
            $email = $_POST['email'];
            $motDePasse = $_POST['motDePasse'];
            $utilis = trouverUtilis($email);
            $petiteEntrep = trouverEntrep($email);
            if($utilis && password_verify($motDePasse , $utilis['motDePasseUtilis'])){
                session_start();
                $_SESSION['idUtilis'] = $utilis['id'];
                // header('Location:index.php?action=profil');

            }elseif($petiteEntrep && password_verify($motDePasse , $petiteEntrep['motDePasseEntrep'])){
                session_start();
                $_SESSION['idEntrep'] = $petiteEntrep['id'];
                // header('Location:index.php?action=profil');


            }else{
                 if(!$petiteEntrep && !$utilis){
                    $erreur['email'] = "ce email n'existe pas";
                 }else{
                    $erreur['motDePasse'] = "mot de passe est inncorrect";

                 }
            }


       
        }
    } else {
        render('login');
       
    }
}
//sign up

function signup(){
    if(isset($_POST['signUpUtilis'])){
        $erreur = [
            'nom' => "",
            'prenom' => "",
            'email' => "",
            'motDepasse' => "",
            'confirmerMotDePasse' => ""
        ];
        if(empty($_POST['nom'])){
            $erreur['nom'] = "";

        }else{
            $nom = $_POST['nom'];
        }

         if(empty($_POST['prenom'])){
            $erreur['prenom'] = "";

        }else{
            $prenom = $_POST['prenom'];
        }

         if(empty($_POST['email'])){
            $erreur['email'] = "";

        }else{
            $email = $_POST['email'];
        }
         if(empty($_POST['motDePasse'])){
            $erreur['motDePasse'] = "";

        }else{
            $motDePasse = $_POST['motDePasse'];
        }
         if(empty($_POST['confirmerMotDePasse'])){
            $erreur['confirmerMotDePasse'] = "";
         }
        if(!array_filter($erreur)){
            creerUtilis($nom, $prenom, $email, $motDePasse);
            render('login');
        }
    }else{
    render('signup');
}
}

//


//log out 

//
function render($view, $data = []) {
    extract($data);
    require __DIR__ . '/../view/' . $view . '.php'; // added / before view
}
