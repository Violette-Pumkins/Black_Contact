<?php
    require('entity/Partenaire.class.php');
    require('entity/Catbdc.class.php');
    //initialisation variables
    $date=NULL;
    $formatdepage=NULL;
    $prix=NULL;
    $catbdc=NULL;

    if (isset($_POST['date'])) {
        $date = $_POST['date'];
    }
    if (isset($_POST['formatdepage'])) {
        $formatdepage = $_POST['formatdepage'];
    }
    if (isset($_POST['prix'])) {
        $prix = $_POST['prix'];
    }
    if (isset($_POST['catbdc'])) {
        $catbdc = $_POST['catbdc'];
    }
    if (isset($_POST['part'])) {
        $part = $_POST['part'];
    }
    $r=CatbdcController::afficherListeCatBdc();
    
    $catbdcs=array();
    
    foreach($r as $catbdc){
        // var_dump($catbdc);
        //remplit le tb par mon objet
        $catbdcs[]= new Catbdc($catbdc['identifiant_categorie_bon_de_commande'], $catbdc['libelle_categorie_bon_de_commande'], $catbdc['repetition']);
        
    }
    $a=PartenaireController::afficherListepart();
    $parts=array();
    foreach($a as $part){
        // var_dump($part);
        //remplit le tb par mon objet
        $parts[]= new PARTENAIRE($part['identifiant_partenaire'], $part['nom_partenaire'], $part['adresse_partenaire']);
    }
?>
<div class="container-sm mt-4">
    <input type="hidden" name="action" value="ajouterbdc">
    <label class="form-check-label mb-4">
                Ajoutez un bon de commande:
            </label>
        <form class="form-inline" action="index.php?action=ajouterbdc" method="POST">
        <div class="form-group row">
            <label for="example-date-input" class="col-2 col-form-label">Date</label>
            <div class="col-6">
                <input class="form-control" type="date" value="2019-01-01" name="date">
            </div>
        </div>
            <label class="form-check-label mb-2">
                Format de page
            </label>
            <div class="form-group-sm col-6 mb-2">
                <input type="text" class="form-control" name="formatdepage" <?php
                    if (isset($_POST['formatdepage'])) {
                    echo "is-valid";
                    }?>>
            </div>
            <label class="form-check-label mb-2">
                Prix du bon de commande
            </label>
            <div class="form-group-sm col-6 mb-2">
                <input class="form-control" type="number" value="0" name="prix"  <?php
                    if (isset($_POST['prix'])) {
                    echo "is-valid";
                    }?>>
            </div>
            <div class="form-group-sm col-6 mb-2">
                <label class="form-check-label mb-2 mr-2">
                    Partenaire associé
                </label>
                <select class="selectpicker" data-live-search="true" data-width="fit" name="idpartenaire">
                    <?php foreach ($parts as $part) {
                            echo ('<option selected value="' . $part->getIDPART() . '">' . $part->getNOMPART() . '</option>');
                        }
                    ?>
                </select>
            </div>
            <div class="form-group-sm col-6 mb-2">
                <label class="form-check-label mb-2 mr-2">
                    Catégorie bon de commande
                </label>
                <select class="selectpicker" data-live-search="true" data-width="fit" name="idcatbdc">
                    <?php foreach ($catbdcs as $catbdc) {
                            echo ('<option selected value="' . $catbdc->getIDCATBDC() . '">' . $catbdc->getLIBCATBDC() . '</option>');
                        }
                    ?>
                </select>
            </div>
                        <?php
                        // if($catbdc){

                        // }
                        ?>
            <div class="mt-4">
            <button type="submit" class="btn btn-primary mb-2">Ajouter</button>
            </div>
        </form>
    </div>