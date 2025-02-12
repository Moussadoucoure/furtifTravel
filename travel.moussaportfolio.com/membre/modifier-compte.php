<?php
require "../config.php";
require CHEMIN_ACCESSEUR . "MembreDAo.php";

$membre = MembreDAo::lireMembreParPseudonyme($_SESSION['membre']['pseudonyme']);

$titre = "Modication compte";

require "header.php";
?>

<div class="hauteur">
    <h2>Mon compte</h2>



    <form action="traitement-modifier-compte.php" method="post" enctype="multipart/form-data">

        <fieldset>
            <legend>identité</legend>
            <div>
            <label for="pseudonyme">Pseudonyme</label>
            <input type="text" name="pseudonyme" id="pseudonyme" value="<?=$membre['pseudonyme']?>">
            </div>
            <div>
            <label for="courriel">Courriel</label>
            <input type="text" name="courriel" id="courriel" value="<?=$membre['courriel']?>">
            </div>
            <div>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" value="<?=$membre['prenom']?>">
            </div>
            <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="<?=$membre['nom']?>">
            </div>
            <div class="col-sm-3">
                <input type="file"  name="icone" class="form-control" aria-label="icone"><br>
            </div>

            <input type="hidden" name="id" value="<?=$membre['id_membre']?>">
            <input type="submit" name="modification-identite" class="bouton" value="Sauvegarder">


        </fieldset>
</form>
<form action="traitement-modifier-compte.php" method="post">
        <fieldset>
            <legend>Sécurité</legend>

            <div>
                <label for="ancienMdp">Mot de passe actuel</label>
                <input type="password" name="ancienMdp" id="ancienMdp">
            </div>
            <span id ="erreur">
                <?php if (!empty($_SESSION['erreur'])) {
    echo $_SESSION['erreur'];
    unset($_SESSION['erreur']);
}
?>
    </span>
            <div>
                <label for="motdepasse">Nouveau mot de passe</label>
                <input type="password" name="motdepasse" id="motdepasse">
            </div>

            <div>
                <label for="motdepasse2">Confirmé nouveau mot de passe</label>
                <input type="password" name="motdepasse2" id="motdepasse2">
            </div>
            <span id ="erreur2">
                <?php if (!empty($_SESSION['erreur2'])) {
    echo $_SESSION['erreur2'];
    unset($_SESSION['erreur2']);
}
?>
    </span>

            <input type="hidden" name="pseudonyme" value="<?=$membre['pseudonyme']?>">
            <input type="submit" name="modification-securite" class="bouton" value="Sauvegarder">

        </fieldset>
        </form>
</div>