#!/bin/bash

sudo useradd –m $1;
sudo echo '$1:$2' | sudo chpasswd;
