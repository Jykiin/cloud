#!/bin/bash
# $1 - nom utilisateur
# $2 - nom de la base de donnée utilisateur
#mysql -u $1 -p -e "SELECT table_schema AS $1, ROUND(SUM(data_length + index_length)) / 1024 / 1024 AS SizeInMB FROM information_schema.TABLES GROUP BY table_schema;";
mysql -u $1 -p -e "SELECT table_schema "$2", ROUND(SUM(data_length + index_length) / 1024 / 1024, 1) "DB Size in MB" FROM information_schema.tables GROUP BY table_schema;"
