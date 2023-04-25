<?php
shell_exec("./createuser.sh $username $password $domain");

shell_exec("./rightown.sh $username");

shell_exec("./createbdd.sh $username $password ");
$file = fopen("/home/$username/.ssh/authorized_keys", "a");
fwrite($file, $ssh);
fclose($file);

echo "<h1 style='color: green;'>Le script pour créer le compte de <strong style='color: black'>$username</strong> a été appelé ! </h1>";

fastcgi_finish_request();

// shell_exec("./restartNginx.sh");

require('./cobdd.php');

$query = $pdo->prepare("INSERT INTO users (username, pwd, ssh, domain_name) VALUES (:username, :pwd, :ssh, :domain_name)");
$query->execute(array(
    'username' => $_POST['username'],
    'pwd'=> $_POST['pwd'],
    'ssh' => $_POST['ssh'],
    'domain_name' => $_POST['domain_name']
));

// Execute query
if ($query) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
