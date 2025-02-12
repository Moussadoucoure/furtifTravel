<?php
require "../config.php";
require CHEMIN_ACCESSEUR . "MembreDAo.php";

if (isset($_POST['inscription-information']) && !empty($_POST['inscription-information'])) {

    $filterMembre = array(

        'motdepasse' => FILTER_SANITIZE_ENCODED,
        'motdepasse2' => FILTER_SANITIZE_ENCODED,
        'pseudonyme' => FILTER_SANITIZE_SPECIAL_CHARS,
    );

    $nouveauMembre = filter_input_array(INPUT_POST, $filterMembre);

    $icone = $_FILES['icone']['name'];

    $repertoire_photo = "../images/";

    $fichierDestination = $repertoire_photo . basename($_FILES['icone']['name']);
    $fichierSource = $_FILES['icone']['tmp_name'];
    $extensionFichier = strtolower(pathinfo($fichierDestination, PATHINFO_EXTENSION));

    if ($_FILES['icone']['size'] > 5000000) {
        echo ("L'image est trop volumineuse.");

    } else if ($extensionFichier != "jpg" && $extensionFichier != "jpeg" && $extensionFichier != "svg" && $extensionFichier != "webp" && $extensionFichier != "png") {
        echo ("Veuillez ajouter un format d'image valide");
    }

    if (empty($_POST['motdepasse']) || $_POST['motdepasse'] != $_POST['motdepasse2']) {
        $_SESSION['erreur2'] = "Vos mots de passe doivent etre identique";
        header('location: inscription-information.php');
    }

    if (empty($_POST['pseudonyme']) || !preg_match('/^[A-Za-z0-9]+([A-Za-z0-9]*|[._-]?[A-Za-z0-9]+)*$/', $_POST['pseudonyme'])) {
        $_SESSION['erreur2'] = "Vos mots de passe doivent etre identique";
        header('location: inscription-information.php');
    } else {
        $membre = MembreDAo::lireMembreParPseudonyme($_POST['pseudonyme']);
    }
    if ($membre) {
        $_SESSION['erreur2'] = "Votre pseudo est deja utilisé";
        header('location: inscription-information.php');
    }

    if (empty($_SESSION['erreur2'])) {
        $_SESSION['membre']['pseudonyme'] = $nouveauMembre['pseudonyme'];

        $_SESSION['membre']['motdepasse'] = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);

        $_SESSION['membre']['icone'] = $icone;

        if (move_uploaded_file($fichierSource, $fichierDestination)) {

            $reussiteInscription = MembreDAo::enregistrerMembre($_SESSION['membre'], $icone);
        }

        if ($reussiteInscription) {
            header('location: ../membre.php');
        }
    }
}
