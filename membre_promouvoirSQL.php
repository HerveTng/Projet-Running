<?php
include('connextionSQL.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selected_members = $_POST['selected_members'];
    if (!empty($selected_members)) {
        foreach ($selected_members as $id) {
            $stmt = $db->prepare("UPDATE membresimple SET is_membreClub = 1 WHERE membreSimple_Id = :membreSimple_Id ");
            $stmt->execute(['membreSimple_Id' => $id]);
        }
    }

    header('Location: Liste_des_membre.php');
}
?>