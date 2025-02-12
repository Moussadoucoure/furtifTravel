<?php
include "../config.php";
require CHEMIN_ACCESSEUR . "EmploiDAo.php";

$listeCategories = EmploiDAo::listerCategories();
$contenus = EmploiDAo::calculerContenu();
$ramdons = EmploiDAo::photoRamdon();

$titre = "Panneau d'administration";
require "header.php";
?>

<div class="liste-item">

    <table>
        <caption>Tableau statistiques des employés</caption>
        <tr>
            <th>Genre</th>
            <th>Nombre</th>
            <th>Minutes totales</th>
            <th>Duree maximun</th>
            <th>Duree minimal</th>
            <th>Duree moyennes</th>

        </tr>
        <?php
foreach ($listeCategories as $categorie) {
    ?>
            <tr>
                <td><?=$categorie['categorie']?></td>
                <td><?=$categorie['nombre']?></td>
                <td><?=$categorie['minutes_totales']?></td>
                <td><?=$categorie['duree_maximum']?></td>
                <td><?=$categorie['duree_minimum']?></td>
                <td><?=floor($categorie['duree_moyenne'])?></td>

            </tr>
            <?php
}
?>
    </table>

    <!-- Tableau ecart type -->
    <?php
foreach ($contenus as $contenu) {
    ?>
    <table>
    <tr>
        <td>Duree moyenne des employés:
            <?=floor($contenu['moyenne']) . "minutes"?>
            </td>

        <td>Écart-type:
        <?=round($contenu['ecart_type'], 1)?>
        </td>

        </tr>
        </table>
        <?php
}
?>

<?php
foreach ($ramdons as $ramdon) {
    ?>

<a href=""></a>
<?php
}
?>
<div>
    <div class="chart-container">
        <canvas id="pieChart"></canvas>
    </div>

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
<?php
require "../footer.php";
