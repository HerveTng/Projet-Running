<?php
session_start();
$titre = "Liste des inscri";
include('head.php');
include('navbar.php');

if (isset($_SESSION['user_id']) && isset($_SESSION['user_is_membreClub']) && $_SESSION['user_is_membreClub'] == 1){
$les_inscrits = $_SESSION['mail_inscri'];
}
?>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="connexion.css">
</head>

<body class="back">
    <main>
        <div class="container d-flex justify-content-center align-items-center">
            <div class="card p-4 mt-4" style="max-width: 1000px; width: 100%;">
                <?php if (isset($_SESSION['user_id']) && isset($_SESSION['user_is_membreClub']) && $_SESSION['user_is_membreClub'] == 1): ?>
                    <div class="row">
                        <h1>Liste des inscription</h1>
                    </div>
                    <?php if ($les_inscrits): ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Mail</th>
                            </thead>
                            <tbody>
                                <?php foreach ($les_inscrits as $membre): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($membre['nom']); ?></td>
                                        <td><?php echo htmlspecialchars($membre['prenom']); ?></td>
                                        <td><?php echo htmlspecialchars($membre['adresse_mail']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                            <h5>Il n'y pas d'inscription pour cette entrainement</h5>
                        <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <l>Vous devez vous connecter pour accéder a cette page</l>
                    <?php endif; ?>
            </div>
        </div>
    </main>
</body>