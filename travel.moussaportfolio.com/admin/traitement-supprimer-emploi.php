<?php
require "../config.php";
require CHEMIN_ACCESSEUR . "EmploiDAo.php";

$titre = "traitement supprimer";

$id = $_POST['id_emploi'];
$reussiteSuppression = EmploiDAo::supprimerEmploi($id);

if ($reussiteSuppression) {
    ?>
    <p>Vous avez supprimé un employé de la base de données</p>
    <?php

} else {
    echo "Votre suppression a échoué";
}

require "../footer.php";
?>



