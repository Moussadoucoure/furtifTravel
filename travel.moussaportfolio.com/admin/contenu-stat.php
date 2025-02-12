<?php

require_once CHEMIN_ACCESSEUR . "EmploiDAo.php";
$contenus = EmploiDAo::calculerContenu();
$listeCategories = EmploiDAo::listerCategories();
?>

<div class="graphe">
    <div class="chart-container">
        <canvas id="pieChart"></canvas>
    </div>
    <script>
        <?php
$listeDeCategorie = [];
foreach ($listeCategories as $categorie) {
    $listeDeCategorie[] = $categorie['categorie'];
    $categorieParNombre[] = $categorie['nombre'];

}
?>
        let labelLine = <?=json_encode($listeDeCategorie)?>;
        let dataLine = <?=json_encode($categorieParNombre)?>;

    </script>
    <script src="js/script-stats.js"></script>
</div>