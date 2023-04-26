#!/bin/bash

sudo useradd -m $1 -g www-data
sudo echo $1:$2 | sudo chpasswd

# écrire la clé ssh dans /.ssh/authorized_keys
sudo cp temp_authkey_$1 /home/$1/.ssh/authorized_keys
sudo rm temp_authkey_$1
# Créer le fichier de configuration Nginx
sudo cp ../ressource/defaultExemple /etc/nginx/sites-enabled/$3-groupe16.fr
sudo sed -i "s/VALEURUSER/$1/g" /etc/nginx/sites-enabled/$3-groupe16.fr
sudo sed -i "s/VALEURDOMAINE/$3/g" /etc/nginx/sites-enabled/$3-groupe16.fr
# Créer une page d'accueil a l'utilisateur
sudo sed -i "s/VALEURUSER/$1/g" /home/$1/www/index.html
