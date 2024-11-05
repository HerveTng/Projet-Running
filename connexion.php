<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Accueil</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <img src="logo_esigelec.jpg" alt="voici le logo de l'esigelec" class="logo">
        <header>
        
        <nav>
            
            <div class="container">
                <p class="nom_asso">RUNNING</p>
            </div>
        </nav>

        <main>
           <form action="submit_connexion.php" method="post">
                <p>
                    <label for="Adresse_mail"> Adresse mail</label>:<input type="email" name="Adresse_mail" id="Adresse_mail" size="30" required>
                    
                </p>
                <p>
                    <label for="Mot_de_passe">Mot de passe</label>: <input type="password" name="Mot_de_passe" id="Mot_de_passe" size="30" required>
                </p>
                <input type="submit" value="connexion">
                
           </form>

        </main>
        
        <footer>

        </footer>
    </body>
</html>

