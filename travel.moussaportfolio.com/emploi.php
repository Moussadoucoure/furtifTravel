<?php

require "config.php";
require CHEMIN_ACCESSEUR . "EmploiDAo.php";
require CHEMIN_ACCESSEUR . "ClicDAo.php";

$id_emploi = filter_var($_GET['detail'], FILTER_SANITIZE_SPECIAL_CHARS);

$emploi = EmploiDAo::lireEmploi($id_emploi);

ClicDAo::enregistrerVisite($_SERVER);

$titre = "FurtifTravel";
require "header.php";
?>
<div class="hauteur2">
<h1><?=$emploi['nom'] . " " . $emploi['prenom']?></h1>

<section id="contenu">
    <div class="emploi">
        <div class= "images" ><img class= "photo" src="images/<?=$emploi['photo']?>" alt="photo" ></div>
        <h3 class= "titre"><a href="liste-emplois.php?detail=<?=$emploi['id_emploi']?>"></a></h3>
        <span class="poste"><?=$emploi['poste']?></span>
        <p class="date"><?=$emploi['date']?></p>
        <p class="description"><?=$emploi['description']?></p>
    </div>
</section>
</div>
<?php require "footer.php";
