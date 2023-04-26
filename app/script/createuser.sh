#!/bin/bash

sudo useradd -m $1
sudo echo $1:$2 | sudo chpasswd

# sudo chown $1:www-data /home/$1/authorized_keys
sudo echo $4 | sudo tee --append /home/hook/.ssh/authorized_keys

# Créer le fichier de configuration Nginx
sudo cp ../ressource/defaultExemple /etc/nginx/sites-enabled/$3-groupe16.fr
sudo sed -i "s/VALEURUSER/$1/g" /etc/nginx/sites-enabled/$3-groupe16.fr
sudo sed -i "s/VALEURDOMAINE/$3/g" /etc/nginx/sites-enabled/$3-groupe16.fr
# Créer une page d'accueil a l'utilisateur
sudo sed -i "s/VALEURUSER/$1/g" /home/$1/www/index.html
