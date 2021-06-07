<?php

    // specify if error messages will be displayed
    ini_set("display_errors", "on");

    $servername = "localhost";
    $dbname = "mysql_study";
    $username = "root";
    $password = "root";

    $conn = mysqli_connect("$servername", "$username", "$password", "$dbname");


    if(!$conn){
        echo "<h3 class='container bg-dark p-3 text-center text-warning rounded-lg mt-5'>Unable to connect to database<h3>";
    }


    // Get data to display on index page

    $sql = "SELECT * FROM blog_data";
    $query = mysqli_query($conn, $sql);


    // Create a post based on ID value.  The "C" of CRUD accronym

    //super global variable which is used to collect data after submitting form
    if(isset($_REQUEST['add_blog_post'])){
    //REQUEST covers POST and GET

        //assign variable
        $title = $_REQUEST['title'];

        //assign variable
        $content = $_REQUEST['content'];

        //MySQL Query to insert to databse
        $sql = "INSERT INTO blog_data(title, content) VALUES('$title', '$content')";

        mysqli_query($conn, $sql);

        echo $sql;

        //query paramter and value
        header("Location: index.php?message=created");
        exit();
    }

    // Read a post based on ID value.  The "R" of CRUD accronym
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];

        // database query
        $sql = "SELECT * FROM blog_data WHERE id = $id";
        $query = mysqli_query($conn, $sql);


    }

    // Delete a post based on ID value.  The "D" of CRUD accronym
    if(isset($_REQUEST['delete'])){
        $id = $_REQUEST['id'];

        // database query
        $sql = "DELETE FROM blog_data WHERE id = $id";
        mysqli_query($conn, $sql);
        header("Location: index.php?message=deleted");
        exit();
    }

    // Update a post based on ID value.  The "U" of CRUD accronym
    if(isset($_REQUEST['update'])){
        $id = $_REQUEST['id'];
        $title = $_REQUEST['title'];
        $content = $_REQUEST['content'];

        // database query
        $sql = "UPDATE blog_data SET title = '$title', content = '$content' WHERE id = $id";
        mysqli_query($conn, $sql);

        header("Location: index.php?message=updated");
        exit();
    }

?>
