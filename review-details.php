<html>
<head>
<h1>Restaurant Reviews</h1>
</head>
</html>


<?php

require_once  'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$ReviewID = $_GET['restaurantid'];
$query = "SELECT * FROM Review where Review_ID=$ReviewID";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END

<body>
<h3> Review: </h3>
	$row[Review]
	<br><br>
<h3> Rating: </h3>
	$row[Rating]
	
_END;

}

$conn->close();



?>