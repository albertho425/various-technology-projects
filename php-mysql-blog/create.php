<?php
    
    // include DB connection, global variables, and global logic
    include "crud.php";
    
    //Loads the Bootstrap CSS and the navbar -->
    include "header.php";
    
    ini_set("display_errors", "on");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Sample Blog using Bootstrap, PHP, MySQL</title>
</head>
<body>

   <div class="container mt-5">
        <form method="POST">
            <input type="text" placeholder="Blog Title" class="form-control my-3 bg-dark text-white text-center" name="title">
            <textarea name="content" class="form-control my-3 bg-dark text-white" cols="30" rows="10"></textarea>
            <button class="btn btn-dark" name="add_blog_post">Add Post</button>
        </form>
   </div>

<!-- Loads the Bootstrap JS and the footer -->
<?php include "footer.php" ?>

</body>
</html>