<?php
require "../config.php";
require CHEMIN_ACCESSEUR . "ClicDAo.php";

$MESSAGE_SQL_LISTE_EMPLOI = "SELECT id_emploi, nom, prenom, poste, description, photo from emploi";

$requetelisteEmploi = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_LISTE_EMPLOI);

$requetelisteEmploi->execute();

$listeEmploi = $requetelisteEmploi->fetchAll();

$titre = "Liste des emploi";

require 'header.php';

?>

<div class="hauteur">

    <h2>Liste des employés</h2><br>
    <div class="liste-emploi">

    <div class="col-auto">
    <a href="ajouter-emploi.php" class="btn btn-primary" >Ajouter</a>
    </div>

        <?php
foreach ($listeEmploi as $emploi) {?>
        <div class="emploi">
            <div class="images"><img src="../images/<?=$emploi['photo']?>" alt="photo" class="photo"></div>


            <h3 class= "prenom"><?=$emploi['prenom']?></h3>
            <p class="poste"><?=$emploi['poste']?></p>
            <p class="descriptin"><?=$emploi['description']?></p>


            <div class="col-auto">
                <a href="modifier-emploi.php?detail=<?=$emploi['id_emploi']?>" class="btn btn-warning" >Modifier</a>
            </div>


            <div class="col-auto">
            <div class="liste-emploi">
       <form action="traitement-supprimer-emploi.php" method="post">
         <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@mdo">Supprimer</button>
         <div class="modal" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title">Supprimer un employé</h5>
               </div>
               <div class="modal-body">
                 <p>Vous etes sur de supprimer cet employé.</p>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Annulé</button>
                   <div class="col-auto">
                      <button type="submit" name="id_emploi"  class="btn btn-primary" value="<?=$emploi['id_emploi']?>">Supprimer</button>
                   </div>
               </div>
             </div>
             </div>
         </div>
       </form>
       </div>

             </div>



        </div>

        <?php

}
?>
    </div>
</div>
<?php
require '../footer.php';
