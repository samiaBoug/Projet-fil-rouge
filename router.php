<?php
        require __DIR__ . '/controler/user.controler.php';
        require __DIR__ . '/controler/calculator.controler.php';
        require __DIR__ . '/controler/admin.controler.php';

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

    case 'calculator':
        calucule();
        break;

    case 'login':
        login();
        break;

    case 'signup':
        signup();
        break;

    case 'profil':
        require __DIR__ . '/view/profil.php';
        break;

    default: // add a default case to handle unknown actions
        http_response_code(404);
        require __DIR__ . '/view/404.php';
        break;
  

}