<?php

 $servername = "root";
 $dbname = "root";
 $username = "root";
 $password = "root";


 $conn = mysqli_connect("$servername", "$username", "$password", "$dbname");


    if(!$conn){
        echo "<h3 class='container bg-dark p-3 text-center text-warning rounded-lg mt-5'>Unable to connect to database<h3>";
    }


?>
