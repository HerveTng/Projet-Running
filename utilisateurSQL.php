<?php
session_start();
include('connextionSQL.php');
include('head.php');

$mail = $_POST['email'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$password = $_POST['password'];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$statement = $db->prepare("INSERT INTO membresimple (adresse_mail, nom, prenom, mot_de_passe, is_membreClub) VALUES (:Mail, :Nom, :Prenom, :mot_de_passe, 0)");

$statement->execute([
    'Mail' => $mail,
    'Nom' => $nom,
    'Prenom' => $prenom,
    'mot_de_passe' => $hashedPassword
]);



?>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 55vh; padding-top: 3vh;">
        <div class="card p-4" style="max-width: 800px; width: 100%;">
            <p>Incscription réussi, veuillez vous connectez pour continue </p>
            <div class="container">
                <a class="btn btn-primary" href="connexion.php" role="button">Se connecte</a>
            </div>
        </div>
    </div>
    </div>
</body>