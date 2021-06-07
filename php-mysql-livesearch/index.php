<?php

require_once('db.php');

$db = new DB();


  $data = $db->viewData();

// $data = $db->searchData("A");

// var_dump($data);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <title>PHP/MySQL Live Search</title>
  </head>
  <body>
    <h1>Live Search Demo</h1>

    <form action="search.php" method="POST">
        <input type="text" name="name" placeholder="Search Here..."
         id="searchBox" oninput=search(this.value)>
    </form>

    <ul id="dataViewer">
        <?php foreach($data as $i) { ?>
        <li><?php echo $i["name"]; ?></li>
        <?php } ?>  <!-- close the forEach loop -->
    </ul>

    <script src="main.js"></script>

    
  </body>
</html>
