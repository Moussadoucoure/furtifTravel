<?php
require "../config.php";
require_once CHEMIN_ACCESSEUR . "EmploiDAo.php";

$titre = "traitement modifier";
require "header.php";

$FILTRE_EMPLOI = array(
    'id_emploi' => FILTER_SANITIZE_NUMBER_INT,
    'nom' => FILTER_SANITIZE_SPECIAL_CHARS,
    'prenom' => FILTER_SANITIZE_SPECIAL_CHARS,
    'description' => FILTER_SANITIZE_SPECIAL_CHARS,
    'poste' => FILTER_SANITIZE_SPECIAL_CHARS,
);

$emploi = filter_input_array(INPUT_POST, $FILTRE_EMPLOI);
$emploi['nom'] = addslashes($emploi['nom']);
$emploi['prenom'] = addslashes($emploi['prenom']);

$photo = $_FILES['photo']['name'];

$repertoire_photo = "../images/";

$fichierDestination = $repertoire_photo . basename($_FILES['photo']['name']);
$fichierSource = $_FILES['photo']['tmp_name'];
$extensionFichier = strtolower(pathinfo($fichierDestination, PATHINFO_EXTENSION));

if ($_FILES['photo']['size'] > 5000000) {
    echo ("L'image est trop volumineuse.");

} else if ($extensionFichier != "jpg" && $extensionFichier != "jpeg" && $extensionFichier != "svg" && !empty($fichierSource)) {
    echo ("Veuillez ajouter un format d'image valide");
} else {

    if (empty($fichierSource)) {
        $reussiteModification = EmploiDAo::modifierEmploiSansPhoto($emploi);

    } else {
        $reussiteModification = EmploiDAo::modifierEmploi($emploi, $photo);
    }

    if ($reussiteModification) {
        ?>
        <p>Vous avez modifié un employé à la base de données</p>


        <?php
} else {
        echo "Votre modification a échoué";
    }
}

require "../footer.php";
?>



