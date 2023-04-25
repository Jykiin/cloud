#!/bin/bash

sudo useradd -m $1
sudo echo $1:$2 | sudo chpasswd
sudo cat authorized_keys >> /home/$1/.ssh/authorized_keys
sudo rm authorized_keys
# Créer le fichier de configuration Nginx
sudo cp ../ressource/defaultExemple /etc/nginx/sites-enabled/$1-site
sudo sed -i "s/VALEURUSER/$1/g" /etc/nginx/sites-enabled/$1-site
# Créer une page d'accueil a l'utilisateur
sudo sed -i "s/VALEURUSER/$1/g" /home/$1/www/index.html
