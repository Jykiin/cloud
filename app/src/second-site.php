<?php
session_start();
$username = $_SESSION["username"];
echo $username;
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css" class="css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <title>Créer un second site</title>
</head>

<body>
  <main class="sign-in-page container">
    <h1 class="text-center text-primary fw-bold fs-5">Création d'un site</h1>
    <form method="post" action="../script/new-site.php">
      <div class="mb-3">
        <label for="domainName" class="form-label">Nom de domaine:</label>
        <div><input type="text" id="domainName" name="domainName" aria-describedby="domainName" required><span>-groupe16.fr</span></div>
      </div>
      <button type="submit" class="mt-3 btn btn-primary">Créer votre site et sa BDD</button>
    </form>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
