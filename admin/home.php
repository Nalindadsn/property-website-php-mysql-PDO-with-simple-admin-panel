<!DOCTYPE html>
<?php
	require 'conn.php';
	session_start();
	
	if(!ISSET($_SESSION['user'])){
		header('location:index.php');
	}

  $id = $_SESSION['user'];
  $sql = $conn->prepare("SELECT * FROM `member` WHERE `mem_id`='$id'");
  $sql->execute();
  $fetch = $sql->fetch();
?>
<html>
 <head>
  <title>Property List</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
 <nav class="navbar navbar-inverse rounded-0" style="border-radius:0">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">SJProperty</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../">Home</a></li>
     
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> SignOut</a></li>
    </ul>
  </div>
</nav>
 
  <br />
  <div class="container">
   <h3 align="center">Property List</h3>
   <br />
   <div align="right" class="border" style="border:1px solid #ccc;padding:5px;">
    <input type="file" name="multiple_files" id="multiple_files" multiple />
    <span class="text-muted">Only .jpg, png, .gif file allowed</span>
    <span id="error_multiple_files"></span>
   </div>
   <br />
   <div class="table-responsive" id="image_table">
    
   </div>
  </div>
 </body>
</html>
<div id="imageModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <form method="POST" id="edit_image_form">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Edit Image Details</h4>
    </div>
    <div class="modal-body">
     <div class="form-group">
      <label>Image Name</label>
      <input type="text" name="image_name" id="image_name" class="form-control" />
     </div>
     <div class="form-group">
      <label>Title</label>
      <input type="text" name="title" id="title" class="form-control" />
     </div>


     
     <div class="form-group">
      <label>Type</label>
      <input type="text" name="type" id="type" class="form-control" />
     </div>
     <div class="form-group">
      <label>Location</label>
      <input type="text" name="location" id="location" class="form-control" />
     </div>
     <div class="form-group">
      <label>Size</label>
      <input type="text" name="size" id="size" class="form-control" />
     </div>
     <div class="form-group">
      <label>Price</label>
      <input type="text" name="price" id="price" class="form-control" />
     </div>
     <div class="form-group">
      <label>Description</label>
      <textarea  name="description" id="description" class="form-control" ></textarea>

     </div>
    </div>
    <div class="modal-footer">
     <input type="hidden" name="id" id="id" value="" />
     <input type="submit" name="submit" class="btn btn-info" value="Edit" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </form>
  </div>
 </div>
</div>
<script>
$(document).ready(function(){
 load_image_data();
 function load_image_data()
 {
  $.ajax({
   url:"crud/fetch.php",
   method:"POST",
   success:function(data)
   {
    $('#image_table').html(data);
   }
  });
 } 
 $('#multiple_files').change(function(){
  var error_images = '';
  var form_data = new FormData();
  var files = $('#multiple_files')[0].files;
  if(files.length > 10)
  {
   error_images += 'You can not select more than 10 files';
  }
  else
  {
   for(var i=0; i<files.length; i++)
   {
    var name = document.getElementById("multiple_files").files[i].name;
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
    {
     error_images += '<p>Invalid '+i+' File</p>';
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("multiple_files").files[i]);
    var f = document.getElementById("multiple_files").files[i];
    var fsize = f.size||f.fileSize;
    if(fsize > 2000000)
    {
     error_images += '<p>' + i + ' File Size is very big</p>';
    }
    else
    {
     form_data.append("file[]", document.getElementById('multiple_files').files[i]);
    }
   }
  }
  if(error_images == '')
  {
   $.ajax({
    url:"crud/upload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#error_multiple_files').html('<br /><label class="text-primary">Uploading...</label>');
    },   
    success:function(data)
    {
     $('#error_multiple_files').html('<br /><label class="text-success">Uploaded</label>');
     load_image_data();
    }
   });
  }
  else
  {
   $('#multiple_files').val('');
   $('#error_multiple_files').html("<span class='text-danger'>"+error_images+"</span>");
   return false;
  }
 });  
 $(document).on('click', '.edit', function(){
  var id = $(this).attr("id");
  $.ajax({
   url:"crud/edit.php",
   method:"post",
   data:{id:id},
   dataType:"json",
   success:function(data)
   {

    $('#imageModal').modal('show');
    $('#id').val(id);
    $('#image_name').val(data.image_name);
    $('#title').val(data.title);
    $('#type').val(data.type);
    $('#location').val(data.location);
    $('#size').val(data.size);
    $('#description').val(data.description);
    $('#price').val(data.price);

   }
  });
 }); 
 $(document).on('click', '.delete', function(){
  var id = $(this).attr("id");
  var image_name = $(this).data("image_name");
  if(confirm("Are you sure you want to remove it?"))
  {
   $.ajax({
    url:"crud/delete.php",
    method:"POST",
    data:{id:id, image_name:image_name},
    success:function(data)
    {
     load_image_data();
     alert("Image removed");
    }
   });
  }
 }); 
 $('#edit_image_form').on('submit', function(event){
  event.preventDefault();
  if($('#image_name').val() == '')
  {
   alert("Enter Image Name");
  }
  else
  {

    // alert(JSON.stringify($('#edit_image_form').serialize()))
   $.ajax({
    url:"crud/update.php",
    method:"POST",
    data:$('#edit_image_form').serialize(),
    success:function(data)
    {
        alert(JSON.stringify(data))
     $('#imageModal').modal('hide');
     load_image_data();
     alert('Image Details updated');
    }
   });
  }
 }); 
});
</script>
