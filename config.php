<?php
    $host = 'mushroom.mysql.database.azure.com';
    $dbusername = 'Mushroom';
    $dbpassword = 'QueenV2025';
    $database = 'mushroom';

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
