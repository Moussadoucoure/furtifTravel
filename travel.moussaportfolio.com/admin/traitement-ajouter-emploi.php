<?php
require "../config.php";
require_once CHEMIN_ACCESSEUR . "EmploiDAo.php";

$titre = "traitement";
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

} else if ($extensionFichier != "jpg" && $extensionFichier != "jpeg" && $extensionFichier != "svg" && $extensionFichier != "webp" && $extensionFichier != "png") {
    echo ("Veuillez ajouter un format d'image valide");
} else {

    if (move_uploaded_file($fichierSource, $fichierDestination)) {

        $reussiteAjout = EmploiDAo::ajouterEmploi($emploi, $photo);

        if ($reussiteAjout) {
            ?>
            <p>Vous avez ajouté un employé à la base de données</p>
        <?php
}
    } else {
        echo "Votre envoi a échoué";
    }
}
require "../footer.php";
?>



