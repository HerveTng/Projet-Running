<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
</head>

<?php
session_start();
$titre = "Accueil";
include('head.php');
include('navbar.php');

date_default_timezone_set('Europe/Paris');
?>
<?php include('connextionSQL.php'); ?>
<?php
$statement = $db->prepare('SELECT * FROM entrainement');
$statement->execute();
$training = $statement->fetchAll();
?>
<?php
$statement = $db->prepare('SELECT * FROM liste_inscrit');
$statement->execute();
$list = $statement->fetchAll();
?>

<body class="back">
    <main>
        <div class="container d-flex justify-content-center align-items-center">
            <div class="card back2 p-4" style="max-width: 1000px; width: 100%;">
                <div class="row text-center">
                    <div class="justify-content-center">
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <h1 class="mt-4"> Liste des entrainement </h1>
                            <div class="row">
                                <?php foreach ($training as $train): ?>
                                    <?php if ($train['date'] > date('Y-m-d')): ?>
                                        <div class="col-md-6">
                                            <form method="POST" action="redirection.php">
                                                <div class="card mt-4">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php echo ($train['titre']) ?></h5>
                                                        <?php
                                                        $date = new DateTime($train['date']);
                                                        $formaDate = $date->format('d/m/Y');
                                                        ?>
                                                        <h6 class="card-subtitle mb-2 text-muted"><strong>date :</strong> <?php echo $formaDate ?></h6>
                                                        <p class="card-text"><strong>lieu :</strong> <?php echo htmlspecialchars($train['lieu']) ?></p>
                                                        <p class="card-text"><strong>heure :</strong> <?php echo htmlspecialchars($train['heure']) ?></p>
                                                        <p class="card-text"><strong>categorie :</strong> <?php echo htmlspecialchars($train['categorie']) ?></p>
                                                        <p class="card-text"><strong>Nombre maximun :</strong> <?php echo htmlspecialchars($train['nombre_Max']) ?></p>
                                                        <p class="card-text"><strong>description :</strong> <?php echo htmlspecialchars($train['description']) ?></p>

                                                        <input type="hidden" name="entrainement_Id" value="<?php echo htmlspecialchars($train['entrainement_Id']); ?>">

                                                        <?php
                                                        $userInscrit = false ?>
                                                        <?php foreach ($list as $list_inscri): ?>
                                                            <?php if ($list_inscri['nom_Course'] == $train['entrainement_Id'] && $_SESSION['user_mail'] == $list_inscri['mail_Inscrit']): ?>
                                                                <?php $userInscrit = true ?>
                                                            <?php endif ?>
                                                        <?php endforeach ?>

                                                        <?php if (isset($_SESSION['user_id']) && isset($_SESSION['user_is_membreClub']) && $_SESSION['user_is_membreClub'] == 1): ?>

                                                            <input id="btnliste_inscri" name="btn_liste_inscri" class="btn btn-primary" type="submit" value="Liste">
                                                        <?php endif; ?>

                                                        <?php if ($userInscrit == true): ?>
                                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#<?php echo htmlspecialchars($train['entrainement_Id']); ?>">
                                                                Se déinscrire
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="<?php echo ($train['entrainement_Id']); ?>" tabindex="-1" aria-labelledby="<?php echo htmlspecialchars($train['entrainement_Id']); ?>Label" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Désinscription</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <l>Êtes-vous sur de vouloir vous désinscrire à cette entrainement</l>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NON</button>
                                                                            <input id="btndésinscription" name="btn_désinscription" class="btn btn-primary" type="submit" value="OUI">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php elseif (($userInscrit == false) && $train['nombre_Max'] > 0): ?>
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo htmlspecialchars($train['entrainement_Id']); ?>">
                                                                S'inscrire
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="<?php echo ($train['entrainement_Id']); ?>" tabindex="-1" aria-labelledby="<?php echo htmlspecialchars($train['entrainement_Id']); ?>Label" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">S'inscrire</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <l>Êtes-vous sur de vouloir vous inscrire à cette entrainement</l>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NON</button>
                                                                            <input id="btninscrp_entrai" name="btn_inscrip_entraine" class="btn btn-primary" type="submit" value="OUI">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php else: ?>
                                                            <h4 class="rouge">Cette entrainement est complét</h4>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    <?php endif ?>
                                <?php endforeach ?>
                            </div>

                        <?php else: ?>
                            <div class="row">
                                <p class="encadre">
                                    Running est un club de l'esigelec qui organise des course dans la ville de rouen pour les etudiants de l'ESIGELEC.
                                    Ceci est un site web ou les étudiants pourront s'inscrire aux courses.
                                    Veuillez vous connecter pour vous inscrire aux courses ou vous inscrire si vous ne l'avez pas encore fait.
                                </p>
                            </div>
                            <h1 class="mt-4"> Liste des entrainement </h1>
                            <div class="row">
                                <?php foreach ($training as $train): ?>
                                    <?php if ($train['date'] > date('Y-m-d')): ?>
                                    <div class="col-md-6">
                                        <div class="card mt-4">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo ($train['titre']) ?></h5>
                                                <?php
                                                $date = new DateTime($train['date']);
                                                $formaDate = $date->format('d/m/Y');
                                                ?>
                                                <h6 class="card-subtitle mb-2 text-muted"><strong>date :</strong> <?php echo $formaDate ?></h6>
                                                <p class="card-text"><strong>lieu :</strong> <?php echo ($train['lieu']) ?></p>
                                                <p class="card-text"><strong>heure :</strong> <?php echo ($train['heure']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                <?php endforeach ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>