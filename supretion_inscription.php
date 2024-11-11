<?php
session_start();
include('connextionSQL.php');
include('head.php');

if (isset($_SESSION['entrainement_Id'], $_SESSION['user_mail'])) {

    $nom_course = $_SESSION['entrainement_Id'];
    $mail_inscrit = $_SESSION['user_mail'];

    $statement = $db->prepare("DELETE FROM liste_inscrit WHERE nom_Course = :nom_course AND mail_Inscrit = :mail_inscrit");

    if ($statement->execute([
        'nom_course' => $nom_course,
        'mail_inscrit' => $mail_inscrit,
    ])) {

        header("Location: index.php");
        exit();
    } else {
        // Message d'erreur en cas d'échec d'insertion
        echo "Erreur lors de l'insertion des données.";
    }
} else {
    // Message d'erreur si les variables attendues ne sont pas définies
    echo "Données d'inscription manquantes.";
}
?>