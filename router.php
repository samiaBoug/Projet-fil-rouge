<?php
        require __DIR__ . '/controler/user.controler.php';
        require __DIR__ . '/controler/calculator.controler.php';

$action = $_GET['action'];

switch($action){
    case 'aboutUs':
        require __DIR__ . '/view/aboutUs.php';
        break;

    case 'home':
        require __DIR__ . '/view/home.php';
        break;
    case 'contact':
        require __DIR__ . '/view/contact.php';
        break;

    case 'calculeEmprinteCarbone':
        calculer();
        break;

    case 'login':
        login();
        break;

    case 'signup':
        signup();
        break;

    case 'profilUtilis':
       profil();
        break;
    case 'profilEntrep':
        profil();
        break;

    default: // add a default case to handle unknown actions
        http_response_code(404);
        require __DIR__ . '/view/404.php';
        break;
}