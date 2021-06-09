<?php
    //initialisation variables
    $nompart=NULL;
    $adressepart=NULL;

    if (isset($_POST['nompart'])) {
        $nompart = $_POST['nompart'];
    }
    if (isset($_POST['adressepart'])) {
        $adressepart = $_POST['adressepart'];
    }
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
            <div class="form-group-sm mb-2">
                <input type="text" class="form-control" name="nompart" <?php
                                                        if (isset($_POST['nompart'])) {
                                                        echo "is-valid";
                                                        }?>
                                                        >
            </div>
            <label class="form-check-label mb-2">
                Adresse du Partenaire
            </label>
            <div class="form-group-sm mb-2">
                <input type="text" class="form-control" name="adressepart"  <?php
                                                        if (isset($_POST['adressepart'])) {
                                                        echo "is-valid";
                                                        }?>>
            </div>
            <div class="mt-4">
            <button type="submit" class="btn btn-primary mb-2">Ajouter</button>
            </div>
        </form>
    </div>