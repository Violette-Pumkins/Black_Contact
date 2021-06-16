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
            require('views/forms/ajoutercatbdc.php');
            require('views/listecatbdc.php');
            require('views/footer.php');
            break;
        case 'listecatpart':
            require('views/header.php');
            require('views/forms/ajoutercatpart.php');
            require('views/listecatpart.php');
            require('views/footer.php');
            break;
        case 'listebdc':
            require('views/header.php');
            require('views/forms/ajouterbondecommande.php');
            require('views/listebdc.php');
            require('views/footer.php');
            break;
        case 'listecontact':
            require('views/header.php');
            require('views/forms/ajoutercontact.php');
            require('views/listecontact.php');
            require('views/footer.php');
            break;
        case 'listepart':
            require('views/header.php');
            require('views/forms/ajouterpartenaire.php');
            require('views/listepart.php');
            require('views/footer.php');
            break;
        case 'ajoutercatbdc':
            if ($_GET['action'] = 'ajoutercatbdc') {
                
                $libcatbdc = trim(isset($_POST['libcatbdc'])) ? trim($_POST['libcatbdc']) : null;
                // var_dump($libcatbdc);
                // var_dump("index l:55");
                $repet = isset($_POST['repetition']) ? 1 : 0;
                var_dump($repet);
            }
                $coderetour=CatbdcController::ajoutercatbdc($libcatbdc, $repet);
                // var_dump("index l:59");
                if ($coderetour) {
                    header('Location: index.php?action=listecatbdc');
                    // var_dump("index l:62");
                    // TODO : : penser a changer URL.
                    exit();
                    $_SESSION['Success'] = "L'ajout de la catégorie est réussie";
                    // Route('listejure');
                    break;
                }
                else{
                    $_SESSION['Erreur']="L'ajout à été problématique";
                    // TODO: changer le msg
                }
    
                break;
        case 'ajoutercatpart':
            if ($_GET['action'] = 'ajoutercatpart') {
                
                $libcatpart = trim(isset($_POST['libcatpart'])) ? trim($_POST['libcatpart']) : null;
                var_dump($libcatpart);
            }
                $coderetour=CatpartController::ajoutercatpart($libcatpart);
                if ($coderetour) {
                    header('Location: index.php?action=listecatpart');
                    // var_dump("index l:62");
                    // TODO : : penser a changer URL.
                    exit();
                    $_SESSION['Success'] = "L'ajout de la catégorie est réussie";
                    // Route('listejure');
                    break;
                }
                else{
                    $_SESSION['Erreur']="L'ajout à été problématique";
                    // TODO: changer le msg
                }
    
                break;
        case 'ajouterpart':
            if ($_GET['action'] = 'ajouterpart') {
                
                $nompart = trim(isset($_POST['nompart'])) ? trim($_POST['nompart']) : null;
                $adressepart = trim(isset($_POST['adressepart'])) ? trim($_POST['adressepart']) : null;
            }
                $coderetour=PartenaireController::ajouterpart($nompart, $adressepart);
                if ($coderetour) {
                    header('Location: index.php?action=listepart');
                    // var_dump("index l:62");
                    // TODO : : penser a changer URL.
                    exit();
                    $_SESSION['Success'] = "L'ajout de la catégorie est réussie";
                    // Route('listejure');
                    break;
                }
                else{
                    $_SESSION['Erreur']="L'ajout à été problématique";
                    // TODO: changer le msg
                }
    
                break;
        case 'ajoutercontact':
            
            if ($_GET['action'] = 'ajoutercontact') {
                
                $mailcontact = trim(isset($_POST['mailcontact'])) ? trim($_POST['mailcontact']) : null;

                $nomcontact = trim(isset($_POST['nomcontact'])) ? trim($_POST['nomcontact']) : null;

                $idpartenaire = trim(isset($_POST['idpartenaire'])) ? trim($_POST['idpartenaire']) : null;
                // var_dump($idpartenaire);
            }
                $coderetour=ContactController::ajoutercontact($mailcontact, $nomcontact, $idpartenaire);
                if ($coderetour) {
                    header('Location: index.php?action=listecontact');
                    // var_dump("index l:62");
                    // TODO : : penser a changer URL.
                    exit();
                    $_SESSION['Success'] = "L'ajout de la catégorie est réussie";
                    // Route('listejure');
                    break;
                }
                else{
                    $_SESSION['Erreur']="L'ajout à été problématique";
                    // TODO: changer le msg
                }
    
                break;
        case 'ajouterbdc':
            if ($_GET['action'] = 'ajouterbdc') {

                
                $date = new DateTime($_POST['date']);
                $insert_date = $date->format('Y-m-d H:i:s');
                // var_dump($date);
                
                $formatdepage = trim(isset($_POST['formatdepage'])) ? trim($_POST['formatdepage']) : null;
                var_dump($formatdepage);
                $prix = trim(isset($_POST['prix'])) ? trim($_POST['prix']) : null;
                var_dump($prix);
                $catbdc = trim(isset($_POST['idcatbdc'])) ? trim($_POST['idcatbdc']) : null;
                var_dump($catbdc);
                $part = trim(isset($_POST['idpartenaire'])) ? trim($_POST['idpartenaire']) : null;
                var_dump($part);

                $coderetour=BdcController::ajouterbdc($insert_date, $formatdepage, $prix, $catbdc, $part);
                if ($coderetour) {
                    header('Location: index.php?action=listecbdc');
                    // var_dump("index l:62");
                    exit();
                    $_SESSION['Success'] = "L'ajout de la catégorie est réussie";
                    // Route('listejure');
                    break;
                }
                else{
                    $_SESSION['Erreur']="L'ajout à été problématique";
                    // TODO: changer le msg
                }
            }
                break;


    }


?>