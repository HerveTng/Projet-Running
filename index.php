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
            <section class="container_activite">
                <div class="activite">
                    <h2>Course A Pieds</h2>
                    <table>
                        <tr>
                            <td><strong>Date</strong></td>
                            <td>11 avril 2024</td>
                        </tr>
                        <tr>
                            <td><strong>heure</strong></td>
                            <td>16h30</td>
                        </tr>
                        <tr>
                            <td><strong>lieu</strong></td>
                            <td>3 rue pierre curie</td>
                        </tr>
                    </table>
                </div>
                <div class="activite">
                    <h2>Course A Pieds</h2>
                    <table>
                        <tr>
                            <td><strong>Date</strong></td>
                            <td>11 avril 2024</td>
                        </tr>
                        <tr>
                            <td><strong>heure</strong></td>
                            <td>16h30</td>
                        </tr>
                        <tr>
                            <td><strong>lieu</strong></td>
                            <td>3 rue pierre curie</td>
                        </tr>
                    </table>
                </div>
                <div class="activite">
                    <h2>Course A Pieds</h2>
                    <table>
                        <tr>
                            <td><strong>Date</strong></td>
                            <td>11 avril 2024</td>
                        </tr>
                        <tr>
                            <td><strong>heure</strong></td>
                            <td>16h30</td>
                        </tr>
                        <tr>
                            <td><strong>lieu</strong></td>
                            <td>3 rue pierre curie</td>
                        </tr>
                    </table>
                </div>

            </section>

        </main>
        
        <footer>

        </footer>
    </body>
</html>
