<?php
require dirname(__FILE__, 0) . 'getUsersData.php';
require dirname(__FILE__, 2) . '/src/connexion.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    getConnected($username, $password);

} elseif($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Location: /../src/connexion.php');
} else {
    header('Location: /../src/connexion.php');
}

function getConnected($username,$password) {

    $bdd_host = "localhost";
    $bdd_username= "groupe16";
    $bdd_password = "";
    $bdd_name = "groupe16";

    if (isset($username) && isset($password)) {
        $getUserData = new GetUserData($bdd_host, $bdd_username, $bdd_password, $bdd_name);
        $userData = $getUserData->getByUserName($username);

        if ($userData) {
            if ($userData['username'] === $username && $userData['password'] === $password) {
                $_SESSION['user'] = $username;

                header('Location: /src/welcome.php');
                exit();

            }
        } else {
            // En cas d'erreur, redirection vers la page d'erreur
            header('Location: /src/error_page/page-erreur.php');
            exit();
        }
    } else {
        // En cas d'erreur, redirection vers la page d'erreur
        header('Location: /src/error_page/page-erreur.php');
        exit();
    }
}


