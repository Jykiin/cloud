<?php //phpinfo()


// Variables
$BACKUP_DIR = "/home/backup";

// Liste des backups
$backup_files = array_diff(scandir($BACKUP_DIR), array('..', '.'));

// Affichage de la liste backups
foreach ($backup_files as $file) {
    echo "<a href='/src/download.php?file=$file'>$file</a><br>";
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" class="css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Créer un compte utilisateur Debian</title>
</head>

<body>
<!--  http://4.231.249.233-->
<a href="/home/backup/backup-amaury-2023-04-27_10-32-58.tgz" download>backup-amaury-2023-04-27_10-32-58.tgz</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>