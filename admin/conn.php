<?php
 $servername = "server25";
 $username = "tfxltioudc_admin";
 $password ="N&0GZZ69RpsZ";

 try {
   $conn = new PDO("mysql:host=$servername;dbname=tfxltioudc_sjndb", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch(PDOException $e) {
   echo "Connection failed: " . $e->getMessage();
 }
?>