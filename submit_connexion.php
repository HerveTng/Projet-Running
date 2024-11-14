<?php
session_start();
include('connextionSQL.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Adresse_mail'];
    $password = $_POST['Mot_de_passe'];


    $stmt = $db->prepare("SELECT * FROM membresimple WHERE adresse_mail = :email");

    $stmt->bindParam(':email', $email, PDO::PARAM_STR);

    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $user['mot_de_passe'])) {
            $_SESSION['user_id'] = $user['membreSimple_Id'];
            $_SESSION['user_nom'] = $user['nom'];
            $_SESSION['user_prenom'] = $user['prenom'];
            $_SESSION['user_mail'] = $user['adresse_mail'];
            $_SESSION['user_is_membreClub'] = $user['is_membreClub'];

            header("Location: index.php");
            exit();
        } else {
            $_SESSION['error'] = "Mot de passe incorrect.";
            header("Location: connexion.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Adresse mail non trouvée.";
        header("Location: connexion.php");
        exit();
    }

}

