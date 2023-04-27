<?php


// Variables
$BACKUP_DIR = "/home/backup";
$file = $_GET['file'];

// Telechagement
if (file_exists("$BACKUP_DIR/$file")) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize("$BACKUP_DIR/$file"));
    readfile("$BACKUP_DIR/$file");
    exit;
} else {
    echo "Le backup n'existe po.";
}

