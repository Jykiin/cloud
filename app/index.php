<?php
session_start();
$username = $_SESSION["username"];
require_once __DIR__. '/script/getUsersData.php';
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
<!--  <a href="http://4.231.249.233/home/backup/backup-amaury-2023-04-27_10-32-58.tgz">backup-amaury-2023-04-27_10-32-58.tgz</a>-->
    <div class="container w-100 d-flex flex-column align-items-center justify-content-center">
      <h1 class="mt-5 text-center fw-bold text-primary fs-4">Accueil projet cloud</h1>
      <p class="mt-2 text-center"> Bienvenue chez nous, inscrivez-vous ou rejoignez votre compte:</p>
      <nav class="shadow w-100 p-5 d-flex flex-column gap-2 align-items-center justify-content-center">
          <div class="d-flex flex-column gap-2 align-items-center justify-content-center">
              <a class="my-2 btn btn-primary" href="/">Accueil</a>
              <?php
      if (!$_SESSION["username"]) {
        echo '<a class="my-2 btn btn-primary" href="src/sign-in.php">Inscription</a>
                <a class="my-2 btn btn-primary" href="src/connexion.php">Connexion</a>';
          }else{
              echo ' <a class="my-2 btn btn-primary" href="src/updatepass.php">Changer mon mot de passe</a>';
              echo ' <a class="my-2 btn btn-primary" href="src/logout.php">se déconnecter</a>';
              echo ' <a class="my-2 btn btn-warning" href="src/backup.php">télécharger backup</a>';
              echo ' <a class="my-2 btn btn-primary" href="src/second-site.php">Créer un second site</a>';
          }
              ?>
          </div>

    <?php
          if($_SESSION["username"]){ ?>
          <h2 class="mt-5 mb-1 text-info fw-bold text-center" href="src/sign-in.php">Mes informations</h2>
              <div class="d-flex flex-column justify-content-center align-items-center">
                  <div class="p-2 d-flex flex-column justify-content-center align-items-center gap-1">

                      <?php
                      $username = $_SESSION['username'];
                      $getUserData = new GetUserData('localhost', 'groupe16', '', 'groupe16');
                      $userData = $getUserData->getDomainsByUserName($username);
                      var_dump($userData);
                      $domains = $getUserData->getUsers();
                          echo '<h4> Site(s) web sur mon compte: </h4>';
                          echo '<p class="my-2 text-info text-center fw-bold">Cliquez sur le ou les site(s) web pour obtenir vos données de consommations.</p>';
                          foreach($domains as $domain):
                              if($domain['username'] === $_SESSION['username']): ?>

                              <div class="list-group">
                                  <a href="script/infoConsoSite.php?domain=<?php echo urlencode($domain['domain_name']) ?>" class="my-1 list-group-item list-group-item-action bg-success text-white fw-bold border border-0">
                                      <?= $domain['domain_name'] ?>
                                  </a>
                              </div>

                              <?php endif ?>
                          <?php endforeach ?>
                          <h4>Ma consommation par site(s) web:</h4>
                  </div>
                  <?php if(!isset($_GET['user_site_size']) || !isset($_GET['user_bdd_size'])) { ?>
                          <?php if(!isset($_GET['error_data'])) { ?>
                      <p class="warning-statement fw-bold text-lg"> Aucune donnée n'est disponible pour l'instant.</p>
                      <?php } ?>
                  <?php } else { ?>
                      <div>
                          <table class="table table-striped">
                              <thead>
                              <tr>
                                  <th scope="col">Taille dossier sur disque</th>
                                  <th scope="col">Taille base de donnée</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td><?php echo $_GET['user_site_size'] ?></td>
                                  <td><?php echo $_GET['user_bdd_size'] ?></td>
                              </tr>
                              </tbody>
                          </table>
                      </div>
                  <?php } ?>
                  <?php if(isset($_GET['error_data']) && $_GET['error_data'] === 'invalid_values')  { ?>
                      <p class="warning-statement fw-bold text-lg text-danger">Une erreur s'est produite lors de la génération des données.</p>
                      <p class="warning-statement fw-bold">Contacter le service client pour avoir plus d'information</p>
                  <?php }  ?>

              </div>
         <?php } ?>

  </nav>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
