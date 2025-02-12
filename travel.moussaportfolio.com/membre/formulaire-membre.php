<form action="membre/traitement-authentification.php" method="post">
    <div class="membre-form">

        <div class="col-sm-3">
        <label for="pseudonyme">Pseudonyme</label>
             <input type="text" name="pseudonyme" class="form-control" placeholder="pseudonyme" aria-label="First name">
        </div>

        <div class="col-sm-3">
        <label for="motdepasse">Mot de passe</label>
             <input type="password" name="motdepasse" class="form-control" placeholder="motdepasse" aria-label="passwordHelpBlock">
        </div>

        <div class="col-auto">
            <button type="submit" name="membre-authentification" value="Envoyer " class="btn btn-primary">Connexion</button>
        </div>

        <span id="erreur">
            <?php if (!empty($_SESSION['erreur'])) {
    echo $_SESSION['erreur'];
    unset($_SESSION['erreur']);
}
?>
                    </span>
    </div>
</form>
