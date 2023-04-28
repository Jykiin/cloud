<?php
session_start();
require dirname(__FILE__, 0) . 'getUsersData.php';
$username = $_SESSION["username"];

$bdd_host = "localhost";
$bdd_username= "groupe16";
$bdd_password = "";
$bdd_name = "groupe16";
$getUserData = new GetUserData($bdd_host, $bdd_username, $bdd_password, $bdd_name);
$userData = $getUserData->getByUserName($username);

$domain = filter_input(INPUT_POST, "domainName");
$domain = htmlspecialchars($domain);
$password = $userData['pwd'];
$ssh = $userData['ssh'];
$username2 = $username."_2";

shell_exec("./create-site.sh $username $domain");
shell_exec("./createbdd.sh $username2 $password");

$getUserData->insertNewUser($username,$password,$ssh,$domain);
fastcgi_finish_request();
header('Location: /');
shell_exec("./restartNginx.sh");
