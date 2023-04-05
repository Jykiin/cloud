<?php
# Récupérer les données du formulaire HTML
$username = $_GET['username'];
$password = $_GET['password'];

# Créer le compte utilisateur
shell_exec("useradd $username");

# Définir le mot de passe pour le compte utilisateur
shell_exec("sudo $username:$password | chpasswd");

# Ajouter le compte utilisateur au groupe sudo pour accorder les privilèges de superutilisateur
shell_exec("usermod -aG sudo $username");

# Afficher un message de confirmation
echo "<h1 style='color: green;'>Le compte utilisateur $username a été créé avec succès. </h1>";
