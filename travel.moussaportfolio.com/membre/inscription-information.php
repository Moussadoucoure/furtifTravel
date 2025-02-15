<?php
require "../config.php";



if (isset($_POST['inscription-identification']) && !empty($_POST['inscription-identification'])) {
    $filtreMembre = array(
        'prenom' => FILTER_SANITIZE_SPECIAL_CHARS,
        'nom' => FILTER_SANITIZE_SPECIAL_CHARS,
        'courriel' => FILTER_SANITIZE_EMAIL,

    );
    $_SESSION['membre'] = filter_var_array($_POST, $filtreMembre);

    if (empty($_POST['prenom']) || empty($_POST['nom'])) {

        $_SESSION['erreur'] = "Veuillez renseigner tous les champs !";
        header('location: inscription-identification.php');

    } else if (empty($_POST['courriel']) || !filter_var($_POST['courriel'], FILTER_SANITIZE_EMAIL)) {

        $_SESSION['erreur'] = "Courriel invalide !";
        header('location: inscription-identification.php');

    } else {

        require CHEMIN_ACCESSEUR . "MembreDAo.php";
        $membre = MembreDAo::trouverCourriel($_POST['courriel']);

        if ($membre) {
            $_SESSION['erreur'] = "Ce courriel est deja utilisé !";
            header('location: inscription-identification.php');
        }
    }
}
$titre = "Furtif Travel";
require "header.php";
?>
<link rel="stylesheet" href="styles/inscriptionInformation.css">

<h2>Inscription d'un membre - identification (2/2)</h2>

<span id ="erreur">
        <?php if (!empty($_SESSION['erreur2'])) {
    echo $_SESSION['erreur2'];
    unset($_SESSION['erreur2']);
}
?>
</span>

<form action="traitement-inscription.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Information</legend>

        <div class="form-group">
        <label for="pseudonyme">Pseudonyme</label>
        <input type="text" name="pseudonyme" id="pseudonyme">
        </div>

        <div class="form-group">
        <label for="motdepasse">Mot de passe</label>
        <input type="password"  name="motdepasse" id="motdepasse">
        </div>

        <div class="form-group">
        <label for="motdepasse2">Confirmer le mot de passe</label>
        <input type="password"  name="motdepasse2" id="motdepasse2">
        </div><br>

        <div class="form-group">
            <input type="file"  name="icone" class="form-control" aria-label="icone"><br>
        </div>
    </fieldset>
    <input type="submit" name="inscription-information" value="Enregistrer">
</form>
<?php
require "../footer.php";
