<?php

require_once CHEMIN_ACCESSEUR . "BaseDeDonnees.php";

class MembreDAo
{
    public static function trouverMembre($membre)
    {

        $SQL_AUTHENTIFICATION = "SELECT * FROM membre WHERE pseudonyme = :pseudonyme";
        $requeteAuthentification = BaseDeDonnees::getConnexion()->prepare($SQL_AUTHENTIFICATION);
        $requeteAuthentification->bindParam(':pseudonyme', $membre['pseudonyme'], PDO::PARAM_STR);
        $requeteAuthentification->execute();
        $membreTrouve = $requeteAuthentification->fetch();

        return $membreTrouve;

    }

    public static function lireMembreParPseudonyme($pseudonyme)
    {
        $SQL_LIRE_MEMBRE = "SELECT * FROM membre WHERE pseudonyme = :pseudonyme";
        $requeteAuthentification = BaseDeDonnees::getConnexion()->prepare($SQL_LIRE_MEMBRE);
        $requeteAuthentification->bindParam(':pseudonyme', $pseudonyme, PDO::PARAM_STR);
        $requeteAuthentification->execute();
        $membre = $requeteAuthentification->fetch();

        return $membre;

    }

    public static function modifierSecurite($securite)
    {
        $SQL_MODIFIER_MEMBRE = "UPDATE membre SET motdepasse = :motdepasse WHERE pseudonyme = :pseudonyme";
        $requeteModifierMembre = BaseDeDonnees::getConnexion()->prepare($SQL_MODIFIER_MEMBRE);
        $requeteModifierMembre->bindParam(':motdepasse', $securite['motdepasse'], PDO::PARAM_STR);
        $requeteModifierMembre->bindParam(':pseudonyme', $securite['pseudonyme'], PDO::PARAM_STR);
        $requeteModifierMembre->execute();

        return $requeteModifierMembre;

    }

    public static function modifierIdentiteSansIcone($identite)
    {
        $SQL_MODIFIER_MEMBRE = "UPDATE `membre` SET `pseudonyme`= :pseudonyme,`courriel`= :courriel,`prenom`= :prenom,`nom`= :nom WHERE `id_membre`= :id";
        $requeteModifierMembre = BaseDeDonnees::getConnexion()->prepare($SQL_MODIFIER_MEMBRE);
        $requeteModifierMembre->bindParam(':pseudonyme', $identite['pseudonyme'], PDO::PARAM_STR);
        $requeteModifierMembre->bindParam(':courriel', $identite['courriel'], PDO::PARAM_STR);
        $requeteModifierMembre->bindParam(':prenom', $identite['prenom'], PDO::PARAM_STR);
        $requeteModifierMembre->bindParam(':nom', $identite['nom'], PDO::PARAM_STR);

        $requeteModifierMembre->bindParam(':id', $identite['id'], PDO::PARAM_INT);

        $requeteModifierMembre->execute();
        return $requeteModifierMembre;
    }

    public static function modifierIdentite($identite, $icone)
    {
        $SQL_MODIFIER_MEMBRE = "UPDATE `membre` SET `pseudonyme`= :pseudonyme,`courriel`= :courriel,`prenom`= :prenom,`nom`= :nom, `icone`= :icone  WHERE `id_membre`= :id";
        $requeteModifierMembre = BaseDeDonnees::getConnexion()->prepare($SQL_MODIFIER_MEMBRE);
        $requeteModifierMembre->bindParam(':pseudonyme', $identite['pseudonyme'], PDO::PARAM_STR);
        $requeteModifierMembre->bindParam(':courriel', $identite['courriel'], PDO::PARAM_STR);
        $requeteModifierMembre->bindParam(':prenom', $identite['prenom'], PDO::PARAM_STR);
        $requeteModifierMembre->bindParam(':nom', $identite['nom'], PDO::PARAM_STR);
        $requeteModifierMembre->bindParam(':icone', $icone, PDO::PARAM_STR);
        $requeteModifierMembre->bindParam(':id', $identite['id'], PDO::PARAM_INT);

        $requeteModifierMembre->execute();
        return $requeteModifierMembre;
    }

    public static function trouverCourriel($utilisateur)
    {
        $TROUVER_COURRIEL = "SELECT id_membre FROM membre WHERE courriel = :courriel";
        $requete = BaseDeDonnees::getConnexion()->prepare($TROUVER_COURRIEL);
        $requete->bindParam(':courriel', $utilisateur, PDO::PARAM_STR);
        $requete->execute();
        $membre = $requete->fetch();

        return $membre;
    }

    public static function enregistrerMembre($nouveauMembre, $icone)
    {
        $SQL_AJOUTER_MEMBRE = " INSERT INTO `membre`(`prenom`, `nom`, `pseudonyme`, `motdepasse`, `courriel`, `icone`) VALUES ( :prenom, :nom, :pseudonyme, :motdepasse, :courriel, :icone)";
        $requeteAjouterMembre = BaseDeDonnees::getConnexion()->prepare($SQL_AJOUTER_MEMBRE);
        $requeteAjouterMembre->bindParam(':prenom', $nouveauMembre['prenom'], PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':nom', $nouveauMembre['nom'], PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':pseudonyme', $nouveauMembre['pseudonyme'], PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':motdepasse', $nouveauMembre['motdepasse'], PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':courriel', $nouveauMembre['courriel'], PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':icone', $icone, PDO::PARAM_STR);
        $requeteAjouterMembre = $requeteAjouterMembre->execute();

        return $requeteAjouterMembre;
    }
}
