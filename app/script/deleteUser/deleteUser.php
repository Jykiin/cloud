<?php
session_start();
$activeUser = $_SESSION['username'];

$bdd_host = "localhost";
$bdd_username= "groupe16";
$bdd_password = "";
$bdd_name = "groupe16";
$getUserData = new GetUserData($bdd_host, $bdd_username, $bdd_password, $bdd_name);
$userData = $getUserData->getByUserName($activeUser);

if($activeUser === 'groupe16' || $userData['username'] === 'groupe16') {
    header('Location: /?error=supp_groupe16');
    exit();
} else  {

$username = $userData['username'];
$password = $userData['pwd'];
$domain = $userData['domain_name'];
shell_exec("./deleteUser.sh $username $password $domain");

shell_exec("./deletebdd.sh $username $password");

// il manque un script pour delete la clé ssh

$mysqli = new mysqli("localhost","groupe16","","groupe16");
// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
$sql = "DELETE FROM users WHERE username = ?";


if ($query = $this->mysqli->prepare($sql)) {
    $query->bind_param("s", $username);

    if ($query->execute()) {
        echo("Record deleted successfully.<br />");
        header('Location: /');
    } else {
        echo "Error executing statement: " . $query->error;
    }
    $query->close();

    if ($mysqli->errno) {
    echo("Could not delete <br />".$mysqli->error);
    }
}

$mysqli->close();
session_unset();
session_destroy();

//fastcgi_finish_request();
//shell_exec("../restartNginx.sh");
header('Location: /?info=supp_account');
exit();
}