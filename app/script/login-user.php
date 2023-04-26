<?php
require dirname(__FILE__, 0).'getUsersData.php';

if(isset($_POST['account_login']))  {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    if(isset($username) && isset($password)) {
        $getUserData = new GetUserData("localhost", "groupe16", "", "groupe16");
        $userData = $getUserData->getByUserName($username);
        if($userData)  {
            if($userData['username'] === $username && $userData['password'] === $password) {
                $_SESSION['user'] = $username;
                http_response_code(200);
                header('Location: /src/welcome.php');
                exit();

            }
        }
    }
}