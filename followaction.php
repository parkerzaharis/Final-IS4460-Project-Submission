<?php

require_once 'login.php';
require_once 'user.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "INSERT INTO Follow (Member_ID, RestaurantID) VALUES ()"; //this is the query
$result = $conn->query($query); //this will run the query
if(!$result) die($conn->error); //if result is false, pull up the error


?>
