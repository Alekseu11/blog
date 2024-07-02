<?php
require 'config/config.php';
error_reporting(E_ALL); 
ini_set('display_errors', 1);
start_session(); 

new PDO("mysql:host=localhost;dbname=blog", 
"user", "user")
try {
    
    $conn = new PDO("mysql:host=localhost;dbname=blog", 
    "user", "user");
    echo "Database connection established";
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

