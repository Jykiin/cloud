#!/bin/bash

# Récupérer les données du formulaire HTML
username=$(echo "$QUERY_STRING" | awk -F'=' '{print $2}')
password=$(echo "$QUERY_STRING" | awk -F'=' '{print $3}')

# Créer le compte utilisateur
useradd "$username"

# Définir le mot de passe pour le compte utilisateur
echo "$username:$password" | chpasswd

# Ajouter le compte utilisateur au groupe sudo pour accorder les privilèges de superutilisateur
usermod -aG sudo "$username"

# Afficher un message de confirmation
echo "Le compte utilisateur $username a été créé avec succès."
