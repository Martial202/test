<?php
    $user ="root";
    $pass = "";
    $dsn = "mysql:host=localhost;dbname=Gest_Stock";

         try {
         	$cnx = new PDO($dsn,$user,$pass);
         } catch (Exception $e) {
         	echo "Error: ".$e->getMessage();
         }
?>