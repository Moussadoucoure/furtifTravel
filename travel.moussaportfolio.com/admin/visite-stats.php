<?php
include "../config.php";
require CHEMIN_ACCESSEUR . "ClicDAo.php";

$listeParJour = ClicDAo::listerStatsParJour();

$listeParLangue = ClicDAo::listerStatsParLangue();

$joursDeLaSemaine = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
$titre = "panneau d'administration";
require "header.php";
?>

<div class= "liste-item">
    <table>
        <caption>Tableau statistiques par jour de la semaine </caption>
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


    <div class="chart-container">
        <canvas id="lineChart"></canvas>
    </div>


</div>

<div class= "liste-item">
    <table>
        <caption>Tableau statistiques par langue </caption>
        <tr>
            <th>langue</th>
            <th>Clics</th>
            <th>Visites</th>
        </tr>
        <?php

foreach ($listeParLangue as $langueEnregistre) {
    ?>
            <tr>
                <td><?=$langueEnregistre['langue']?></td>
                <td><?=$langueEnregistre['clics']?></td>
                <td><?=$langueEnregistre['visites']?></td>
            </tr>
            <?php

}
?>
    </table>

    <div class="chart-container">
        <canvas id="lineChart2"></canvas>
    </div>
    </div>



    <!-- graphique1 -->
    <script>
        <?php
$listeDeJour = [];
foreach ($listeParJour as $jour) {
    $listeDeJour[] = $joursDeLaSemaine[$jour['jour'] - 1];
    $nombreParJour[] = $jour['visites'];
}
?>
let labelLine = <?=json_encode($listeDeJour)?>;
let dataLine = <?=json_encode($nombreParJour)?>;

// graphique 2

<?php
$listeDeLangue = [];
foreach ($listeParLangue as $langue) {
    $listeDeLangue[] = $langue['langue'];
    $nombreParLangue[] = $langue['visites'];
}
?>
let labelLine2 = <?=json_encode($listeDeLangue)?>;
let dataLine2 = <?=json_encode($nombreParLangue)?>;
    </script>



    <script src="js/script-visites.js"></script>
    <?php
require "../footer.php";
