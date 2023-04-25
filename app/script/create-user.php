<?php

$username = $_GET['username'];
$password = $_GET['password'];
$domain = $_GET['domainName'];
$ssh = $_GET['ssh'];

shell_exec("./createuser.sh $username $password $domain");

shell_exec("./rightown.sh $username");

shell_exec("./createbdd.sh $username $password ");
$file = fopen("/home/$username/.ssh/authorized_keys", "a");
fwrite($file, $ssh);
fclose($file);
echo "<h1 style='color: green;'>Le script pour créer le compte de <strong style='color: black'>$username</strong> a été appelé ! </h1>";
fastcgi_finish_request();

shell_exec("./restartNginx.sh");
