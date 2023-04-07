#!/bin/bash

# droit pour le repertoire du user
sudo chown -R $1:www-data /home/$1
sudo chmod -R 755 /home/$1
# droit pour le fichier ssh
# sudo chown -R $1:www-data home/$1/authorized_keys
# sudo chmod -R 755 /home/$1