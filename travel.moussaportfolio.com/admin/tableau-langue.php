<?php

require_once CHEMIN_ACCESSEUR . "ClicDAo.php";

?>

<div class= "liste-item">
    <table>
        <caption>Statistiques par langue </caption>
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
