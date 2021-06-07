<?php

//*******************************************

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


    <!-- stylesheet -->
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS and JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </head>
  <title>$title</title>
  <body style="background-color: grey">
  <!-- Navigation Bar -->
  <nav class="navbar navbar-dark bg-dark">
  <span class="navbar-brand mb-0 h1"><i class="$icon fa-2x"></i>$title</span>
</nav>

EOT;
}
//*******************************************

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

function template_footer() {
//load the footer of each page
    echo <<<EOT
        </body>
    </html>
    EOT;
}

?>
