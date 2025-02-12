<?php
require "../config.php";

if (isset($_SESSION['membre']['pseudonyme'])) {
    // on détruit les variables de la session
    session_unset();
    // on détruit la session
    session_destroy();

    header('location: ../membre.php');

    exit();
} else {
    echo "vous n'etes pas connecter";
}
