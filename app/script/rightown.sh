#!/bin/bash

# droit pour le repertoire du user www et .ssh
sudo chmod -R 775 /home/$1/.ssh
sudo chmod -R 775 /home/$1/www
