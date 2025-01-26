<?php
//edit.php
include('../conn.php');

$query = "
SELECT * FROM properties 
WHERE id = '".$_POST["id"]."'
";
$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row)
{
 $file_array = explode(".", $row["image_name"]);
 $output['image_name'] = $file_array[0];
 $output['title'] = $row["title"];
 $output['type'] = $row["type"];
 $output['location'] = $row["location"];
 $output['size'] = $row["size"];
 $output['description'] = $row["description"];
 $output['price'] = $row["price"];
}

echo json_encode($output);

?>
