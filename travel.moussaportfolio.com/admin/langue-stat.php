<?php

require_once CHEMIN_ACCESSEUR . "ClicDAo.php";
$listeParLangue = ClicDAo::listerStatsParLangue();
?>

<div class="graphe">
<div class="chart-container">
    <canvas id="lineChart2"></canvas>
</div>
<script>

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
</div>
