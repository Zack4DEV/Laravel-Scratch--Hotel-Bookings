<?php

global $conn;

try {
   $conn = new PDO("mysql:host=localhost;dbname=db", 'root', '');
   // $conn = new PDO("sqlite:./database/DB.db");
    $conn->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// echo "Connected Successufully <br />";
}
catch (PDOException $e)
{
    echo "Connection Error: " . $e->getMessage();
}
   session_start();
?>
