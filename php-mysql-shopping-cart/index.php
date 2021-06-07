<?php


 //Calls session_start, to remember your cart information across multiple pages  
session_start();

// Include functions page for header, footer and database connection
include 'functions.php';

// Database connection
$pdo = pdo_connect_mysql();


// This page also does basic routing method and will set homepage.php to default page.

$page = isset($_GET['page']) 
        && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'home';

// Include and show the requested page
include $page . '.php';
?>

