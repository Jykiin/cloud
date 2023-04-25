<!-- cette page permet de se connecter à la base de donnée -->
<?php
$engine = "mariaDB";
$host = "localhost";
$port = 3306;
$dbName = "root_info";
$username = "root";
$password = "";
$pdo = new PDO("$engine:host=$host;dbname=$dbName", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
