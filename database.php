<?php
$servername = "localhost:3306";
$DBusername = "root";
$DBpassword = "";
$port="3306";

try {
    $conn = new PDO("mysql:host=$servername;;port=$port;dbname=finaldb", $DBusername, $DBpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>