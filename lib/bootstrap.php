<?php
require 'config/config.php';
    error_reporting(E_ALL); 
    ini_set('display_errors', 1);
    session_start(); 

try {
    
    $conn = new PDO("mysql:host=" . DB_HOST. ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit(1);
}
