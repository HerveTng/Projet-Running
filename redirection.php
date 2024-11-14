<?php
session_start();

if (isset($_POST['btn_désinscription']) && $_POST['btn_désinscription'] === 'OUI') {
    $_SESSION['entrainement_Id'] = $_POST['entrainement_Id'];
    
    header('Location: supretion_inscription.php');
    exit();
} 

elseif (isset($_POST['btn_inscrip_entraine']) && $_POST['btn_inscrip_entraine'] === 'OUI') {
    $_SESSION['entrainement_Id'] = $_POST['entrainement_Id'];
    
    header('Location: entrainement_inscription.php');
    exit();
}

elseif (isset($_POST['btn_liste_inscri'])) {
    $_SESSION['entrainement_Id'] = $_POST['entrainement_Id'];
        
    header('Location: liste_inscriSQL.php');
    exit();

} 

else {
    echo "Aucune action définie.";
}
?>