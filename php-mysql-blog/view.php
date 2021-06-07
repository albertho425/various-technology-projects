<?php
    include "crud.php";
    //loads the Bootstrap CSS and navbar    
    include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Blog using Bootstrap, PHP, MySQL</title>
</head>
<body>

   <div class="container mt-5">

      <!-- Access query parameter and assign to arrayItem -->
        
      <?php foreach($query as $arrayItem){?>
        
        <div class="bg-dark p-5 rounded-lg text-white text-center">
            
          <h1><?php echo $arrayItem['title'];?></h1>
                
          <div class="d-flex mt-5 justify-content-center align-items-center">
            
            <!-- edit the post based on ID -->
            <div class="align-self-start">
              <a href="edit.php?id=<?php echo $arrayItem['id']?>
              "class="btn btn-warning btn-md" name="edit">Update</a>            
            </div>
            
            <!-- delete the post based on ID -->
            <div class="align-self-start">
              <form method="POST">
              <input type="text" hidden value='<?php echo $arrayItem['id']?>' name="id">
               <button class="btn btn-danger btn-md" name="delete">Delete</button>
               </form>               
            </div>
          
          </div>
          </div>
          
            <!-- Blog Content -->
            <p class="mt-5 border-left border-dark pl-3">
            <?php echo $arrayItem['content'];?></p>
        <?php } ?>    

        <a href="index.php" class="btn btn-primary my-3">Home</a>
   </div>
</body>

<!-- Loads the Bootstrap JS and the footer -->
<?php include "footer.php"?>

</html>