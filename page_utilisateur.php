<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
    </head>

    <?php
    $titre = "Accueil";

    include('head.php');
    include('navbar.php');
    ?>
    
    <body>
        <main>
            <section>
            <?php include('connextionSQL.php'); ?>
                <?php
                    $statement=$db->prepare('SELECT * FROM entrainement');
                    $statement->execute();
                    $training= $statement->fetchAll();
                ?>
                <h1> LISTE DES ENTRAINEMENT </h1>
                <?php foreach($training as $train):?>
                <div class="activite">
                    <h3><?php echo($train['titre']) ?></h3>
                    <p><strong>date :</stong> <?php echo($train['date']) ?></p>
                    <p><strong>lieu :</stong> <?php echo($train['lieu']) ?></p>
                    <p><strong>heure :</stong> <?php echo($train['heure']) ?></p>
                    <p>categorie : <?php echo($train['categorie']) ?></p>
                    <p>Nombre Maximum : <?php echo($train['nombre_Max']) ?></p>
                    <p>description : <?php echo($train['description']) ?></p>
                    <a class="btn btn-primary" href="connexion.php" role="button">S'inscrire</a>
                </div>
                <?php endforeach ?>
                
            </section>

        </main>
        
        <footer>

        </footer>
    </body>
</html>
