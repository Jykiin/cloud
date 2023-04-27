<?php
session_start();
$username = $_SESSION["username"];
echo $username;
$domain = filter_input(INPUT_POST, "domainName");
echo $domain;
shell_exec("./create-site.sh $username $domain ");
