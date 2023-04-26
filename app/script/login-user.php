<?php
require dirname(__FILE__, 0).'getUsersData.php';

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

$getUserData = new GetUserData("localhost", "groupe16", "", "groupe16");
$getUserData->getUsers();
$getUserData->getByUserName($username);
$getUserData->closeConnection();
