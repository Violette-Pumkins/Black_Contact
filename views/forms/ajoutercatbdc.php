<?php
    //initialisation variables
    $libcatbdc=NULL;
    $repet=false;

    if (isset($_POST['libcatbdc'])) {
        $libcatbdc = $_POST['libcatbdc'];
    }
    if (isset($_POST['repetition'])) {
        $repet = true;
    }
?>
    <div class="container-sm mt-4">
    <label class="form-check-label mb-2">
                Ajoutez une catégorie:
            </label>
        <form action="index.php?action=ajoutercatbdc" class="form-inline" method="POST">
            <div class="form-group-sm mb-2">
                <input type="text" class="form-control <?php
                                                        if (isset($_POST['libcatbdc'])) {
                                                        echo "is-valid";
                                                        }
                                                        ?>" name="libcatbdc" id="inputcatbdc" required>
            </div>

            <div class="mt-4">
            <label class="form-check-label">
                catégorie répétitive? (exemple: abonnement)
            </label>
            <div>
            </div>
            <input class="form-check-input" type="radio" name="repetition" value=1>
            <label class="form-check-label">
                Oui
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="repetition" value=0>
            <label class="form-check-label">
                Non
            </label>
            <div class="mt-4">
            <button type="submit" class="btn btn-primary mb-2">Ajouter</button>
            <input type="hidden" name="action" value="ajoutercatbdc">
            </div>
        </form>
    </div>