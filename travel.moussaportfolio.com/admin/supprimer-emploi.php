<?php

$noEmploi = filter_var($_GET['detail'], FILTER_SANITIZE_SPECIAL_CHARS);

include "../basededonnees.php";

$SQL_emploi = "SELECT * FROM `emploi` WHERE noEmploi = :id";

$requeteemploi = $basededonnees->prepare($SQL_emploi);

$requeteemploi->bindParam(':id', $noEmploi, PDO::PARAM_INT);

$requeteemploi->execute();
$emploi = $requeteemploi->fetch();

$titre = "Panneau d'administration";
require "header.php";

?>






















































<








        </form>
    </div>
</div>
<?php
require "../footer.php";