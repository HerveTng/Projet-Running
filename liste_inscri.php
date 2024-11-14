<?php
session_start();
$titre = "Liste des inscri";
include('head.php');
include('navbar.php');

$les_inscrits = $_SESSION['mail_inscri'];
?>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="connexion.css">
</head>

<body class="back">
    <main>
        <div class="container d-flex justify-content-center align-items-center">
            <div class="card p-4 mt-4" style="max-width: 1000px; width: 100%;">
                <div class="row">
                    <h1>Liste des inscription</h1>
                </div>
                <?php if($les_inscrits): ?>
                    <div class="row">
                    <div class="col-4"><strong>Nom</strong></div>
                    <div class="col-4"><strong>Prénom</strong></div>
                    <div class="col-4"><strong>Mail</strong></div>
                    <?php foreach ($les_inscrits as $inscrit): ?>
                        <div class="col-4"><?php echo htmlspecialchars($inscrit['nom']); ?></div>
                        <div class="col-4"><?php echo htmlspecialchars($inscrit['prenom']); ?></div>
                        <div class="col-4"><?php echo htmlspecialchars($inscrit['adresse_mail']); ?></div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <h5>Il n'y pas d'inscription pour cette entrainement</h5>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
</body>