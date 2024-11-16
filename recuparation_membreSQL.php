<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('connextionSQL.php');

$stmt = $db->prepare("SELECT * FROM membresimple WHERE is_membreClub = 0");

$stmt->execute();

$membre = $stmt->fetchAll();

$_SESSION['membre_liste'] = $membre;

?>