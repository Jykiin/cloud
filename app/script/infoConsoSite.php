<?php
session_start();
require dirname(__FILE__, 0) . 'getUsersData.php';
$username = $_SESSION['username'];

//$bdd_host = "localhost";
//$bdd_username= "groupe16";
//$bdd_password = "";
//$bdd_name = "groupe16";

$username_folder = null;
$user_bdd_name = null;

$userSiteSize = "";
$userBddSize = "";

//if (isset($username)) {
//    $getUserData = new GetUserData($bdd_host, $bdd_username, $bdd_password, $bdd_name);
//    $userData = $getUserData->getByUserName($username);
//
//    $username_folder = $userData['username'];
//    $user_bdd_name = $userData['username'];
//}


# récupération de la taille du dossier utilisateur
$username_folder = $_SESSION['username'];
$dossier_utilisateur = shell_exec("./info_conso_site.sh $username_folder");

//# récupération de la taille de la base de données utilisateur
//$db_utilisateur = shell_exec("./info_conso_bdd.sh $username $user_bdd_name");
$userBddSize = "lapin";
$userSiteSize = $dossier_utilisateur;

if(!empty($username_folder))  {
    fastcgi_finish_request();
    shell_exec("./restartNginx.sh");
    header("Location: /?user_site_size=" . urlencode($userSiteSize)."&user_bdd_size=". urlencode($userBddSize));
    exit();
} else {
    header("Location: /?error_data=invalid_values");
}
