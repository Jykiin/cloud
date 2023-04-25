#!/bin/bash

sudo useradd -m $1
sudo echo $1:$2 | sudo chpasswd

# Créer le fichier de configuration Nginx
sudo cp ../ressource/defaultExemple /etc/nginx/sites-enabled/$3.groupe16.fr
sudo sed -i "s/VALEURUSER/$1/g" /etc/nginx/sites-enabled/$3.groupe16.fr
# Créer une page d'accueil a l'utilisateur
sudo sed -i "s/VALEURUSER/$1/g" /home/$1/www/index.html
