<html>
<head>
	<button>
	<a href="home-page.php">Home Page</a>
	</button>
	<button>
	<a href="view-review.php" > View All Reviews</a>
	</button>
	<button>
	<a href='logout.php'>Logout</a>	
	</button>
<h1>Restaurant List</h1>
<h2> Select the restaurant you would like to view a review for. </h2>
</head>
</html>

<?php
require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "Select * from Restaurant"; //this is the query 
$result = $conn->query($query); //this will run the query
if(!$result) die($conn->error); //if result is false, pull up the error


while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{

	echo "Restaurant_Name: <a href=review-details.php?restaurantid=$row[Restaurant_ID]>$row[Restaurant_Name] </a><br>";
	
	echo '<br>';
}

$result->close();
$conn->close();

?>