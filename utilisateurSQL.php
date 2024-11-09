<?php
include('connextionSQL.php');
//include('head.php');

$mail = $_POST['email'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$password = $_POST['password'];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$satement = $db->prepare("INSERT INTO `membresimple` (adresse_mail, nom, prenom, mot_de_passe, is_membreClub) VALUES (:Mail, :Nom, :Prenom, :mot_de_passe, 0)");

$satement->execute(array(
    'Mail' => $mail,
    'Nom' => $nom,
    'Prenom' => $prenom,
    'mot_de_passe' => $hashedPassword
));

?>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 55vh; padding-top: 3vh;">
        <div class="card p-4" style="max-width: 800px; width: 100%;">
            <h1> Vous éte inscri </h1>
            <div class="container">
                <a class="btn btn-primary" href="index.php" role="button">Retour à l'Acceuil</a>
            </div>
        </div>
    </div>
    </div>
</body>