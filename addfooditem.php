<html>

<head>
<h1>Add Food Item</h1>
</head>

<body>

<form method='post' action='signup-restaurant.php'>
    <pre>
        Name: <input type='text' name='name'
        Description: <input type='text' name='description'>
        Type: <input type='text' name='address'>
        Price: <input type='text' name='phone'>

        <input type='submit' value='Add Item'>
    </pre>
</form>

</body>

</html>

<?php

require_once  'login.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$restaurantid = $_GET['restaurantid'];
$query = "Select * from Restaurant join Food where Restaurant.restaurant_ID=Food.restaurant_ID and Food.restaurant_ID=$restaurantid"; //this is the query
$result = $conn->query($query); //this will run the query
if(!$result) die($conn->error); //if result is false, pull up the error

session_start();
$_SESSION['restaurantid'] = $restaurantid;

$name = $_POST['name'];
$description = $_POST['description'];
$type= $_POST['type'];
$price = $_POST['price'];

$query = "INSERT INTO Food (Name, Description, Type, Price, Restaurant_ID)
        VALUES ('$name', '$description', '$type', '$price', $restaurantid)";

$result = $conn->query($query);
if(!$result) die($conn->error);

$result->close();
$conn->close();
?>
