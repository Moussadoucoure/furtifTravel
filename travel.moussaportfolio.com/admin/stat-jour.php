<?php

require_once CHEMIN_ACCESSEUR . "ClicDAO.php";
$listeParJour = ClicDAO::listerStatsParJour();
?>

<div class="graphe">
<div class="chart-container">
<canvas id="lineChart"></canvas>
</div>

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
</script>

    <script src="js/script-visites.js"></script>
    </div>