<?php
function spaceUsed($username){
// session_start();
$command = "sudo du -s /home/{$username} | awk '{print $1}'";
$output = shell_exec($command);
var_dump($output);
return formatBytes($totalUsedSpace);
}

function memoryUsed(){
$command = "cat /proc/meminfo | grep '^Uid' | awk '{user=int($2); getline < \"/proc/stat\"; mem=$6; printf \"User %d Memory: %s kB\n\", user, mem}'";
$output = shell_exec($command);
var_dump($command);
var_dump($output);
return $output;

}
function cpuLoad(){
$command = "cat /proc/stat | grep 'cpu ' | awk '{usage=($2+$4)*100/($2+$4+$5)} END {printf \"CPU Load: %.2f%%\\n\", usage}'";

$output = shell_exec($command);
var_dump($command);
var_dump($output);
return $output;
}


function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    $bytes /= (1 << (10 * $pow));

    return round($bytes, $precision) . ' ' . $units[$pow];
}
?>
