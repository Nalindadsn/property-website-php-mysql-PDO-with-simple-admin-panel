<?php
include('../conn.php');
$query = "SELECT * FROM properties ORDER BY id DESC";
$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$number_of_rows = $statement->rowCount();
$output = '';
$output .= '
 <table class="table table-bordered table-striped">
  <tr>
   <th>Sr. No</th>
   <th>Image</th>
   <th>Name</th>
   <th>title</th>
   <th>type</th>
   <th>location</th>
   <th>size</th>
   <th>description</th>
   <th>price</th>
   <th>Edit</th>
   <th>Delete</th>
  </tr>
';
if($number_of_rows > 0)
{
 $count = 0;
 foreach($result as $row)
 {
  $count ++; 
  $output .= '
  <tr>
   <td>'.$count.'</td>
   <td><img src="crud/files/'.$row["image_name"].'" class="img-thumbnail" width="100" height="100" /></td>
   <td class="imageName">'.$row["image_name"].'</td>
   <td>'.$row["title"].'</td>
   <td>'.$row["type"].'</td>
   <td>'.$row["location"].'</td>
   <td>'.$row["size"].'</td>
   <td>'.$row["description"].'</td>
   <td>'.$row["price"].'</td>
   <td><button type="button" class="btn btn-warning btn-xs edit" id="'.$row["id"].'">Edit</button></td>
   <td><button type="button" class="btn btn-danger btn-xs delete" id="'.$row["id"].'" data-image_name="'.$row["image_name"].'">Delete</button></td>
  </tr>
  ';
 }
}
else
{
 $output .= '
  <tr>
   <td colspan="6" align="center">No Data Found</td>
  </tr>
 ';
}
$output .= '</table>';
echo $output;
?>