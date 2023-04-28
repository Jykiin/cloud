#!/bin/bash
# $1 - nom utilisateur
# $2 - nom de base de donnée
# $3 - mot de passe
mysql -u $1 -p"$3" -e "SELECT table_schema AS $2, ROUND(SUM(data_length + index_length)) / 1024 / 1024 AS SizeInMB FROM information_schema.TABLES GROUP BY table_schema;" | awk 'NR==2{gsub(/[^0-9.]/,"",$2); print $2}'
