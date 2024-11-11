<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="connexion.css">
</head>

<?php
include('head.php');
?>


<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="Logo2_Esigelec.jpg" alt="Logo Esigelec" width="60" height="50" class="d-inline-block align-text-top">
      </a>
      <a class="navbar-brand" href="index.php"><strong>
          <h1>Running</h1>
        </strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="sidebar offcanvas offcanvas-start" id="navbarSupportedContent">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="navbarSupportedContentLabel">Running</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
            </li>
            <?php if (isset($_SESSION['user_id']) && isset($_SESSION['user_is_membreClub']) && $_SESSION['user_is_membreClub'] == 1): ?>
              <li class="nav-item">
                <a class="nav-link active" href="ajouter_un_entrainement.php">Ajouter un entrainement</a>
              </li>
            <?php else: ?>
            <?php endif; ?>
          </ul>

          <?php if (isset($_SESSION['user_id']) && isset($_SESSION['user_is_membreClub'])): ?>
            <a class="btn btn-primary" href="deconnexion.php" role="button">Déconnexion</a>
          <?php else: ?>

            <a class="btn btn-primary" href="inscription.php" role="button">Inscription</a>
            <a class="btn btn-primary btn-espace" href="connexion.php" role="button">Conexion</a>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </nav>
</body>

</html>