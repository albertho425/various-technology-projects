<?php

function connect_mysql()
// connect database
{
    $servername = "";
    $dbname = "";
    $username = "";
    $password = "";


    $conn = mysqli_connect("$servername", "$username", "$password", "$dbname");


    if(!$conn){
        echo "<h3 class='container bg-dark p-3 text-center text-warning rounded-lg mt-5'>Unable to connect to database<h3>";
    }
}//*******************************************************************************************************************************

function displays_errors()
// display error messages for troubleshooting
{
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

}

//*******************************************************************************************************************************

function template_header($title, $icon)
// load fontawesome, bootstrap, jquery and nav bar for each page
{


echo <<<EOT

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>


  </head>
  <title>$title</title>
  <body style="background-color: grey">
  <!-- Navigation Bar -->
  <nav class="navbar navbar-dark bg-dark">
  <span class="navbar-brand mb-0 h1"><i class="$icon fa-2x"></i>$title</span>
</nav>

EOT;
}
//************************************************************************************

function display_message($text) {

    echo <<<EOT

    <div class="card mt-5 justify-content-center align-items-center" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Message</h5>
        <p class="card-text">$text</p>
        <a href="index.php" class="btn btn-primary">Send another one</a>
    </div>
    </div>

EOT;
}

//************************************************************************************

function template_footer() {
//load the footer of each page
    echo <<<EOT
        </body>
    </html>
    EOT;
}

?>
