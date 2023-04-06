#!/bin/bash

sudo useradd -m $1
sudo echo $1:$2 | sudo chpasswd
sudo mkdir /home/$1/.ssh | echo "$3" >> /home/$1/.ssh/authorized_keys

