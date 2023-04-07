<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css" class="css">
  <title>Créer un compte utilisateur Debian</title>
</head>

<body class="sign-in">
  <main>
    <h1>Créer un compte utilisateur Debian</h1>
    <form method="get" action="../script/create-user.php">
      <label for="username">Nom d'utilisateur :</label>
      <input type="text" id="username" name="username" required><br>
      <label for="password">Mot de passe :</label>
      <input type="password" id="password" name="password" required><br>
      <label for="ssh">Votre clé SSH :</label>
      <textarea name="ssh" id="ssh" cols="30" rows="10"></textarea>
      <button type="submit">Créer le compte utilisateur</button>
    </form>
  </main>
</body>

</html>

