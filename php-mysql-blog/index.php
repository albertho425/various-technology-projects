<?php
    
    include "crud.php";
    include "header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <title>Sample Blog using Bootstrap, PHP, MySQLL</title>
</head>
<body>

    <div class="container mt-5">

        <!-- Confirmation Messages of Creating, Updating, and Deleting -->
        
        <?php if(isset($_REQUEST['message'])){ ?>
            <?php if($_REQUEST['message'] == "created"){?>
                <div class="alert alert-success" role="alert">
                    Created successfully.
                </div>
            <?php }?>
            
            <?php if($_REQUEST['message'] == "updated"){?>
            <div class="alert alert-success" role="alert">
                    Updated successfully.
            </div>
            <?php }?>
            
            <?php if($_REQUEST['message'] == "deleted"){?>
            <div class="alert alert-success" role="alert">
                    Deleted successfully
            </div>
            <?php }?>
            
            
        <?php }?>
        
        <!-- Display blog posts from database to bootstrap cards -->
        <div class="row">
            
        <!-- Access query parameter and assign to value -->
            <?php foreach($query as $arrayItem){ ?>
                <div class="col-12 col-lg-4 d-flex justify-content-center">
                    <div class="card text-white bg-dark mt-5" style="width: 18rem;">
                        <div class="card-body">
                            
                            <!-- display the blog title -->
                            <h5 class="card-title"><?php echo $arrayItem['title'];?></h5>
                            <!-- display the blog content -->
                            <p class="card-text"><?php echo substr($arrayItem['content'], 0, 50);?>...</p>
                            <a href="view.php?id=<?php echo $arrayItem['id']?>" class="btn btn-light">Read More <span class="text-danger">&rarr;</span></a>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
       
    </div>


<!-- Inlcude the Bootstrap JS and footer -->
<?php include "footer.php";?>

</body>
</html>


