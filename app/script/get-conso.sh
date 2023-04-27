#!/bin/bash
# Variables
# $1 name of the user
# $2 name of the bdd
USER=$1
BACKUP_DIR=/home/$USER/backups
DATA_DIR=/home/$USER/data
DB_NAME=$2

# Calculate disk usage
files_usage=$(du -sh $BACKUP_DIR $DATA_DIR | awk '{print $1}' | paste -sd+ | bc)
db_usage=$(mysql -u root -p -e "SELECT SUM(data_length+index_length)/power(1024,2) FROM information_schema.tables WHERE table_schema='$DB_NAME';")
total_usage=$(echo "$files_usage + $db_usage" | bc)

# Output usage information
echo "Files usage: $files_usage"
echo "Database usage: $db_usage MB"
echo "Total usage: $total_usage MB"