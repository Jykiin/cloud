sudo mysql -e "CREATE DATABASE $1;"
sudo mysql -e "CREATE USER '$2'@'localhost' IDENTIFIED BY '$2';"
sudo mysql -e "CREATE USER 's1'@'localhost' IDENTIFIED BY password;"
sudo mysql -e "GRANT ALL PRIVILEGES ON $1!.* TO '$2'@'localhost';"