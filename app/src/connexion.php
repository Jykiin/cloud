<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
  <title>Se connecter à son compte</title>
</head>

<body class="login-form">

<main class="container">
	<div class="card">
		<div class="card-image">
			<h2 class="card-heading">
				Heureux de vous revoir !
				<small>Plus que quelques pas pour nous retrouver...</small>
			</h2>
		</div>
        <div>
            <?php if(isset($_GET['error']) && $_GET['error'] === 'invalid_password') { ?>
                       <p class="warning-statement">Votre mot de passe est invalide.</p>
                <?php } ?>
            <?php if(isset($_GET['error']) && $_GET['error'] === 'invalid_username') { ?>
                <p class="warning-statement"> Qui êtes-vous ? Nous ne vous trouvons pas dans la base. </p>
            <?php } ?>
            <?php if(isset($_GET['error']) && $_GET['error'] === 'error_from_bdd') { ?>
                    <p class="warning-statement"> Nous ne trouvons pas votre nom dans la base. </p>
                <?php } ?>
            <?php if(isset($_GET['error']) && $_GET['error'] === 'no_value') { ?>
                <p class="warning-statement"> Merci d'entrer des valeurs valides. </p>
            <?php } ?>
            <?php if(isset($_GET['error']) && $_GET['error'] === 'oK') { ?>
                <p class="warning-statement"> Vous êtes connecté </p>
            <?php } ?>
        </div>
		<form class="card-form" action="../script/login-user.php" method="post">
			<div class="input">
				<input placeholder="paul" id="username" type="text" class="input-field" name="username" required/>
				<label for="username" class="input-label">Mon nom d'utilisateur</label>
			</div>
						<div class="input">
				<input id="password" type="password" class="input-field" name="password" required/>
				<label for="password" class="input-label">Mon mot de passe</label>
			</div>
			<div class="action">
				<button type="submit" class="action-button">Let's go !</button>
			</div>
		</form>
	</div>
</main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
          crossorigin="anonymous"></script>
</body>

</html>
