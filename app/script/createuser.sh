#!/bin/bash

sudo useradd -m $1
sudo echo $1:$2 | sudo chpasswd
sudo mv authorized_keys /home/$1/.ssh/


# Vérifiez si le nom du site est fourni
if [ $# -eq 0 ]; then
    echo "Veuillez fournir le nom du site"
    exit 1
fi

# Créez le dossier pour le site
mkdir /var/www/$1
chown -R $1:www-data /var/www/$1
chmod -R 755 /var/www/$1

# Créez le fichier de configuration Nginx
cat << EOF > /etc/nginx/sites-available/$1
server {
    listen 80;
    server_name $1.com;
    root /var/www/$1;
    index index.html;

    location / {
        try_files \$uri \$uri/ =404;
    }
}
EOF

# Activez le site
ln -s /etc/nginx/sites-available/$1 /etc/nginx/sites-enabled/

# Redémarrez Nginx
service nginx restart

