<?php

//appel fichier externes
function autoloadClassModel($class)
{
    require_once 'Controllers/' . $class . '.class.php';
}
spl_autoload_register('autoloadClassModel');

//initialisation variable
session_start();
$action = 'accueil';
// var_dump($_GET);
//gestion action
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

//effets des actions (traitements)
    switch ($action) {
        case 'accueil':
            require('views/header.php');
            require('views/accueil.php');
            require('views/footer.php');
            break;
        case 'listecatbdc':
            require('views/header.php');
            require('views/listecatbdc.php');
            require('views/footer.php');
            break;
        case 'listecatpart':
            require('views/header.php');
            require('views/listecatpart.php');
            require('views/footer.php');
            break;
        case 'listebdc':
            require('views/header.php');
            require('views/listebdc.php');
            require('views/footer.php');
            break;
    }


?>