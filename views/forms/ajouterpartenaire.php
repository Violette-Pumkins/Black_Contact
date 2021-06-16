<?php
//initialisation variables
    $nompart = NULL;
    $adressepart = NULL;

    if (isset($_POST['nompart'])) {
        $nompart = $_POST['nompart'];
    }
    if (isset($_POST['adressepart'])) {
        $adressepart = $_POST['adressepart'];
    }
    if (isset($_POST['idcatpart'])) {
        $adressepart = $_POST['idcartpart'];
    }

//liste select
    require('entity/Catpart.class.php');
// créer un tb vide
    $r = CatpartController::afficherListeCatPart();

    // foreach ($r as $lignes) {
    //     // var_dump($catpart);
    //     //remplit le tb par mon objet
    //     $catpart = new Catpart(
    //         $lignes['identifiant_categorie_partenaires'], 
    //         $lignes['libelle_categorie_partenaire']);
    // }
?>
<div class="container-sm mt-4">
    <input type="hidden" name="action" value="ajouterpart">
    <label class="form-check-label mb-4">
        Ajoutez un partenaire:
    </label>
    <form class="form-inline" method="POST" action="index.php?action=ajouterpart">
        <label class="form-check-label mb-2">
            Nom du partenaire
        </label>
        <div class="form-group-sm col-6 mb-2">
            <input type="text" class="form-control" name="nompart" <?php
                if (isset($_POST['nompart'])) {
                    echo "is-valid";
                } ?>>
        </div>
        <label class="form-check-label mb-2">
            Adresse du Partenaire
        </label>
        <div class="form-group-sm col-6 mb-2">
            <input type="text" class="form-control" name="adressepart" <?php
                if (isset($_POST['adressepart'])) {
                    echo "is-valid";
                } ?>>
        </div>
        <div class="form-group-sm col-6 mb-2">
            <label class="form-check-label mb-2 mr-2">
                Catégorie Partenaire
            </label>
            <select class="selectpicker" data-live-search="true" data-width="fit" name="idpartenaire" multiple>
                <?php  foreach ($r as $lignes) {
                    $catpart = new Catpart(
                    $lignes['identifiant_categorie_partenaires'], 
                    $lignes['libelle_categorie_partenaire']);
                    echo ('<option value="' . $catpart->getIDCATPART() . '">' . $catpart->getLIBCATPART() . '</option>');
                }
                ?>
            </select>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary mb-2">Ajouter</button>
        </div>
    </form>
</div>