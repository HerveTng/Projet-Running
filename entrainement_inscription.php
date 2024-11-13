<?php
session_start();
include('connextionSQL.php');
include('head.php');

if (isset($_SESSION['entrainement_Id'], $_SESSION['user_mail'])) {

    $nom_course = $_SESSION['entrainement_Id'];
    $mail_inscrit = $_SESSION['user_mail'];

    $statement0 = $db->prepare('SELECT nombre_Max FROM entrainement WHERE entrainement_Id = :entrainement_Id');
    $statement1 = $db->prepare("INSERT INTO liste_inscrit (nom_Course, mail_inscrit) VALUES (:nom_course, :mail_inscrit)");
    $statement2 = $db->prepare("UPDATE entrainement SET nombre_Max= :nombre WHERE entrainement_Id = :entrainement_Id ");

    if ($statement0->execute([
        'entrainement_Id' => $nom_course,
    ]))

    $result = $statement0->fetch(PDO::FETCH_ASSOC);
    $nombre = $result['nombre_Max'] - 1;

    if ($statement2->execute([
        'nombre' => $nombre,
        'entrainement_Id' => $nom_course,
    ]))

    if ($statement1->execute([
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
    //echo $_SESSION['entrainement_Id'];
}
?>