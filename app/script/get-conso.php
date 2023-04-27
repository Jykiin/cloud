<?php
session_start();
// Variables
$USER = $_SESSION['username'];
$SCRIPT = "./get-conso.sh $USER $USER";

// Call usage script
$usage = shell_exec("sudo -u $USER $SCRIPT");

// Display usage information
echo "<pre>$usage</pre>";

