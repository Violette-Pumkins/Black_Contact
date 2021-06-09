<?php
    //initialisation variables
    $date=NULL;
    $formatdepage=NULL;
    $prix=NULL;

    if (isset($_POST['date'])) {
        $date = $_POST['date'];
    }
    if (isset($_POST['formatdepage'])) {
        $formatdepage = $_POST['formatdepage'];
    }
    if (isset($_POST['prix'])) {
        $prix = $_POST['prix'];
    }
?>
<div class="container-sm mt-4">
    <input type="hidden" name="action" value="ajouterbdc">
    <label class="form-check-label mb-4">
                Ajoutez un bon de commande:
            </label>
        <form class="form-inline">
        <div class="form-group row">
            <label for="example-date-input" class="col-2 col-form-label">Date</label>
            <div class="col-6">
                <input class="form-control" type="date" value="2011-08-19" name="date">
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
            <div class="mt-4">
            <button type="submit" class="btn btn-primary mb-2">Ajouter</button>
            </div>
        </form>
    </div>