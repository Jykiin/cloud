<?php
require_once dirname(__FILE__,2).'/connexion.php';
require_once dirname(__FILE__,3).'/script/getUsersData.php';
require_once dirname(__FILE__,3).'/script/login-user.php';
?>

<h1> Erreur </h1>
<?php
var_dump($_POST);
?>