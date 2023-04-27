#!/bin/bash

for x in *;do 
backupfile="backup$x`date +"%d-%m-%y".tgz`"
tar cvzf  $x/backup/$backupfile $x/www 
done