<?php
include('connextionSQL.php');
include('head.php');

$titre = $_POST['titre'];
$description = $_POST['description'];
$date = $_POST['date'];
$heure = $_POST['heure'];
$categorie = $_POST['catégori'];
$nombre_Max = $_POST['nombre'];
$lieu = $_POST['adresse'];

var_dump($date, $description, $titre, $heure, $categorie, $nombre_Max, $lieu);

$satement = $db->prepare("INSERT INTO entrainement (date, description, titre, heure, categorie, nombre_Max, lieu) VALUES (:date, :description, :titre, :heure, :categorie, :nombre_Max, :lieu)");

$satement->execute([
    'date' => $date,
    'description' => $description,
    'titre' => $titre,
    'heure' => $heure,
    'categorie' => $categorie,
    'nombre_Max' => $nombre_Max,
    'lieu' => $lieu,
]);

header("Location: index.php");
exit();
?>