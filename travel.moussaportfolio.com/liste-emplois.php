<?php
require "config.php";
require CHEMIN_ACCESSEUR . "EmploiDAo.php";
require CHEMIN_ACCESSEUR . "ClicDAo.php";

$listeEmploi = EmploiDAo::listerEmploi();

ClicDAo::enregistrerVisite($_SERVER);

$titre = "FurtifTravel";

require 'header.php';

?>

    <h2>Liste des employés</h2><br>
    <div id="liste-emploi">
        <?php
foreach ($listeEmploi as $emploi) {?>
            <div class="emploi">
                <div class="images"><img src="images/<?=$emploi['photo']?>" alt="photo" class="photo"></div>

                <h3 class="prenom"><?=$emploi['prenom']?></h3>
                <p class="poste"><?=$emploi['poste']?></p>
                <p class="description"><?=$emploi['description']?></p>
                <a class="btn btn-success btn-block boutou" href="emploi.php?detail=<?=$emploi['id_emploi']?>">Détail</a>


            </div>

            <?php

}
?>
    </div>

<?php
require 'footer.php';
