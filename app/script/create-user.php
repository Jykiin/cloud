<?php
$username = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");
$domain = filter_input(INPUT_POST, "domainName");
$ssh = filter_input(INPUT_POST, "ssh");

//require('cobdd.php');
//$query = $pdo->prepare("INSERT INTO users (username, pwd, ssh, domain_name) VALUES (:username, :pwd, :ssh, :domain_name)");
//$query->execute(array(
//    'username' => $username,
//    'pwd'=> $password,
//    'ssh' => $ssh,
//    'domain_name' => $domain
//));


shell_exec("./createuser.sh $username $password $domain");

shell_exec("./rightown.sh $username");

shell_exec("./createbdd.sh $username $password ");
$file = fopen("/home/$username/.ssh/authorized_keys", "a");
fwrite($file, $ssh);
fclose($file);
$mysqli = new mysqli("localhost","groupe16","","groupe16");

// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
$sql = "INSERT INTO users (username, pwd, ssh, domain_name) VALUES ('$username','$password','$ssh','$domain')";

if ($mysqli->query($sql)) {
    echo("Record inserted successfully.<br />");
    header('Location: ../src/welcome.php');
}
if ($mysqli->errno) {
    echo("Could not insert <br />".$mysqli->error);
}
$mysqli->close();
//echo "<h1 style='color: green;'>Le script pour créer le compte de <strong style='color: black'>$username</strong> a été appelé ! </h1>";

fastcgi_finish_request();

shell_exec("./restartNginx.sh");
