<?php
session_start();
$username = $_SESSION["username"];
$domain = filter_input(INPUT_POST, "domainName");
shell_exec("./create-site.sh $username $domain ");
