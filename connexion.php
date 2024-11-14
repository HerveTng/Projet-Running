<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="connexion.css">
</head>

<?php
session_start();
$titre = "Connexion";

include('head.php');
include('navbar.php');
?>

<body class="back">
    <div class="container d-flex justify-content-center align-items-center" style="height: 55vh; padding-top: 3vh;">
        <div class="card p-4" style="max-width: 400px; width: 100%;">
            <h2 class="text-center mb-4">Connexion</h2>
            <form action="submit_connexion.php" method="post" class="formcon">
                <div class="mb-3">
                    <label for="Adresse_mail" class="form-label">Mail</label>
                    <input type="email" class="form-control " id="Adresse_mail" name="Adresse_mail" placeholder="Votre mail..." required>
                </div>

                <div class="mb3">
                    <label for="Mot_de_passe" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control espace-bas" id="Mot_de_passe" name="Mot_de_passe" placeholder="Votre mot de passe..." required>
                </div>

                <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                    echo $_SESSION['error']; 
                    unset($_SESSION['error']); // Supprime le message d'erreur après l'affichage
                    ?>
                </div>
            <?php endif; ?>

                <button type="submit" class="btn btn-primary w-100 espace-haut">Connexion</button>
            </form>
        </div>
    </div>
</body>

</html>