<?php
    // initialize errors variable
   $errors = "";

   // connection to database
   $db = mysqli_connect("localhost", "root", "root", "maplesyrupweb");

   // If the submit button was clicked
   if (isset($_POST['submit'])) {

        // check if task box or category is empty
      if (empty($_POST['task']) || empty($_POST['category']) ) {
         $errors = "You must fill in the task AND category";

        }


         // both boxes are not empty
         else {
            $task = $_POST['task'];
            $category = $_POST['category'];
       $sql = "INSERT INTO todo (task, category) VALUES ('$task','$category')";
       mysqli_query($db, $sql);
       header('location: index.php');
      }
    }
    // delete task
if (isset($_GET['del_task'])) {
    $id = $_GET['del_task'];

    // delete task based on ID
   mysqli_query($db, "DELETE FROM todo WHERE id=".$id);
   header('location: index.php');
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>To-Do List App with PHP and MySQL</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">


    <title>To-Do List App with PHP and MySQL</title>
  </head>

  <!-- Inline CSS style -->
  <body style="background-color:grey;">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

   <div class="container text-center mt-5 mb-5">
      <h2>To-Do List App with PHP and MySQL</h2>
        <i class="fas fa-clipboard-list fa-4x"></i>
   </div>

    <!-- The form -->
   <form method="post" action="index.php" class="container">
    <div class="col-md-12">

    <!-- The error messages -->
    <?php if (isset($errors)) { ?>
   <p><?php echo $errors; ?></p>
    <?php } ?>

    <div class="row g-3">
        <div class="col">
        <i class="fas fa-thumbtack fa-2x"></i>
        <label for="task" class="form-label">Task</label>
        <input type="text" name="task"  placeholder="Task" name="task" class="form-control" required>
        </div>
        <div class="col">
        <i class="fas fa-layer-group fa-2x"></i>
        <label for="category" class="form-label">Category</label>
        <input type="text" name="category" placeholder="Category" class="form-control" required>
        </div>
   </div>

    <button type="submit" name="submit" id="add_btn" class="btn btn-primary mt-3 mb-3">Add Task</button>
   </form>
    </div>

    <!-- The results table -->
    <div class="container mt-5 mb-5">
    <table class="table table-dark table-striped">
   <thead>
      <tr>
         <th>Number</th>
         <th>Tasks</th>
            <th>Category</th>
         <th>Action</th>
      </tr>
   </thead>

   <tbody>
      <?php
      // select all tasks if page is visited or refreshed
      $tasks = mysqli_query($db, "SELECT * FROM todo");

      $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
         <tr>
            <td> <?php echo $i; ?> </td>
            <td> <?php echo $row['task']; ?> </td>
                <td> <?php echo $row['category']; ?> </td>
            <td>
               <a href="index.php?del_task=<?php echo $row['id'] ?>"><i class="fas fa-trash-alt fa-2x"></i></a>
            </td>
         </tr>
      <?php $i++; } ?>
   </tbody>
</table>
</div>
</body>
</html>
