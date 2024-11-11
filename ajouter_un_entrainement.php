<link rel="stylesheet" href="connexion.css">
<?php
$titre = "Création d'un entrainement";
session_start();
include('head.php');
include('navbar.php');
?>

<body class="back">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card mt-5" style="max-width: 900px; width: 100%;">
            <h2 class="text-center mb-4">Création d'un entrainement</h2>
            <form method="POST" action="creation_entrainementSQL.php">
                <div class="container">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="titre" class="form-label">Titre</label>
                            <input type="text" class="form-control espace-bas" id="titre" name="titre" placeholder="Votre titre..." required>
                        </div>

                        <div class="col-md-6">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="text" class="form-control espace-bas" id="description" name="description" placeholder="Desscription..." required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control espace-bas" id="date" name="date" placeholder="la date..." required min="<?php date_default_timezone_set('Europe/Paris'); echo date('Y-m-d'); ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="heure" class="form-label">L'heure</label>
                            <input type="time" class="form-control espace-bas" id="heure" name="heure" placeholder="l'heure du rendes-vous..." required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="catégori" class="form-label">Catégori</label>
                            <input type="text" class="form-control espace-bas" id="catégori" name="catégori" placeholder="Catégori..." required>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre maximum de courreur</label>
                            <input type="number" class="form-control espace-bas" id="nombre" name="nombre" step="1" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="adresse" class="form-label">Adresse du l'entrainement</label>
                            <textarea type="text" class="form-control espace-bas" id="adresse" name="adresse" placeholder="Adresse..." required></textarea>
                        </div>

                        <div class="row my-3">
                            <div class="d-grid d-md-block">
                                <input class="btn btn-primary" type="submit" value="Création">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>