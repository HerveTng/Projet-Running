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
?>

<body class="back">
    <main>
        <div class="container d-flex justify-content-center align-items-center">
            <div class="card back2 p-4" style="max-width: 1000px; width: 100%;">
                <div class="row">
                    <p class="encadre">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit
                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                        occaecat cupidatat non proident, sunt in culpa qui officia
                        deserunt mollit anim id est laborum.
                    </p>
                </div>
                <div class="row text-center">
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
                    <h1 class="mt-4"> Liste des entrainement </h1>
                    <div class="justify-content-center">
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <div class="row">
                                <?php foreach ($training as $train): ?>
                                    
                                        <div class="col-md-6">
                                        <form method="POST" action="redirection.php">
                                            <div class="card mt-4">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo ($train['titre']) ?></h5>
                                                    <h6 class="card-subtitle mb-2 text-muted"><strong>date :</strong> <?php echo ($train['date']) ?></h6>
                                                    <p class="card-text"><strong>lieu :</strong> <?php echo ($train['lieu']) ?></p>
                                                    <p class="card-text"><strong>heure :</strong> <?php echo ($train['heure']) ?></p>
                                                    <p class="card-text"><strong>categorie :</strong> <?php echo ($train['categorie']) ?></p>
                                                    <p class="card-text"><strong>Nombre maximun :</strong> <?php echo ($train['nombre_Max']) ?></p>
                                                    <p class="card-text"><strong>description :</strong> <?php echo ($train['description']) ?></p>
                                                    
                                                    <input type="hidden" name="entrainement_Id" value="<?php echo htmlspecialchars($train['entrainement_Id']); ?>">
                                                    
                                                    <?php
                                                    $userInscrit = false ?>
                                                    <?php foreach ($list as $list_inscri): ?>
                                                        <?php if ($list_inscri['nom_Course'] == $train['entrainement_Id'] && $_SESSION['user_mail'] == $list_inscri['mail_Inscrit']): ?>
                                                            <?php $userInscrit = true ?>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
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

                                    
                                <?php endforeach ?>
                            </div>

                        <?php else: ?>
                            <div class="row">
                                <?php foreach ($training as $train): ?>
                                    <div class="col-md-6">
                                        <div class="card mt-4">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo ($train['titre']) ?></h5>
                                                <h6 class="card-subtitle mb-2 text-muted"><strong>date :</strong> <?php echo ($train['date']) ?></h6>
                                                <p class="card-text"><strong>lieu :</strong> <?php echo ($train['lieu']) ?></p>
                                                <p class="card-text"><strong>heure :</strong> <?php echo ($train['heure']) ?></p>
                                            </div>
                                        </div>
                                    </div>
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