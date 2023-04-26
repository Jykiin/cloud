#!/bin/bash

# Effacer l'utilisateur et ses données (mot de passe etc...) et l'enlever du groupe www-data
sudo deluser -m $1 -g www-data

# Effacer la clé ssh de /.ssh/authorized_keys

# Supprimer le fichier de configuration Nginx
sudo rm /etc/nginx/sites-enabled/$3-groupe16.fr

# Supprimer le dossier utilisateur
sudo rm -r /home/$1