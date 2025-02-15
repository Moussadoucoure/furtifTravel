<?php
require "config.php";
require CHEMIN_ACCESSEUR . "EmploiDAo.php";

$resultats = [];
$nomRecherche = $_GET['recherche-nom'];
$posteRecherche = $_GET['recherche-poste'];
$descriptionRecherche = $_GET['recherche-description'];

$resultats = EmploiDAo::rechercheAvanceeEmploi($nomRecherche, $posteRecherche, $descriptionRecherche);

$titre = "Recherche avancée";
require "header.php";
?>

<div class="hauteur">

    <section id="contenu1">
        <h2>Résultats de recherche</h2>

        <div id="resultats-recherche">
            <?php
foreach ($resultats as $resultat) {?>
                <div class="resultat">
                    <div class="images"><img src="images/<?=$resultat['photo']?>" alt="photo" class="photo"></div>
                    <h3 class= "prenom"><?=$resultat['prenom']?></h3>
                    <p class="poste"><?=$resultat['poste']?></p>
                    <span class="description"><?=$resultat['description']?></span>

                </div>

                <?php

}
?>
        </div>
</section>
</div>
<?php
require "footer.php";
?>
