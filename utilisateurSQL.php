<?php
include('connextionSQL.php');
include('head.php');



    $mail = $_POST['email'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $password = $_POST['password'];

    $satement = $db->prepare("INSERT INTO `membresimple` (adresse_mail, nom, prenom, mot_de_passe) VALUES (:Mail, :Nom, :Prenom, :mot_de_passe)");

    $satement->execute(array(
        'Mail'=>$mail,
        'Nom'=>$nom,
        'Prenom'=>$prenom,
        'mot_de_passe'=>$password
    ));

?>
<div class="container text-center">
    <div class = "row">
        <div class = "container square-box d-flex justify-content-center align-items-center">
            <h1> Vous éte inscri </h1>
        </div>
    </div>
    <div class = "row">
        <a class="btn btn-primary" href="index.php" role="button">Retour à l'Acceuil</a>
    </div>
</div>
