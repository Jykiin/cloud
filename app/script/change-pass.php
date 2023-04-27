<?php
session_start();
$username = $_SESSION["username"];
$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];
$confirmpassword = $_POST['confirmpassword'];

// Check if the new password and confirm password match
if($newpassword !== $confirmpassword) {
    echo "Error: New password and confirm password do not match.";
} else {
    $mysqli = new mysqli("localhost","groupe16","","groupe16");
    // Check connection
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
    $sql = "UPDATE users SET pwd = '$newpassword' WHERE username = '$username';";
    if ($mysqli->query($sql)) {
        echo("Password updated successfully.<br />");
        header('Location: /');
    }
    if ($mysqli->errno) {
        echo("Could not update password <br />".$mysqli->error);
    }
    $mysqli->close();
    // fastcgi_finish_request();
    // shell_exec("./restartNginx.sh");
    // Use the exec function to run the passwd command
    shell_exec("./changePass.sh",$username,$newpassword);

    // Check the return status and display a message accordingly
    if($return_var === 0) {
        echo "Password changed successfully.";
    } else {
        echo "Error: " . $output;
    }
}
