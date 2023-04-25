<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css" class="css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <title>Créer un compte utilisateur Debian</title>
</head>

<body>
  <main class="sign-in-page container">
    <h1 class="text-center text-primary fw-bold fs-5">Création de compte</h1>
    <p class="text-center">Créer un compte utilisateur sur notre magnifique hébergeur</p>
    <form method="post" action="../../app/script/create-user.php">
      <div class="mb-3">
        <label for="username" class="form-label">Nom d'utilisateur:</label>
        <input  type="text" id="username" name="username" aria-describedby="username" required>
      </div>
        <div class="mb-3">
            <label for="domainName" class="form-label">Nom de domaine:</label>
            <div><input  type="text" id="domainName" name="domainName" aria-describedby="domainName" required><span>-groupe16.fr</span></div>
        </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mot de passe: </label>
        <input type="password" id="password" name="password" class="form-control" required>
      </div>
      <div>
          <label for="ssh">Votre clé SSH :</label>
          <textarea name="ssh" id="ssh" cols="10" rows="10"  class="form-control"></textarea>
      </div>
      <button type="submit" class="mt-3 btn btn-primary">Créer votre compte</button>
    </form>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>

