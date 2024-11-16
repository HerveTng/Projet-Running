
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste membre</title>
    <link rel="stylesheet" href="connexion.css">
</head>
<?php
session_start();
$titre = "Liste des membre";
include('head.php');
include('navbar.php');
include('recuparation_membreSQL.php');

$les_inscrits_membre = $_SESSION['membre_liste'];
?>

<body class="back">
    <main>
        <div class="container d-flex justify-content-center align-items-center">
            <div class="card p-4 mt-4" style="max-width: 1000px; width: 100%;">
                <form method="POST" action="membre_promouvoirSQL.php">
                    <?php if (isset($_SESSION['user_id']) && isset($_SESSION['user_is_membreClub']) && $_SESSION['user_is_membreClub'] == 1): ?>
                        <div class="row">
                            <h1>Liste des membre</h1>
                        </div>
                        <?php if ($les_inscrits_membre): ?>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Mail</th>
                                        <th>Promouvoir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($les_inscrits_membre as $membre): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($membre['nom']); ?></td>
                                            <td><?php echo htmlspecialchars($membre['prenom']); ?></td>
                                            <td><?php echo htmlspecialchars($membre['adresse_mail']); ?></td>
                                            <td>
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="<?php echo htmlspecialchars($membre['membreSimple_Id']); ?>"
                                                    name="selected_members[]">
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <h5>Il n'y pas de membres</h5>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-primary mt-3">Validation</button>
                        </div>
                     <?php else: ?>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </main>
</body>
</html>