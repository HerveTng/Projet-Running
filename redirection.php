<?php
session_start();

if (isset($_POST['btn_désinscription']) && $_POST['btn_désinscription'] === 'OUI') {
    // Stocker l'ID dans la session pour le transfert
    $_SESSION['entrainement_Id'] = $_POST['entrainement_Id'];
    
    // Rediriger vers le script de suppression
    header('Location: supretion_inscription.php');
    exit();
} elseif (isset($_POST['btn_inscrip_entraine']) && $_POST['btn_inscrip_entraine'] === 'OUI') {
    // Stocker l'ID dans la session pour le transfert
    $_SESSION['entrainement_Id'] = $_POST['entrainement_Id'];
    
    // Rediriger vers le script d'inscription
    header('Location: entrainement_inscription.php');
    exit();
} else {
    echo "Aucune action définie.";
}
?>