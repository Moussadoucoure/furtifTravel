<?php
require "../config.php";

require CHEMIN_ACCESSEUR . "MembreDAo.php";

ob_start();

if (isset($_POST['membre-authentification'])) {
    $filtreMembre = array();
    $filtreMembre['pseudonyme'] = FILTER_SANITIZE_SPECIAL_CHARS;
    $filtreMembre['motdepasse'] = FILTER_SANITIZE_ENCODED;
    $membre = filter_input_array(INPUT_POST, $filtreMembre);

    $membreTrouve = MembreDAo::trouverMembre($membre);

    if (password_verify($membre['motdepasse'], $membreTrouve['motdepasse'])) {
        $_SESSION['membre'] = array();
        $_SESSION['membre']['pseudonyme'] = $membreTrouve['pseudonyme'];
        $_SESSION['membre']['courriel'] = $membreTrouve['courriel'];
        $_SESSION['membre']['prenom'] = $membreTrouve['prenom'];
        $_SESSION['membre']['nom'] = $membreTrouve['nom'];
        $_SESSION['membre']['icone'] = $membreTrouve['icone'];

    } else {
        $_SESSION['erreur'] = "Votre pseudonyme ou votre mot de passe est invalide";

    }

    header('location: ../membre.php');

    ob_end_flush();
}
