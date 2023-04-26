#!/bin/bash

# droit pour le repertoire du user
sudo chown -R $1:www-data /home/$1
sudo chmod -R 777 /home/$1
# droit pour le fichier ssh
