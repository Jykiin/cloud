#!/bin/bash

sudo useradd -m $1
sudo echo $1:$2 | sudo chpasswd
sudo mv authorized_keys /home/$1/.ssh/
sudo cp defaultExemple /etc/nginx/sites-enabled/$1-site
sudo sed -i "s/VALEURUSER/$1/g" /etc/nginx/sites-enabled/$1-site


# Créez le dossier pour le site
sudo chown -R $1:www-data home/$1
sudo chmod -R 755 /home/$1
touch /etc/nginx/sites-enabled/$1-site
# Créez le fichier de configuration Nginx

# Redémarrez Nginx
sudo service nginx restart