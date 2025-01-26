<?php
//update.php

include('../conn.php');

if(isset($_POST["id"]))
{


 $old_name = get_old_image_name($conn, $_POST["id"]);
 $file_array = explode(".", $old_name);
 $file_extension = end($file_array);
 $new_name = $_POST["image_name"] . '.' . $file_extension;
 $query = '';
 if($old_name != $new_name)
 {
  $old_path = 'files/' . $old_name;
  $new_path = 'files/' . $new_name;
  if(rename($old_path, $new_path))
  { 
   $query = "
   UPDATE properties 
   SET image_name = '".$new_name."', title = '".$_POST["title"]."', type = '".$_POST["type"]."', location = '".$_POST["location"]."', size = '".$_POST["size"]."', description = '".$_POST["description"]."' , price = '".$_POST["price"]."' 
   WHERE id = '".$_POST["id"]."'
   ";
  }
 }
 else
 {
  
  $query = "
   UPDATE properties 

   SET title = '".$_POST["title"]."'
   , type = '".$_POST["type"]."'
   , location = '".$_POST["location"]."'
   , size = '".$_POST["size"]."'
   , description = '".$_POST["description"]."'
   , price = '".$_POST["price"]."'


   WHERE id = '".$_POST["id"]."'
   ";
 }
 
 $statement = $conn->prepare($query);
 $statement->execute();
}
function get_old_image_name($conn, $id)
{
 $query = "
 SELECT image_name FROM properties WHERE id = '".$id."'
 ";
 $statement = $conn->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row["image_name"];
 }
}

?>