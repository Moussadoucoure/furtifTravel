<?php
$titre = "FurtifTravel";
require "header.php";
?>

<div class="contenaire-recherche">

    <section id="contenu">
        <h2>Recherche avancée</h2>

        <div id="recherche-avancee">
            <form action="traitement-recherche-avancee.php" method="get">
                <div class="mb-3">
                  <label for="recherche-nom" class="form-label">Prénom</label>
                  <input type="text" class="form-control" id="recherche-nom" name="recherche-nom">
                </div>
                <div class="mb-3">
                  <label for="recherche-poste" class="form-label">Poste</label>
                  <input type="text" class="form-control" id="recherche-poste" name="recherche-poste">
                </div>
                <div class="mb-3">
                  <label for="recherche-description" class="form-label">Description</label>
                  <input type="text" class="form-control" id="recherche-description" name="recherche-description">
                </div>
                <button type="submit" class="btn-recherche">Recherche</button>
            </form>
        </div>


    </section>

</div>
<?php
require "footer.php";
?>
