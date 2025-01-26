<?php
//delete.php

include('../conn.php');

if(isset($_POST["id"]))
{
 $file_path = 'files/' . $_POST["image_name"];
 if(unlink($file_path))
 {
  $query = "DELETE FROM properties WHERE id = '".$_POST["id"]."'";
  $statement = $conn->prepare($query);
  $statement->execute();
 }
}

?>