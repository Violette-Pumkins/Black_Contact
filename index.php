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
    }


?>