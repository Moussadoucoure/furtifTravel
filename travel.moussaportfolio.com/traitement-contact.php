<?php

if (isset($_POST['valider'])) {
    if ((empty($_POST['nom'])) || (empty($_POST['email'])) || (empty($_POST['message']))) {
        echo "Veuillez renseigner tous les champs";
    } else {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $entete = 'MINE-VERSION: 1.0' . "\r\n";
        $entete .= 'Content-type: text/html; charset=utf-8 . "\r\n"';
        $entete .= 'From: tiweb@cpanel.cgmatane.qc.ca . "\r\n"';
        $entete .= 'Reply-to: ' . $email;

        $message = '<h1>Message envoyé</h1>
        <p><strong>Email : </strong>' . $email . '<br/>
        <strong>Message : </strong>' . htmlspecialchars($message) . '</p>';

        $retour = mail('moussadouc19@gmail.com', 'Envoi depuis page Contact', $message, $entete);

        if ($retour) {
            echo "<p>Votre message a bien été envoyé </p>";
        }
    }
}
