#!/bin/bash
# $1 - nom dossier utilisateur
du -sh /home/$1 | awk '{print $1}'
