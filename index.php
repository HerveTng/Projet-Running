<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Accueil</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        
        
        <?php
            session_start();
            $titre = "Accueil";
  
            include('head.php');
            include('navbar.php');
        ?>

        <main>
            <section>
                <p class="description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna 
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
                    ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    Duis aute irure dolor in reprehenderit in voluptate velit 
                    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint 
                    occaecat cupidatat non proident, sunt in culpa qui officia 
                    deserunt mollit anim id est laborum.
                </p>
            </section>
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
                    
                </div>
                <?php endforeach ?>
            </section>

        </main>
        
        <footer>

        </footer>
    </body>
</html>
