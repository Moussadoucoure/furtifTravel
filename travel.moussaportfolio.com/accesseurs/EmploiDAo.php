<?php
require_once CHEMIN_ACCESSEUR . "BaseDeDonnees.php";

class EmploiDAo
{

    public static function listerEmploi()
    {
        $MESSAGE_SQL_LISTE_EMPLOI = "SELECT id_emploi, nom, prenom, description,poste, photo from emploi";

        $requetelisteEmploi = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_LISTE_EMPLOI);

        $requetelisteEmploi->execute();

        $listeEmploi = $requetelisteEmploi->fetchAll();

        return $listeEmploi;

    }

    public static function lireEmploi($id_emploi)
    {
        $MESSAGE_SQL_emploi = "SELECT * FROM `emploi` WHERE id_emploi = :id";

        $requeteListeemplois = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_emploi);

        $requeteListeemplois->bindParam(':id', $id_emploi, PDO::PARAM_INT);

        $requeteListeemplois->execute();

        $emploi = $requeteListeemplois->fetch();

        return $emploi;
    }

    public static function ajouterEmploi($emploi, $photo)
    {
        $SQL_AJOUTER_EMPLOI = " INSERT INTO `emploi`(`id_emploi`, `nom`, `prenom`, `description`, `poste`, `photo`) VALUES ( :id, :nom, :prenom, :description, :poste, :photo)";
        $requeteAjouterEmploi = BaseDeDonnees::getConnexion()->prepare($SQL_AJOUTER_EMPLOI);
        $requeteAjouterEmploi->bindParam(':id', $emploi['id_emploi'], PDO::PARAM_INT);
        $requeteAjouterEmploi->bindParam(':nom', $emploi['nom'], PDO::PARAM_STR);
        $requeteAjouterEmploi->bindParam(':prenom', $emploi['prenom'], PDO::PARAM_STR);
        $requeteAjouterEmploi->bindParam(':description', $emploi['description'], PDO::PARAM_STR);
        $requeteAjouterEmploi->bindParam(':poste', $emploi['poste'], PDO::PARAM_STR);
        $requeteAjouterEmploi->bindParam(':photo', $photo, PDO::PARAM_STR);
        $reussiteAjout = $requeteAjouterEmploi->execute();

        return $reussiteAjout;
    }

    public static function modifierEmploi($emploi, $photo)
    {
        $SQL_MODIFIER_EMPLOI = "UPDATE `emploi` SET `id_emploi`= :id, `nom`= :nom, `prenom`= :prenom, `description`= :description, `poste`= :poste, `photo`= :photo WHERE id_emploi = :id";
        $requeteModifierEmploi = BaseDeDonnees::getConnexion()->prepare($SQL_MODIFIER_EMPLOI);
        $requeteModifierEmploi->bindParam(':id', $emploi['id_emploi'], PDO::PARAM_INT);
        $requeteModifierEmploi->bindParam(':nom', $emploi['nom'], PDO::PARAM_STR);
        $requeteModifierEmploi->bindParam(':prenom', $emploi['prenom'], PDO::PARAM_STR);
        $requeteModifierEmploi->bindParam(':description', $emploi['description'], PDO::PARAM_STR);
        $requeteModifierEmploi->bindParam(':poste', $emploi['poste'], PDO::PARAM_STR);

        $requeteModifierEmploi->bindParam(':photo', $photo, PDO::PARAM_STR);

        $reussiteModification = $requeteModifierEmploi->execute();

        return $reussiteModification;
    }

    public static function modifierEmploiSansPhoto($emploi)
    {
        $SQL_MODIFIER_EMPLOI = "UPDATE `emploi` SET `id_emploi`= :id, `nom`= :nom, `prenom`= :prenom, `description`= :description, `poste`= :poste WHERE id_emploi = :id";
        $requeteModifierEmploi = BaseDeDonnees::getConnexion()->prepare($SQL_MODIFIER_EMPLOI);
        $requeteModifierEmploi->bindParam(':id', $emploi['id_emploi'], PDO::PARAM_INT);
        $requeteModifierEmploi->bindParam(':nom', $emploi['nom'], PDO::PARAM_STR);
        $requeteModifierEmploi->bindParam(':prenom', $emploi['prenom'], PDO::PARAM_STR);
        $requeteModifierEmploi->bindParam(':description', $emploi['description'], PDO::PARAM_STR);
        $requeteModifierEmploi->bindParam(':poste', $emploi['poste'], PDO::PARAM_STR);

        $reussiteModification = $requeteModifierEmploi->execute();
        return $reussiteModification;
    }

    public static function supprimerEmploi($id)
    {
        $SQL_SUPPRIMER_EMPLOI = "DELETE FROM `emploi` WHERE id_emploi = :id";

        $requeteSupprimerEmploi = BaseDeDonnees::getConnexion()->prepare($SQL_SUPPRIMER_EMPLOI);

        $requeteSupprimerEmploi->bindParam(':id', $id, PDO::PARAM_INT);

        $reussiteSuppression = $requeteSupprimerEmploi->execute();

        return $reussiteSuppression;
    }

    public static function rechercheRapideEmploi($mot)
    {
        $mot = '%' . $mot . '%';
        $SQL_RECHERCHE_RAPIDE = "SELECT * FROM `emploi` WHERE nom LIKE :mot  OR prenom LIKE :mot OR poste LIKE :mot OR date LIKE :mot";
        $requeteRechercheRapide = BaseDeDonnees::getConnexion()->prepare($SQL_RECHERCHE_RAPIDE);
        $requeteRechercheRapide->bindParam(':mot', $mot, PDO::PARAM_STR);

        $requeteRechercheRapide->execute();
        $resultats = $requeteRechercheRapide->fetchAll();
        return $resultats;

    }

    public static function rechercheAvanceeEmploi($nomRecherche, $posteRecherche, $descriptionRecherche)
    {

        if (!empty($nomRecherche) || !empty($posteRecherche) || !empty($descriptionRecherche)) {
            $SQL_RECHERCHE_AVANCEE = "SELECT * FROM emploi WHERE 1 = 1";

            if (!empty($nomRecherche)) {
                $SQL_RECHERCHE_AVANCEE = $SQL_RECHERCHE_AVANCEE . " AND prenom LIKE '%$nomRecherche%'";
            }

            if (!empty($posteRecherche)) {
                $SQL_RECHERCHE_AVANCEE = $SQL_RECHERCHE_AVANCEE . " AND poste LIKE '%$posteRecherche%'";
            }

            if (!empty($descriptionRecherche)) {
                $SQL_RECHERCHE_AVANCEE = $SQL_RECHERCHE_AVANCEE . " AND description LIKE '%$descriptionRecherche%'";
            }

            $requeteRecherche = BaseDeDonnees::getConnexion()->prepare($SQL_RECHERCHE_AVANCEE);
            $requeteRecherche->execute();
            $resultats = $requeteRecherche->fetchAll();
            return $resultats;

        }
    }

    public static function listerCategories()
    {
        $MESSAGE_LISTER_CATEGORIES = "SELECT categorie, COUNT(*) as nombre, AVG(duree) as duree_moyenne, SUM(duree) as minutes_totales, MAX(duree) as duree_maximum, MIN(duree) as duree_minimum FROM emploi GROUP BY categorie";
        $requeteCategories = BaseDeDonnees::getConnexion()->prepare($MESSAGE_LISTER_CATEGORIES);
        $requeteCategories->execute();
        $categories = $requeteCategories->fetchAll();
        return $categories;
    }

    public static function calculerContenu()
    {
        $MESSAGE_CALCULER_CONTENU = "SELECT AVG(duree) as moyenne, STDDEV(duree) as ecart_type FROM emploi";
        $requetePageContenu = BaseDeDonnees::getConnexion()->prepare($MESSAGE_CALCULER_CONTENU);
        $requetePageContenu->execute();
        $contenu = $requetePageContenu->fetchAll();
        return $contenu;
    }

    public static function photoRamdon()
    {
        $MESSAGE_PHOTO_RAMDON = "SELECT * FROM emploi ORDER BY RAND() LIMIT 1";
        $requetePhotoRamdon = BaseDeDonnees::getConnexion()->prepare($MESSAGE_PHOTO_RAMDON);
        $requetePhotoRamdon->execute();
        $ramdon = $requetePhotoRamdon->fetchAll();
        return $ramdon;
    }
}
