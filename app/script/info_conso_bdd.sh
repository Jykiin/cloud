#!/bin/bash
# $1 - nom utilisateur
# $2 - nom de base de donnée
# $3 - mot de passe
##mysql -u $1 -p -e "SELECT table_schema AS $1, ROUND(SUM(data_length + index_length)) / 1024 / 1024 AS SizeInMB FROM information_schema.TABLES GROUP BY table_schema;";
#mysql -u $1 -p -e "SELECT table_schema "$2", ROUND(SUM(data_length + index_length) / 1024 / 1024, 1) "DB Size in MB" FROM information_schema.tables GROUP BY table_schema;"
#mysql -u gustave -p'pass' -e "SELECT table_schema AS gustave, ROUND(SUM(data_length + index_length)) / 1024 / 1024 AS SizeInMB FROM information_schema.TABLES GROUP BY table_schema;"
#mysql -u $1 -p'$3' -e "SELECT table_schema AS $2, ROUND(SUM(data_length + index_length)) / 1024 / 1024 AS SizeInMB FROM information_schema.TABLES GROUP BY table_schema;" | php -r "echo urlencode(file_get_contents('php://stdin'));"
#mysql -u $1 -p'$3' -e "SELECT table_schema AS $2, ROUND(SUM(data_length + index_length)) / 1024 / 1024 AS SizeInMB FROM information_schema.TABLES GROUP BY table_schema;" | awk '{print $2}'
mysql -u $1 -p'§3' -e "SELECT table_schema AS §2, ROUND(SUM(data_length + index_length)) / 1024 / 1024 AS SizeInMB FROM information_schema.TABLES GROUP BY table_schema;" | awk '{print $2}' | sed 's/\.//g' | awk '{print $0 " MB"}'
