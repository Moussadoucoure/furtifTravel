<?php

require_once CHEMIN_ACCESSEUR . "ClicDAo.php";
$listeParJour = ClicDAo::listerStatsParJour();
$joursDeLaSemaine = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
?>

<div class= "liste-item">
    <table>
        <caption>Statistiques de la semaine </caption>
        <tr>
            <th>jour</th>
            <th>Clics</th>
            <th>Visites</th>
        </tr>
        <?php
foreach ($listeParJour as $jourEnregistre) {
    ?>
            <tr>
                <td><?=$joursDeLaSemaine[$jourEnregistre['jour'] - 1]?></td>
                <td><?=$jourEnregistre['clics']?></td>
                <td><?=$jourEnregistre['visites']?></td>
            </tr>
            <?php

}
?>

    </table>
    </div>
