<?php

require_once('DB.php');

$name = $_POST['name'];
$con = new DB();
$data = $con->searchData($name);
// echo "Name: $name";
echo json_encode($data);  