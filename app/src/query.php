<?php
require 'db.php';
function createTable(){
    $sql = "CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50) UNIQUE
    )";
    
    // Execute query
    if (mysqli_query($conn, $sql)) {
        echo "Table users created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }
     
}
?>