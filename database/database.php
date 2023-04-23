<?php
    $host = "localhost";
    $dbname = "super_market";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<h1 style='text-align: center; color: green;'>Connected successfully</h1>";
      } catch(PDOException $e) {
        echo "<h1 style='text-align: center; color: red;'>Connetion failed </h1>: \n " . $e->getMessage();
      }
?>
