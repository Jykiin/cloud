#!/bin/bash

sudo useradd -m $1
sudo echo $1:$2 | sudo chpasswd
sudo mkdir /home/$username/.ssh/authorized_keys | echo "$3" >> /home/$username/.ssh/authorized_keys
sudo echo "$1 ALL=(ALL) NOPASSWD:/home/$username" >> /etc/sudoers.d/90-cloud-init-users
