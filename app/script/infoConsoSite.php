<?php
session_start();
require dirname(__FILE__, 0) . 'getUsersData.php';
$username = $_SESSION['username'];

$bdd_host = "localhost";
$bdd_username= "groupe16";
$bdd_password = "";
$bdd_name = "groupe16";

$username_folder = null;
$user_bdd_name = null;

$userSiteSize = "";
$userBddSize = "";

if (isset($username)) {
    $getUserData = new GetUserData($bdd_host, $bdd_username, $bdd_password, $bdd_name);
    $userData = $getUserData->getByUserName($username);

    $username_folder = $userData['username'];
    $user_bdd_name = $userData['username'];
}

if(isset($username) && isset($username_folder) && isset($user_bdd_name)) {
# récupération de la taille du dossier utilisateur
$dossier_utilisateur = shell_exec("./info_conso_site.sh $username_folder");

# récupération de la taille de la base de données utilisateur
$db_utilisateur = shell_exec("./info_conso_bdd.sh $username $user_bdd_name");

function consoData($dossier_utilisateur, $db_utilisateur) {
    $user_datas = [];
    array_push($user_datas, $dossier_utilisateur,$db_utilisateur);
    return $user_datas;
}
    $user_datas = consoData($dossier_utilisateur, $db_utilisateur);
    $userSiteSize = $user_datas[0];
    $userBddSize = $user_datas[1];
}

if((isset($userBddSize) && isset($userSiteSize)) && (!empty($userBddSize) && !empty($userSiteSize)))  {
    fastcgi_finish_request();
    shell_exec("./restartNginx.sh");
    header("Location: /?user_site_size=" . urlencode($userSiteSize)."&user_bdd_size=". urlencode($userBddSize));
    exit();
} else {
    header("Location: /?error_data=invalid_values");
}
