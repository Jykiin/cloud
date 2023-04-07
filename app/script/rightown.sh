#!/bin/bash

# Créez le dossier pour le site
sudo chown -R $1:www-data home/$1
sudo chmod -R 755 /home/$1