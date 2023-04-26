<?php
session_start();
$username = $_SESSION["username"];
echo ("test");
echo $username;
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Accueil</title>
  </head>
  <body>
    <div class="container w-100 flex align-items-center justify-content-center">
      <h1 class="mt-5 text-center fw-bold text-primary fs-4">Accueil projet cloud</h1>
      <p class="mt-2 text-center"> Bienvenue chez nous, inscrivez-vous ou rejoignez votre compte:</p>
      <nav class="shadow border border-1 border-success d-flex flex-column gap-2 align-items-center justify-content-center">
      <a class="my-2 btn btn-primary w-25" href="/">Accueil</a>
          <?php if(isset($_GET['info']) && $_GET['info'] === 'supp_account') { ?>
              <p class="text-info text-lg fw-bold">Vous avez bien supprimé votre compte, mais nous espérons qu'un jour vous reviendrez nous revoir.</p>
          <?php } ?>
          <?php if(isset($_GET['error']) && $_GET['error'] === 'supp_groupe16') { ?>
              <p class="text-info">Vous êtes le compte administrateur <?= $_SESSION['username'] ?> or ce compte ne peut être supprimé via ce bouton.</p>
              <p class="text-info">Ecrivez à votre responsable pour effectuer la démarche.</p>
          <?php } ?>

      <?php

      if(!$_SESSION["username"]){
          echo '<a class="my-2 btn btn-primary w-25" href="src/sign-in.php">Inscription</a>
      <a class="my-2 btn btn-primary w-25" href="src/connexion.php">Connexion</a>';

      }else{
          echo '<div class="mx-auto p-2 d-flex flex-column justify-content-start align-items-center">';
          echo ' <a class="my-2 btn btn-primary w-100" href="src/change_pass.php">Changer mon mot de passe</a>';
          echo ' <a class="my-2 btn btn-warning w-100" href="src/logout.php">se déconnecter</a>';
          echo ' <a class="my-2 btn btn-danger w-100" href="script/deleteUser/deleteUser.php">Supprimer mon compte</a>';
          echo '</div>';
      }
      ?>

  </nav>
</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
