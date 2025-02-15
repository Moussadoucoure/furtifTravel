<?php
require "../config.php";

$titre = "Furtif Travel";

require "../header.php";
?>

<h2>Inscription d'un membre - identification (1/2)</h2>

<span id ="erreur">
    <?php if (!empty($_SESSION['erreur'])) {
    echo $_SESSION['erreur'];
    unset($_SESSION['erreur']);
    }
    ?>
</span>

<form action="inscription-information.php" method="post">
    <fieldset>
        <legend>identité</legend>
        <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom">
        </div>

        <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text"  name="nom" id="nom">
        </div>

        <div class="form-group">
        <label for="courriel">Courriel</label>
        <input type="email"  name="courriel" id="courriel">
        </div>
    </fieldset>
    <input type="submit" name="inscription-identification" value="Suivant">
</form>
<?php
require "../footer.php";
