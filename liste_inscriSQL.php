<?php
session_start();
include('connextionSQL.php');
include('head.php');

if (isset($_SESSION['entrainement_Id'])) {

$nom_course = $_SESSION['entrainement_Id'];

$statement = $db->prepare('SELECT * FROM liste_inscrit WHERE nom_Course = :entrainement_Id');


if ($statement->execute([
    'entrainement_Id' => $nom_course,
])){}

    $entrainement = $statement->fetchAll();
    
    $statement3 = $db->prepare('SELECT * FROM membresimple WHERE adresse_mail = :mail');
    
    foreach ($entrainement as $inscri_mail){

        if ($statement3->execute([
            'mail' => $inscri_mail['mail_Inscrit'],
        ])){
        $membre_inscrit = $statement3->fetch(PDO::FETCH_ASSOC);
            if ($membre_inscrit) {
                $les_inscrits[] = $membre_inscrit;
            }
        }

    }
    $_SESSION['mail_inscri'] = $les_inscrits;

    header('Location: liste_inscri.php');
    exit();
}
?>