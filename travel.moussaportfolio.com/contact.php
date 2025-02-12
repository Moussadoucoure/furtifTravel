<?php
$titre = "FurtifTravel";
require "header.php";
?>

<div id="contact">
    <h1>Nous contacter</h1>

    <?php include "traitement-contact.php"; ?>

    <form method="post">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" placeholder="Votre nom" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Votre email" required>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" placeholder="Votre message" rows="5" required></textarea>
        </div>

        <button type="submit" name="valider" value="Envoyer">Envoyer message</button>
    </form>
</div>

<?php require "footer.php"; ?>
