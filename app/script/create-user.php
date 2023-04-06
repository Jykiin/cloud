<?php
# Récupérer les données du formulaire HTML
$username = $_GET['username'];
$password = $_GET['password'];

# Créer le compte utilisateur
shell_exec("useradd –m  $username");

# Définir le mot de passe pour le compte utilisateur
shell_exec("sudo echo '$username:$password' | sudo chpasswd");

# Ajouter le compte utilisateur au groupe sudo pour accorder les privilèges de superutilisateur
#shell_exec("usermod -aG sudo $username");

# Afficher un message de confirmation
echo "<h1 style='color: green;'>Le compte utilisateur <strong style='color: black'>$username</strong> a été créé avec succès. </h1>";
