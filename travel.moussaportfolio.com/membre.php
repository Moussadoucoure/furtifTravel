<?php
require "config.php";
require CHEMIN_ACCESSEUR . "MembreDAo.php";

$titre = "FurtifTravel";
require 'header.php';
?>

<div class="membre-container">
    <?php if (empty($_SESSION['membre']['pseudonyme'])) { ?>

        <?php include_once "membre/formulaire-membre.php"; ?>
        <div class="action-buttons">
            <a href="membre/inscription-identification.php" class="btn-action">Créer un compte</a>
        </div>

    <?php } else {

        $membre = MembreDAo::lireMembreParPseudonyme($_SESSION['membre']['pseudonyme']);
        include_once "membre/vue-membre-detail.php";
    ?>

        <div class="action-buttons">
            <a href="membre/deconnexion.php" class="btn-action">Se déconnecter</a>
            <a href="membre/modifier-compte.php" class="btn-action">Modifier le compte</a>
        </div>

    <?php } ?>
</div>

<?php require "footer.php"; ?>
