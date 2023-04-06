<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Créer un compte utilisateur Debian</title>
</head>

<body>
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
</body>

</html>
