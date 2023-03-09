<html>
<head>
<h1>Food List</h1>
<h2> Here are the options of food at this restaurant. Click below to add a review. </h2>
</head>
</html>

<?php
require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$foodid = $_GET['foodid'];
$query = "Select * from Food"; //this is the query 
$result = $conn->query($query); //this will run the query
if(!$result) die($conn->error); //if result is false, pull up the error

session_start();
$_SESSION['foodid'] = $foodid;

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	echo '<br>';
	echo '<h3> Food: <br><br>';
	echo $row['Name'];
	echo '</h3>';
	echo '<br>';
	echo '<br>';
	echo "<a href='add-review.php?foodid=$row[Food_ID]'>Add Review</a>";
	//echo "Food: <a href=food-list.php?restaurantid=$row[Restaurant_ID]>$row[Restaurant_Name] </a><br>";
	
	echo '<br>';
}



$result->close();
$conn->close();

?>