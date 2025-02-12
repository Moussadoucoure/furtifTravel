<?php
require "../config.php";
require CHEMIN_ACCESSEUR . "MembreDAo.php";

if (isset($_POST['modification-identite']) && !empty($_POST['modification-identite'])) {

    $filterMembre = array(
        'pseudonyme' => FILTER_SANITIZE_SPECIAL_CHARS,
        'courriel' => FILTER_SANITIZE_SPECIAL_CHARS,
        'prenom' => FILTER_SANITIZE_SPECIAL_CHARS,
        'nom' => FILTER_SANITIZE_SPECIAL_CHARS,
        'id' => FILTER_SANITIZE_NUMBER_INT,

    );

    $identite = filter_input_array(INPUT_POST, $filterMembre);
    if (!empty($_FILES['icone']['name'])) {

        $icone = $_FILES['icone']['name'];

        $repertoire_photo = "../images/";

        $fichierDestination = $repertoire_photo . basename($_FILES['icone']['name']);
        $fichierSource = $_FILES['icone']['tmp_name'];
        $extensionFichier = strtolower(pathinfo($fichierDestination, PATHINFO_EXTENSION));

        if ($_FILES['icone']['size'] > 5000000) {
            $_SESSION['erreur2'] = "L'image est trop volumineuse.";

        } else if ($extensionFichier != "jpg" && $extensionFichier != "jpeg" && $extensionFichier != "svg" && $extensionFichier != "webp" && $extensionFichier != "png") {
            $_SESSION['erreur2'] = "Veuillez ajouter un format d'image valide";
        }

        if (move_uploaded_file($fichierSource, $fichierDestination)) {

            $reussiteInscription = MembreDAo::modifierIdentite($identite, $icone);
            header('location: ../membre.php');
        }

    } else {

        $_SESSION['membre']['pseudonyme'] = $identite['pseudonyme'];

        $_SESSION['membre']['pseudonyme'] = $identite['pseudonyme'];

        $reussiteInscription = MembreDAo::modifierIdentiteSansIcone($identite);

        header('location: ../membre.php');
    }

} else if (isset($_POST['modification-securite']) && !empty($_POST['modification-securite'])) {

    $filterMembre = array(
        'ancienMdp' => FILTER_SANITIZE_ENCODED,
        'motdepasse' => FILTER_SANITIZE_ENCODED,
        'motdepasse2' => FILTER_SANITIZE_ENCODED,
        'pseudonyme' => FILTER_SANITIZE_SPECIAL_CHARS,
    );

    $securite = filter_input_array(INPUT_POST, $filterMembre);

    if (empty($_POST['motdepasse']) || $_POST['motdepasse'] != $_POST['motdepasse2']) {
        $_SESSION['erreur2'] = "Vos mots de passe doivent etre identique";
        header('location: modifier-compte.php');
    }

    $ancienMdp = $_POST['ancienMdp'];
    $membreTrouve = MembreDAo::trouverMembre($_SESSION['membre']);

    if (password_verify($ancienMdp, $membreTrouve['motdepasse'])) {

        $_SESSION['membre']['pseudonyme'] = $membreTrouve['pseudonyme'];
        $_SESSION['membre']['icone'] = $membreTrouve['icone'];

    } else {
        $_SESSION['erreur'] = "Mot de passe invalide !";

        header('location: modifier-compte.php');
    }

    if (empty($_SESSION['erreur2'])) {

        $_SESSION['membre']['motdepasse'] = $securite['motdepasse'];
        $_SESSION['membre']['pseudonyme'] = $securite['pseudonyme'];

        $securite['motdepasse'] = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);

        $requeteModifierMembre = MembreDAo::modifierSecurite($securite);
        header('location: ../membre.php');
    }

}
