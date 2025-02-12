<?php

$titre = "Liste des employés";

?>

<div id="boite-membre">
    <div id="membre-pseudonyme">
        <label>Pseudonyme: </label>
        <span><?=$membre['pseudonyme']?></span>
    </div>
    <div id="membre-courriel">
        <label>Courriel: </label>
        <span><?=$membre['courriel']?></span>
    </div>
    <div id="membre-prenom">
        <label>Prénom: </label>
        <span><?=$membre['prenom']?></span>
    </div>
    <div id="membre-nom">
        <label>nom: </label>
        <span><?=$membre['nom']?></span>

    </div>
    <div id="membre-icone">
        <img src="images/<?=$membre['icone']?>" alt="image-icone">

</div>

