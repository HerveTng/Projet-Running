<link rel="stylesheet" href="connexion.css">
<?php
$titre = "Inscription";

include('head.php');
include('navbar.php');
?>

<body class="back">
    <div class="container d-flex justify-content-center align-items-center" style="height: 55vh; padding-top: 8vh;">
        <div class="card p-4 mt-4" style="max-width: 800px; width: 100%;">
            <h2 class="text-center mb-4">Création d'un compte</h2>
            <form method="POST" action="utilisateurSQL.php">
                <div class="container">
                    <!-- Nom et prénom sur une ou deux lignes (en fonction de la taille) -->
                    <!-- Ici on utilise le breakpoint medium -->
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control " id="nom" name="nom" placeholder="Votre nom..." required>
                        </div>
                        <div class="col-md-6 mt-1">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control " id="prenom" name="prenom" placeholder="Votre prénom..." required>
                        </div>
                    </div>
                    <!-- email et mot de passe -->
                    <div class="row">
                        <div class="col-md-6 mt-1">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control " id="email" name="email" placeholder="Votre email..." required>
                        </div>
                        <div class="col-md-6 mt-1">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control " id="password" name="password" placeholder="Votre mot de passe..." required>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="d-grid d-md-block">
                            <input class="btn btn-primary" type="submit" value="Inscription">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>