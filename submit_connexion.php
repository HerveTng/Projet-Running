<?php
session_start();
include('connextionSQL.php');

//verifie si les champs emails et mot de passe sont remplis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Adresse_mail'];
    $password = $_POST['Mot_de_passe'];

    //prepare la requête pour eviter les injection sql
    $stmt = $db->prepare("SELECT * FROM membresimple WHERE adresse_mail = :email");

    $stmt->bindParam(':email', $email, PDO::PARAM_STR);

    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        // Récupère les résultats
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifie le mot de passe
        if (password_verify($password, $user['mot_de_passe'])) {
            // Stocke les informations de l'utilisateur dans la session
            $_SESSION['user_id'] = $user['membreSimple_Id'];
            $_SESSION['user_nom'] = $user['nom'];
            $_SESSION['user_prenom'] = $user['prenom'];
            $_SESSION['user_mail'] = $user['adresse_mail'];
            $_SESSION['user_is_membreClub'] = $user['is_membreClub'];

            // Redirige vers la page d'accueil
            header("Location: index.php");
            exit();
        } else {
            echo "Mot de passe incorrect";
        }
    } else {
        echo "Adresse mail non trouvée";
    }
    $resultat->close();
}
$mysqli->close();
