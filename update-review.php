<?php

require_once  'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['reviewid'])){
	
$Review_ID = $_GET['reviewid'];	

$query = "SELECT * FROM Review where Review_ID=$Review_ID";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 
		
echo <<<_END
	
	<form action='update-review.php' method='post'>	
	Review <input type="text" name="Review" value="$row[Review]"></br></br>
	Rating <input type="int" name="Rating"value="$row[Rating]"></br></br>	
	<input type="submit" name="view-review">
	<input type="hidden" name="add-review">
	<input type="hidden"name="reviewid" value="$Review_ID">
							</br></br>
							</br></br>
	<button>
	<a href="view-review.php" > View All Reviews</a>
	</button>
	<br><br><br>
	<button>
		<a href='logout.php'>Logout</a>	
	</button>
</pre></form>
	
_END;

}

}


if(isset($_POST['view-review'])){
	
		$ReviewID=get_post($conn, 'reviewid');
		$MemberID=1234;
		$Review=get_post($conn, 'Review');
		$Rating=get_post($conn,'Rating');
		$Date= date("Y/m/d");;
	
	
	$query = "UPDATE Review set Review='$Review', Rating='$Rating', Date='$Date' where Review_ID=$ReviewID";
	
	$result=$conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: view-review.php");
	
	
}

$conn->close();

function get_post($conn, $var) {
	return $conn->real_escape_string($_POST[$var]);
}

?>