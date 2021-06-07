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


    <title>Sample Blog using Bootstrap, PHP & MySQL</title>
</head>
<body>

   <div class="container mt-5">
       
        <!-- Access query parameter and assign to arrayItem -->

        <?php foreach($query as $arrayItem){ ?>
            <form method="POST">
                <input type="text" hidden value='<?php echo $arrayItem['id']?>' name="id">
                <input type="text" placeholder="Blog Title" class="form-control my-3 bg-dark text-white text-center" name="title" value="<?php echo $arrayItem['title']?>">
                <textarea name="content" class="form-control my-3 bg-dark text-white" cols="30" rows="10"><?php echo $arrayItem['content']?></textarea>
                <button class="btn btn-dark" name="update">Update</button>
            </form>
        <?php } ?>    
   </div>


<!-- Loads the Bootstrap JS and the footer -->
<?include "footer.php"?>

</body>
</html>