<?php

$titre = "Panneau d'administration";

require "header.php";

?>

<div class="hauteur">
    <h1>Emploi</h1>
    <h2>Ajouter un employé</h2>

    <div id="liste-emploi">
    <form action="traitement-ajouter-emploi.php" method="post" enctype="multipart/form-data">

        <div class="col-sm-3">
             <input type="text" name="nom" class="form-control" placeholder="Nom" aria-label="First name"><br>
        </div>
        <div class="col-sm-3">
            <input type="text" name="prenom" class="form-control" placeholder="Prénom" aria-label="Last name"><br>
        </div>
        <div class="col-sm-3">
            <input type="text" name="description" class="form-control" placeholder="Description" aria-label="Description"><br>
        </div>
        <div class="col-sm-3">
             <input type="text" name="poste" class="form-control" placeholder="Poste" aria-label="Poste"><br>
         </div>
        <div class="col-sm-3">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control"  aria-label="photo"><br>
        </div>

         <div class="col-auto">
             <button type="submit" class="btn btn-primary" >Enregistré</button>
            </div>

        </form>
    </div>
</div>
<?php
require "../footer.php";
