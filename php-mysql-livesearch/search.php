<?php

require_once('DB.php');

$name = $_POST['name'];

//new instance of DB
$con = new DB();

// run the searcData method of DB class
$data = $con->searchData($name);

// echo "Name: $name";
echo json_encode($data);  