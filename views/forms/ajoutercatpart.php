<?php
    //initialisation variables
    $libcatpart=NULL;

    if (isset($_POST['libcatpart'])) {
        $libcatpart = $_POST['libcatpart'];
    }
?>
<div class="container-sm mt-4">
    <input type="hidden" name="action" value="ajoutercatpart">
    <label class="form-check-label mb-2">
                Ajoutez une catégorie:
            </label>
        <form class="form-inline">
            <div class="form-group-sm mb-2">
                <input type="text" class="form-control" name="libcatpart"  <?php
                                                        if (isset($_POST['libcatpart'])) {
                                                        echo "is-valid";
                                                        }?>>
            </div>
            <div class="mt-4">
            <button type="submit" class="btn btn-primary mb-2">Ajouter</button>
            </div>
        </form>
    </div>