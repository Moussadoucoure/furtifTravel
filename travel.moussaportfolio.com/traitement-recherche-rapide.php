<?php
require "config.php";
require CHEMIN_ACCESSEUR . "EmploiDAo.php";

$resultats = [];

if (!empty($_GET['mot'])) {
    $mot = $_GET['mot'];
    $resultats = EmploiDAo::rechercheRapideEmploi($mot);
}

$titre = "Employé";

require "header.php";
?>
<div class="hauteur2">

    <h2>Résultats de recherche</h2>
    <div id="resultat-recherche">
        <?php

foreach ($resultats as $resultat) {?>
    <div class="resultat">
        <div class="images"><img src="images/<?=$resultat['photo']?>" alt="photo" class="photo"></div>
        <h3 class= "prenom"><?=$resultat['prenom']?></h3>
        <p class="poste"><?=$resultat['poste']?></p>
        <span class="description"><?=$resultat['description']?></span>
        <a class="btn btn-success btn-block" href="resultat.php?detail=<?=$resultat['id_emploi']?>" class="boutou">Détail</a>
    </div>

    <?php

}
?>
</div>
</div>
<?php
require 'footer.php';
