<?php
session_start();
$username = $_SESSION["username"];
$domain = filter_input(INPUT_POST, "domainName");
$password = filter_input(INPUT_POST, "password");
shell_exec("./create-site.sh $username $domain");
shell_exec("./createbdd.sh $username-2 $password");
header('Location: /');
exit();
fastcgi_finish_request();
shell_exec("./restartNginx.sh");
