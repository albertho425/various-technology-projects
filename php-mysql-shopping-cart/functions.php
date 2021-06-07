<?php
// ************************************************************
// Database Connection
// ************************************************************
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = '';
    $DATABASE_USER = '';
    $DATABASE_PASS = '';
    $DATABASE_NAME = '';


    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
// ************************************************************
// Header template, loads all necessary components
// ************************************************************
function template_header($title) {
echo <<<EOT

<html lang="en">
  <head>
    <! --************************************************************ -->
    <!-- Required meta tags -->
    <! --************************************************************ -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <! --************************************************************ -->
    <!-- Bootstrap CSS -->
    <! --************************************************************ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <! --************************************************************ -->
    <!-- Custom CSS -->
    <! --************************************************************ -->
    <link href="style.css" rel="stylesheet" type="text/css">

    <! --************************************************************ -->
    <!-- Font Awesome -->
    <! --************************************************************ -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <! --************************************************************ -->
    <!-- Google Fonts -->
    <! --************************************************************ -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

    <! --************************************************************ -->
    <!-- Bootstrap core CSS -->
    <! --************************************************************ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


    <! --************************************************************ -->
    <!-- JS -->
    <! --************************************************************ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</head>

	<body style="background-color: black; color: red;">

    <! --************************************************************ -->
    <!-- Navigation bar -->
    <! --************************************************************ -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><i class="fas fa-home fa-2x"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=products">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=cart">Cart</a>
      </li>
    </ul>
    <div class="my-2 my-lg-0">
        <a href="index.php?page=cart">
		<i style="color:red;" class="fas fa-shopping-cart fa-2x"></i>
		</a>

    </div>
</nav>



EOT;
}
// ************************************************************
// Template footer
// ************************************************************

function template_footer() {
$year = date('Y');
echo <<<EOT

    <! --************************************************************ -->
    <!-- Footer on bottom is sticky by using fixed-bottom bootstrap class -->
    <! --************************************************************ -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mt-5">
        <a class="navbar-brand text-center" href="index.php">&copy; $year</a>
    </div>


    </body>
</html>
EOT;
}
?>
