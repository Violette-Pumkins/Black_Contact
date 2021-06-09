<?php
    //initialisation variables
    $mailcontact=NULL;
    $nomcontact=NULL;
    $nompartenaire=NULL;

    if (isset($_POST['mailcontact'])) {
        $mailcontact = $_POST['mailcontact'];
    }
    if (isset($_POST['nomcontact'])) {
        $nomcontact = $_POST['nomcontact'];
    }
    if (isset($_POST['nompartenaire'])) {
        $nompartenaire = $_POST['nompartenaire'];
    }
?>
    <div class="container-sm mt-4">
        <input type="hidden" name="action" value="ajoutercontact">
        <label class="form-check-label mb-4">
            Ajoutez un contact:
        </label>
        <form class="form-inline" method="POST">
            <label class="form-check-label mb-2">
                Adresse-Mail du contact
            </label>
            <div class="form-group-sm col-6 mb-2">
                <input type="mail" class="form-control" name="mailcontact"  <?php
                    if (isset($_POST['mailcontact'])) {
                        echo "is-valid";
                    }?>>
            </div>
            <label class="form-check-label mb-2">
                Nom du contact
            </label>
            <div class="form-group-sm col-6 mb-2">
                <input type="text" class="form-control" name="nomcontact"  <?php
                    if (isset($_POST['nomcontact'])) {
                        echo "is-valid";
                    }?>>
            </div>
            <label class="form-check-label mb-2">
                Nom du Partenaire
            </label>
            <div class="form-group-sm col-6 mb-2">
                <input type="text" class="form-control" name="nompartenaire"  <?php
                    if (isset($_POST['nompartenaire'])) {
                        echo "is-valid";
                    }?>>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary mb-2">Ajouter</button>
            </div>
        </form>
    </div>