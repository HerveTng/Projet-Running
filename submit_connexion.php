<?php
    //connexion à la base de données 
    /*$host='localhost';
    $login='grp_7_1';
    $password='2WFYYWGcTsokJt';
    $dbname='bdd_7_1';
    
    $mysqli = new mysqli($host, $login, $password, $dbname);
    if($mysqli->connect_error){
        die("echec de la connexion:".$mysqli->connect_error);
    }
    

    //verifie si les champs emails et mot de passe sont remplis
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $email=$_POST['Adresse_mail'];
        $password=$_POST['Mot_de_passe'];

        //prepare la requête pour eviter les injection sql
        $resultat = $mysqli->prepare("SELECT mot_de_passe FROM membresimple WHERE adresse_mail = ?");
        $resultat->bind_param("s",$email);
        $resultat->execute();
        $resultat->store_result();

        //verifie si l'utilisateur existe
        if($resultat->num_rows>0){
            $resultat->bind_result($hashed_password);
            $resultat->fetch();

            //verifie le mot de passe
            if($password == $hashed_password){
                header("Location: page_utilisateur.php");
            }else{
                echo"Mot de passe incorrect";
            }
        }else{
            echo "adresse mail non trouvée";
        }
        $resultat->close();

    }
    $mysqli->close();*/
?>