
$engine = "mysql";
$host = "localhost";
$port = 3306;
$dbName = "root_info";
$username = "root";
$password = "";
$pdo = new PDO("host=$host;dbname=$dbName", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
