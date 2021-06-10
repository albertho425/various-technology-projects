<?php

// include databse connection and global variables
include 'global.php';

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
     // Get image name
     $image = $_FILES['image']['name'];
     // Get image text / description
     $image_text = mysqli_real_escape_string($db, $_POST['image_text']);

     // image file directory
     $target = "images/".basename($image);

    //SQL INSERT query
     $sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";

   // execute query
     mysqli_query($db, $sql);

   // success or fail message based on upload success
     if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
     }else{
        $msg = "Failed to upload image";
     }
  }
  $result = mysqli_query($db, "SELECT * FROM images");
?>

<!-- ***************************************************** -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Custom CSS -->
   <link rel="stylesheet" type="text/css" href="style.css">
   <title>Image Upload</title>
  </head>
  <body>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

   <div class="container mt-5">
    <div class="row">

<!-- ***************************************************** -->

    <?php
       //while the database has results
      while ($row = mysqli_fetch_array($result)) {

      //display the image and text in Bootstrap Cards
      echo '<div class="col-12 col-lg-4 d-flex justify-content-center">';
      echo '<div class="card text-white bg-dark mt-5" style="width: 18rem;">';

      //display the image.  Note the path: images/filename
      echo  '<img src="images/'.$row['image'].'" class="card-img-top">';
      echo  '<div class="card-body">';
      echo '<p class="card-text">';

      //display the text
      echo  $row['image_text'];
      echo '</div></div></div>';
    } ?>

<!-- ***************************************************** -->

  <div class="container justify-content-center">
  <div class="col text-center">

  <!-- Note the form method is POST, and enctype is multipart/form-data" -->
  <form method="POST" action="index.php" enctype="multipart/form-data">
     <div class="form-group">
        <input type="hidden" name="size" value="1000000">
   </div>
     <div class="form-group mt-5">
        <input type="file" class="form-control-file" name="image">
     </div>
     <div class="form-group mt-5">
      <textarea
         id="text"
         cols="20"
         rows="2"
         name="image_text"
         placeholder="Image Description"></textarea>
     </div>
     <div class="form-group mt-5">
        <button type="submit" name="upload" class="btn btn-primary">Upload</button>
     </div>
  </div>
  </div>
  </form>
</div>
</div>
</div>
</body>
</html>

<!-- ***************************************************** -->
