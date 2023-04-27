<!DOCTYPE html>
<html>
<head>
    <title>Espace disque utilisé</title>
</head>
<body>
<h1>Espace disque utilisé :</h1>
<?php
// Appel du script bash
try {
$output = shell_exec('../script/get-conso.sh');
} catch (Exception $ex) {
    echo $ex->getMessage();
}
// Récupération de la taille du dossier utilisateur
$size = trim($output);
// Affichage de la taille formatée
echo "<p>Taille du dossier utilisateur : " . formatSizeUnits($size) . "</p>";

// Fonction pour formater la taille en unités compréhensibles
function formatSizeUnits($bytes){
    if ($bytes >= 1073741824){
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576){
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024){
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1){
        $bytes = $bytes . ' bytes';
    } elseif ($bytes == 1){
        $bytes = $bytes . ' byte';
    } else {
        $bytes = '0 bytes';
    }
    return $bytes;
}
?>
</body>
</html>