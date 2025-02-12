<?php

$id_emploi = filter_var($_GET['detail'], FILTER_SANITIZE_SPECIAL_CHARS);

require "../config.php";
require CHEMIN_ACCESSEUR . "EmploiDAo.php";

$emploi = EmploiDAo::lireEmploi($id_emploi);

$titre = "Panneau d'administration";
require "header.php";
?>

<div class="hauteur">
    <h1>Liste employés</h1>
    <h2>Modifier</h2>

    <div id="liste-emploi">
        <form action="traitement-modifier-emploi.php" method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col-sm-3">
            <label for="nom">Nom</label>
              <input type="text" name="nom" class="form-control" id="nom" aria-label="First name" value="<?=$emploi['nom']?>">
            </div>
            <div class="col-sm-3">
            <label for="prenom">Prénom</label>
              <input type="text" name="prenom" class="form-control" id="prenom" aria-label="Last name" value="<?=$emploi['prenom']?>">
            </div>
        </div>
            <div class="col-sm-3">
            <label for="description">Description</label>
                <input class="form-control" name="description" id="description" value="<?=$emploi['description']?>"><br>
            </div>

            <div class="col-sm-3">
            <label for="poste">Poste</label>
                 <input type="text" name="poste" class="form-control" id="poste" aria-label="Last name" value="<?=$emploi['poste']?>"><br>
            </div>
            <div class="col-sm-3">
                <input type="file"  name="photo" class="form-control" aria-label="photo"><br>
            </div>

            <div class="col-auto">
                <button type="submit" name="id_emploi"  class="btn btn-primary" value="<?=$emploi['id_emploi']?>">Enregistré</button>
             </div>




        </form>
    </div>
</div>
<?php
require "../footer.php";