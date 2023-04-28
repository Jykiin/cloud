<?php
session_start();
require dirname(__FILE__, 0) . 'getUsersData.php';
$username = $_SESSION['username'];
$user_bdd_name = "";
$user_bdd_username = "";

$bdd_host = "localhost";
$bdd_username= "groupe16";
$bdd_password = "";
$bdd_name = "groupe16";
$getUserData = new GetUserData($bdd_host, $bdd_username, $bdd_password, $bdd_name);
$domains = $getUserData->getDomainsByUserName($username);
if (isset($_GET['domain'])) {
    $domain = $_GET['domain'];
    if($domain === $domains[0])  {
        $user_bdd_name = $username;
        $user_bdd_username = $username;
        $www = "www";
    } else  {
        $user_bdd_name = $username."_2";
        $user_bdd_username = $username."_2";
        $www = "www2";
    }
} else {
    header('Location /?error=no_domain');
}

$username_folder = $username;
$user_bdd_password = "";

$userSiteSize = "étoile";
$userBddSize = "lapin";

if (isset($username)) {
    $userData = $getUserData->getByUserName($username);
    if($userData) {
        $user_bdd_password = $userData['pwd'];
    }
}

# récupération de la taille du dossier utilisateur
if(!empty($username_folder) && !empty($www))  {
$dossier_utilisateur = shell_exec("./info_conso_site.sh $username_folder $www");
    $userSiteSize = $dossier_utilisateur;
}
# récupération de la taille de la base de données utilisateur
if(!empty($user_bdd_username) && !empty($user_bdd_name) && !empty($user_bdd_password))  {
    $db_utilisateur = shell_exec("./info_conso_bdd.sh $user_bdd_username $user_bdd_name $user_bdd_password");
    $userBddSize = $db_utilisateur." MB";
}

if(!empty($username_folder))  {
    header("Location: /?user_site_size=" . urlencode($userSiteSize)."&user_bdd_size=". urlencode($userBddSize));
    exit();
} else {
    header("Location: /?error_data=invalid_values");
}
