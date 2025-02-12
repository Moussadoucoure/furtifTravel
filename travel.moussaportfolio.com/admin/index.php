<?php
require_once "../config.php";
$titre = "Panneau";
require 'header.php';
?>

<h1 class="sous-titre" >Dashboard</h1>
<div  class="row row-cols-1 row-cols-md-2 row-cols-lg-3"  >

        <div class="col">
            <div class="card h-100">
                <div class="card-body">

        <?php
require "contenu-stat.php";
?>

                    <a class="btn btn-success btn-block" href="contenu-stats.php">En savoir plus</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100">
                <div class="card-body">

                    <?php
require "langue-stat.php";
?>
                    <a class="btn btn-success btn-block" href="visite-stats.php">En savoir plus</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">

                    <h3 class="card-title">Chien de Furtif_Travel</h3>

                    <img class="avion" src="https://source.unsplash.com/random/900×700/?dogs" alt="chien">
                    <a class="btn btn-success btn-block" href="index.php">Voir autre chien</a>

                </div>
            </div>
        </div>

      </div>

      <div  class="row row-cols-1 row-cols-md-2 row-cols-lg-3"  >

        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-title">Avion de Furtif_Travel</h3>

                    <img class="avion" src="https://source.unsplash.com/random/900×700/?plane" alt="Avion">
                    <a class="btn btn-success btn-block" href="index.php">Voir autre avion</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">

                    <?php
require "tableau-semaine.php";
?>
                    <a class="btn btn-success btn-block" href="visite-stats.php">En savoir plus</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">

                    <?php
require "tableau-langue.php";
?>
                    <a class="btn btn-success btn-block" href="visite-stats.php">En savoir plus</a>
                </div>
            </div>
        </div>

      </div>


<!-- <a href="contenu-stats.php">Voir la page</a> -->
<!-- <img src="../images/graphe.jpg" alt="graphe"> -->
